import * as React from 'react';

import * as moment from 'moment';

import { StepperButtonsComponent } from '../../merchant/shared/stepper-buttons';

import { SessionModel } from '../../core/models/session.model';
import { EducationService } from '../education.service';

export class Step3Component extends React.Component<any, any> {

    constructor(props: any) {
        super(props);
        this.handlePreviousClick = this.handlePreviousClick.bind(this);
        this.handleNextClick = this.handleNextClick.bind(this);
        this.handleAdditionalInfoInput =  this.handleAdditionalInfoInput.bind(this);
    }

    protected handlePreviousClick(e: any) {
        this.props.setStepper({ current: 2 });
    }

    protected handleNextClick(e: any) {
        this.props.setLoader({ sending: true });
        this.props.setErrors({});
        const sessions: SessionModel[] = this.props.form.sessions
        .filter((session: SessionModel) => {
            return session.start_at ? true : false;
        })
        .map((session: SessionModel) => {
            session.additional_info = this.props.form.additional_info;
            return session;
        });
        const p = EducationService.scheduleSessions(sessions);
        p.then((res) => {
            this.props.setStatus({ submitted: true });
        }).catch((error: any) => {
            this.props.setStatus({ submitted: true, error: true });
            this.props.setErrors({ errors: error.response.data.errors });
        }).then(() => {
            this.props.setLoader({ sending: false });
        });
    }

    protected handleAdditionalInfoInput(e: any) {
        this.props.setForm({ additional_info: e.target.value });
    }

    render() {
        const tutor: any = this.props.form.tutor;
        const student: any = this.props.form.student;

        const sessions: SessionModel[] = this.props.form.sessions;
        const session: SessionModel = this.props.form.session;

        const is_trial: boolean = this.props.form.is_trial;
        return (
            <section className="text-center">
                <h1 className="text-muted">Reviewing Your Scheduled Session(s)</h1>
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
                                <th>Date</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Cost</th>
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
                                        <td>{ date }</td>
                                        <td>{ start }</td>
                                        <td>{ end }</td>
                                        { _session.start_at &&
                                            <td>${ is_trial ? 0 : 1 } credits</td> }
                                        { !_session.start_at &&
                                            <td>-</td> }
                                    </tr>
                                );
                            }) }
                        </tbody>
                    </table>
                </div>
                <div>
                    <div className="form-group">
                        <label>Would Like To Add Some Information For <span className="text-primary">{ this.props.form.tutor.person.full_name }</span>?</label>
                        <textarea className={ "form-control" }
                            onChange={ this.handleAdditionalInfoInput }
                            value={ this.props.form.additional_info } />
                    </div>
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