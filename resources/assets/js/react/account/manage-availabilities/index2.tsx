import * as React from 'react';
import * as ReactDOM from 'react-dom';

import { PageLoader } from '../../shared/components/page-loader.component';

class ManageAvailabilitiesComponent extends React.Component<any, any> {

    readonly state: any = {
        availabilities: {},
    };

    readonly days = [
        'Monday', 'Tuesday', 'Wednesday', 'Thursday',
        'Friday', 'Saturday', 'Sunday',
    ];

    readonly hours = [
        '06:00 AM', '06:30 AM',
        '07:00 AM', '07:30 AM',
        '08:00 AM', '08:30 AM',
        '09:00 AM', '09:30 AM',
        '10:00 AM', '10:30 AM',
        '11:00 AM', '11:30 AM',

        '12:00 PM', '12:30 PM',
        '13:00 PM', '13:30 PM',
        '14:00 PM', '14:30 PM',
        '15:00 PM', '15:30 PM',
        '16:00 PM', '16:30 PM',
        '17:00 PM', '17:30 PM',

        '18:00 PM', '18:30 PM',
        '19:00 PM', '19:30 PM',
        '20:00 PM', '20:30 PM',
        '21:00 PM', '21:30 PM',
        '22:00 PM', '22:30 PM',
        '23:00 PM', '23:30 PM',

        '00:00 AM', '00:30 AM',
        '01:00 AM', '01:30 AM',
        '02:00 AM', '02:30 AM',
        '03:00 AM', '03:30 AM',
        '04:00 AM', '04:30 AM',
        '05:00 AM', '05:30 AM',
    ];

    constructor(props: any) {
        super(props);
        this.handleCheckTime = this.handleCheckTime.bind(this);
        this.handleCheckAllByDay = this.handleCheckAllByDay.bind(this);
        this.handleCheckAllByHour = this.handleCheckAllByHour.bind(this);
    }

    componentDidMount() {
        const availabilities = {};
        Object.values(this.days).map((day: string) => {
            availabilities[day] = {};
            Object.values(this.hours).map((hour: string) => {
                availabilities[day][hour] = 0;
            });
        });
        this.setState({ availabilities });
    }

    handleCheckTime(day: string, hour: string) {
        const availabilities = this.state.availabilities;
        if (availabilities[day][hour] === 0) {
            availabilities[day][hour] = 1;
        } else {
            availabilities[day][hour] = 0;
        }
        this.setState({ availabilities });
    }

    handleCheckAllByDay(day: string) {
        const availabilities = this.state.availabilities;
        this.hours.forEach((hour: string) => {
            if (availabilities[day][hour] === 0) {
                availabilities[day][hour] = 1;
            } else {
                availabilities[day][hour] = 0;
            }
        });
        this.setState({ availabilities });
    }

    handleCheckAllByHour(hour: string) {
        const availabilities = this.state.availabilities;
        this.days.forEach((day: string) => {
            if (availabilities[day][hour] === 0) {
                availabilities[day][hour] = 1;
            } else {
                availabilities[day][hour] = 0;
            }
        });
        this.setState({ availabilities });
    }

    render() {
        const availabilities = this.state.availabilities;
        if (Object.keys(availabilities).length === 0) return <PageLoader></PageLoader>;
        return (
            <div>
                <table className="table table-striped table-sm text-center">
                    <thead>
                        <tr>
                            <td>#</td>
                            {this.days.map((day: string, idx: number) => (
                                <td key={idx}
                                    onClick={() => this.handleCheckAllByDay(day)}>
                                    {day}</td>    
                            ))}
                        </tr>
                    </thead>
                    <tbody>
                        {this.hours.map((hour: string, row: number) => (
                            <tr key={row}>
                                <td onClick={() => this.handleCheckAllByHour(hour)}>
                                    {hour}</td>
                                {this.days.map((day: string, col: number) => (
                                    <td key={col}>
                                        <div className={"custom-control custom-checkbox custom-checkbox-rounded-circle custom-control-lg " +
                                                ( availabilities[day][hour] ? "custom-control-success" : "custom-control-danger" )  }>
                                            <input type="checkbox" className="custom-control-input"
                                                id={day+'-'+hour}
                                                checked={availabilities[day][hour]} value={1}
                                                onChange={() => this.handleCheckTime(day, hour)} />
                                            <label className="custom-control-label" htmlFor={day+'-'+hour}>
                                                {availabilities[day.toString()][hour.toString()] ? 'y' : 'n'}
                                            </label>
                                        </div>
                                    </td>
                                ))}
                            </tr>
                        ))}
                    </tbody>
                </table>
            </div>
        );
    }
}

if (document.getElementById('manage-availabilities')) {
    ReactDOM.render(<ManageAvailabilitiesComponent />, document.getElementById('manage-availabilities'));
}