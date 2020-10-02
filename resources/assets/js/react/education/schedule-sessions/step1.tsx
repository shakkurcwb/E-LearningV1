import * as React from 'react';

import Slider from 'react-slick';

import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";

import { EducationService } from '../education.service';
import { AccountService } from '../../account/account.service';

export class Step1Component extends React.Component<any, any> {

    constructor(props: any) {
        super(props);
        this.handleNextClick = this.handleNextClick.bind(this);
        this.handleTutorDetails = this.handleTutorDetails.bind(this);
    }

    /** ngOnInit */
    componentDidMount() {
        this.loadUser();
        if (this.props.form.tutors.length === 0) {
            this.fetchDependencies();
        }
    }

    private loadUser() {
        const p = AccountService.getUser();
        p.then((student: any) => {
            this.props.setForm({ student });
        });
    }

    private fetchDependencies() {
        this.props.setLoader({ loading: true });
        const p = EducationService.listTutors();
        p.then((tutors: any[]) => {
            this.props.setForm({ tutors });
        }).then(() => {
            this.props.setLoader({ loading: false });
        });
    }

    protected handleNextClick(tutor: any, is_trial = false) {
        this.props.setForm({ tutor, is_trial });
        this.props.setStepper({ current: 2 });
    }

    protected handleTutorDetails(tutor: any) {
        this.props.setForm({ tutor });
    }

    render() {
        const tutor: any = this.props.form.tutor;
        const student: any = this.props.form.student;
        const tutors: any[] = this.props.form.tutors;
        const settings = {
            dots: true,
            infinite: true,
            speed: 500,
            slidesToShow: 2,
            slidesToScroll: 1,
        };
        return (
            <section className="text-center">
                <h1 className="text-muted">Recommended Tutors</h1>
                <Slider { ...settings }>
                    { tutors
                    .sort((a: any, b: any) => {
                        return b.matching.percent - a.matching.percent;
                    })
                    .map((tutor: any) => {
                        let matchingStyle;
                        if (tutor.matching.percent < 30) {
                            matchingStyle = 'bg-danger';
                        }
                        if (tutor.matching.percent < 60) {
                            matchingStyle = 'bg-warning';
                        }
                        if (tutor.matching.percent < 100) {
                            matchingStyle = 'bg-info';
                        }
                        if (tutor.matching.percent >= 100) {
                            matchingStyle = 'bg-success';
                        }
                        return (
                            <div key={ tutor.id } className="text-center px-6 mb-6">
                                <img src={ tutor.settings.avatar_url } style={{ width: '128px', display: 'inline' }}/>
                                <p className="mb-0 font-w600">{ tutor.person.full_name }</p>
                                <p className="mb-0">{ tutor.person.age } years - { tutor.person.nationality }</p>
                                <p className="mb-0 text-muted">
                                    <small>{ tutor.reputation } reputation / 0 sessions</small>
                                </p>
                                <div className="mb-2">
                                    <div className="progress push text-center" style={{ width: '60%', margin: 'auto' }}>
                                        <div className={ "progress-bar " + matchingStyle } role="progressbar" style={{ width: tutor.matching.percent + '%' }}>
                                            <span className="font-size-sm font-w600">{ tutor.matching.percent }%</span>
                                        </div>
                                    </div>
                                </div>
                                <p className="mb-2">
                                    { tutor.matching.mutual && tutor.matching.mutual.map((value: any) => {
                                        return (
                                            <span key={value} className="badge badge-pill badge-secondary mr-2">{ value }</span>
                                        );
                                    }) }
                                </p>
                                <button className="btn btn-sm btn-secondary mb-1 mr-1" onClick={ () => this.handleTutorDetails(tutor) }>See Tutor Details</button>
                                { tutor.preferences.allow_public_view && +student.credits > 0 &&
                                    <button className="btn btn-sm btn-primary mb-1 mr-1" onClick={ () => this.handleNextClick(tutor) }>Schedule Sessions</button> }
                                { tutor.preferences.allow_trial_sessions && tutor.preferences.allow_public_view &&
                                    <button className="btn btn-sm btn-danger mb-1 mr-1" onClick={ () => this.handleNextClick(tutor, true) }>Schedule Trial</button> }
                            </div>
                            );
                        }) }
                </Slider>
                { student && +student.credits <= 0 &&
                    <div className="mt-5">
                        <div className="alert alert-warning d-flex align-items-center" role="alert">
                            <div className="flex-fill ml-3">
                                <p className="mb-0 font-w600">You Dont Have Credits to Schedule Sessions.</p>
                                <p className="mb-0 text-muted"><small>You Can Try to Schedule a Trial.</small></p>
                            </div>
                        </div>
                    </div> }
                { tutor && tutor.id &&
                    <article>
                        <h3 className="mt-5">{ tutor.person.full_name }</h3>
                        <p>{ tutor.preferences.biography }</p>
                        { tutor.preferences.video &&
                        <iframe width="560" height="315"
                            // src={ "https://www.youtube.com/embed/" + tutor.preferences.video }
                            src={ normalizeVideo(tutor.preferences.video) }></iframe> }
                        <div>
                            { tutor.preferences.allow_public_view && +student.credits > 0 &&
                                <button className="btn btn-sm btn-primary mb-1 mr-1" onClick={ () => this.handleNextClick(tutor) }>Schedule Sessions</button> }
                            { tutor.preferences.allow_trial_sessions && tutor.preferences.allow_public_view &&
                                <button className="btn btn-sm btn-danger mb-1 mr-1" onClick={ () => this.handleNextClick(tutor, true) }>Schedule Trial</button> }
                        </div>
                    </article>
                }
            </section>
        );
    }
}

function normalizeVideo(url: string) {
    if (url.search("www.youtube.com")) {
        const pos = url.indexOf("v=");
        const video_id = url.substr(pos + 2);
        return "https://www.youtube.com/embed/" + video_id;
    } else {
        return url;
    }
}