import * as React from 'react';

import * as moment from 'moment';

import { StepperButtonsComponent } from '../../merchant/shared/stepper-buttons';

import { SessionModel } from '../../core/models/session.model';

export class Step2Component extends React.Component<any, any> {

    readonly state = {
        tab: 0,
    };

    constructor(props: any) {
        super(props);
        this.handlePreviousClick = this.handlePreviousClick.bind(this);
        this.handleNextClick = this.handleNextClick.bind(this);
        this.handleEditClick = this.handleEditClick.bind(this);
        this.handleAgendaSelection = this.handleAgendaSelection.bind(this);
        this.makeAgenda = this.makeAgenda.bind(this);
    }

    componentDidMount() {
        this.makeAgenda();
    }

    componentDidUpdate() {
        const elem = window.document.getElementById("ShouldFocus");
        if (elem) {
            elem.scrollIntoView();
        }
    }

    private makeAgenda() {
        if (this.props.form.sessions.length === 0) {
            const sessions = [];
            let credits = 1;
            if (!this.props.form.is_trial) {
                credits = this.props.form.student.credits;
            }
            for(let i = 0; i < credits; i++) {
                sessions.push({
                    student: this.props.form.student,
                    tutor: this.props.form.tutor,
                    start_at: null,
                    end_at: null,
                    cost: ( this.props.form.is_trial ? 0 : 1),
                    additional_info: '',
                });
            }
            this.props.setForm({ sessions });
        }
    }

    protected handlePreviousClick(e: any) {
        this.props.setStepper({ current: 1 });
        this.props.setForm({ sessions: [], tutor: {} });
    }

    protected handleNextClick(e: any) {
        this.props.setStepper({ current: 3 });
    }

    protected handleEditClick(idx: number, e: any) {
        const sessions: SessionModel[] = this.props.form.sessions;
        const session: SessionModel = sessions[idx];
        session.id = idx;
        this.props.setForm({ session });
    }

    protected handleAgendaSelection(idx: number, e: any) {
        const sessions: SessionModel[] = this.props.form.sessions;
        const session: SessionModel = this.props.form.session;
        const is_trial: boolean = this.props.form.is_trial;

        let agenda: any;
        if (is_trial) {
            agenda = session.tutor.agenda['trial'][idx];
        } else {
            agenda = session.tutor.agenda['premium'][this.state.tab][idx];
        }

        session.start_at = agenda.start_at;
        session.end_at = agenda.end_at;

        sessions[session.id] = session;

        this.props.setForm({ sessions, session: {} });
    }

    render() {
        const tutor: any = this.props.form.tutor;
        const student: any = this.props.form.student;

        const sessions: SessionModel[] = this.props.form.sessions;
        const session: SessionModel = this.props.form.session;

        const is_trial: boolean = this.props.form.is_trial;
        return (
            <section className="text-center">
                <h1 className="text-muted">{ tutor.person.full_name }'s Agenda</h1>
                <div className="mb-2">
                    { is_trial &&
                        <span className="badge badge-danger mr-2">Is Trial</span> }
                    { is_trial &&
                        <span className="badge badge-primary mr-2">1 Session</span> }
                    { !is_trial && +student.credits > 0 &&
                        <span>
                            <div className="font-w600">
                                <small className="mr-2">Frequency:</small> { student.active_subscription.plan.features.frequency }
                                <small className="mr-2 ml-2">Duration:</small> { student.active_subscription.plan.features.duration }
                                <small className="mr-2 ml-2">Sessions:</small> { student.credits }x
                            </div>
                        </span> }
                </div>
                <div className="table-responsive">
                    <table className="table table-bordered text-center table-sm">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            { sessions
                            .map((_session: any, idx: number) => {
                                const date = _session.start_at ? moment(_session.start_at).format("D/M/Y") : '-';
                                const start = _session.start_at ? moment(_session.start_at).format("hh:mm A") : '-';
                                const end = _session.start_at ? moment(_session.end_at).format("hh:mm A") : '-';
                                return (
                                    <tr key={ idx }>
                                        <td>{ idx + 1 }</td>
                                        <td>{ date }</td>
                                        <td>{ start }</td>
                                        <td>{ end }</td>
                                        <td>
                                            <button className="btn btn-sm btn-primary"
                                                onClick={ (e: any) => this.handleEditClick(idx, e) }><i className="fa fa-clock"></i> Select</button>
                                        </td>
                                    </tr>
                                );
                            }) }
                        </tbody>
                    </table>
                </div>
                <div>
                { Object.keys(session).length > 0 &&
                    <div id="ShouldFocus">
                        <h2 className="content-heading">Available Dates</h2>
                        { !is_trial &&
                            <ul className="nav nav-tabs nav-tabs-block mb-4">
                                <li className="nav-item cursor">
                                    <a className={ "nav-link " + ( this.state.tab === 0 ? 'active' : '' ) }
                                        onClick={ () => this.setState({ tab: 0 }) }>Week 1</a>
                                </li>
                                <li className="nav-item cursor">
                                    <a className={ "nav-link " + ( this.state.tab === 1 ? 'active' : '' ) }
                                        onClick={ () => this.setState({ tab: 1 }) }>Week 2</a>
                                </li>
                                <li className="nav-item cursor">
                                    <a className={ "nav-link " + ( this.state.tab === 2 ? 'active' : '' ) }
                                        onClick={ () => this.setState({ tab: 2 }) }>Week 3</a>
                                </li>
                                <li className="nav-item cursor">
                                    <a className={ "nav-link " + ( this.state.tab === 3 ? 'active' : '' ) }
                                        onClick={ () => this.setState({ tab: 3 }) }>Week 4</a>
                                </li>
                            </ul> }
                        { is_trial &&
                            <div className="row">
                                { tutor.agenda.trial &&
                                    tutor.agenda.trial.map((agenda: any, idx: number) => {
                                        return (
                                            <DateCard key={ idx } { ...agenda } onClick={ (e: any) => this.handleAgendaSelection(idx, e) } />
                                        );
                                    }) }
                            </div>
                        }
                        { !is_trial &&
                            <div className="row">
                                { tutor.agenda.premium &&
                                    tutor.agenda.premium[this.state.tab].map((agenda: any, idx: number) => {
                                        console.log('agenda', agenda);
                                        return (
                                            <DateCard key={ idx } { ...agenda } onClick={ (e: any) => this.handleAgendaSelection(idx, e) } />
                                        );
                                    }) }
                            </div> }
                    </div> }
                </div>
                <StepperButtonsComponent
                    lang={ this.props.lang }
                    handlePreviousClick={ this.handlePreviousClick }
                    handleNextClick={ this.handleNextClick }>
                </StepperButtonsComponent>
            </section>
        );
    }
}

function DateCard(props: any) {
    return (
        <div className="col-md-6 col-xl-3 ribbon-animate">
            <a onClick={ props.onClick } className="cursor">
                <div className="block">
                    <div className="block-content block-content-full ribbon ribbon-primary bg-light">
                        <div className="text-center py-4">
                            <p className="mb-0 font-w600">{ props.label }</p>
                            <p className="mb-0"><i className="fa fa-caret-right text-success"></i> { props.start }</p>
                            <p className="mb-0"><i className="fa fa-caret-right text-danger"></i> { props.end }</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    );
}
