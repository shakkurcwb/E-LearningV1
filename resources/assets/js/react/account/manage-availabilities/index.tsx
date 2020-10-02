import * as React from 'react';
import * as ReactDOM from 'react-dom';

import { PageLoader } from '../../shared/components/page-loader.component';

import { AccountService } from '../account.service';

class ManageAvailabilitiesComponent extends React.Component<any, any> {

    readonly state: any = {
        availabilities: {},
        showMorning: true,
        showEvening: false,
        showNight: false,
        showDawn: false,
        isLoading: true,
    };

    readonly days = [
        'MON', 'TUE', 'WED', 'THU',
        'FRI', 'SAT', 'SUN',
    ];

    readonly hours = {
        morning: [
            '06:00 AM', '06:30 AM',
            '07:00 AM', '07:30 AM',
            '08:00 AM', '08:30 AM',
            '09:00 AM', '09:30 AM',
            '10:00 AM', '10:30 AM',
            '11:00 AM', '11:30 AM',
        ],
        evening: [
            '12:00 PM', '12:30 PM',
            '13:00 PM', '13:30 PM',
            '14:00 PM', '14:30 PM',
            '15:00 PM', '15:30 PM',
            '16:00 PM', '16:30 PM',
            '17:00 PM', '17:30 PM',
        ],
        night: [
            '18:00 PM', '18:30 PM',
            '19:00 PM', '19:30 PM',
            '20:00 PM', '20:30 PM',
            '21:00 PM', '21:30 PM',
            '22:00 PM', '22:30 PM',
            '23:00 PM', '23:30 PM',
        ],
        dawn: [
            '00:00 AM', '00:30 AM',
            '01:00 AM', '01:30 AM',
            '02:00 AM', '02:30 AM',
            '03:00 AM', '03:30 AM',
            '04:00 AM', '04:30 AM',
            '05:00 AM', '05:30 AM',
        ],
    };

    constructor(props: any) {
        super(props);
        this.makeAgenda = this.makeAgenda.bind(this);
        this.handleSubmit = this.handleSubmit.bind(this);
        this.handleReset = this.handleReset.bind(this);
        this.toggleShowMorning = this.toggleShowMorning.bind(this);
        this.toggleShowEvening = this.toggleShowEvening.bind(this);
        this.toggleShowNight = this.toggleShowNight.bind(this);
        this.toggleShowDawn = this.toggleShowDawn.bind(this);
        this.handleCheckTime = this.handleCheckTime.bind(this);
        this.handleCheckAllByDay = this.handleCheckAllByDay.bind(this);
    }

    componentDidMount() {
        const p = AccountService.getAvailabilities();
        p.then((availabilities: any) => {
            if (availabilities) { this.setState({ availabilities }); }
        }).then(() => {
            this.makeAgenda();
        }).then(() => {
            this.setState({ isLoading: false });
        });
    }

    private makeAgenda() {
        const { availabilities } = this.state;
        Object.values(this.days).map((day: string) => {
            if (day in availabilities) {
            } else {
                availabilities[day] = {};
            }
            Object.keys(this.hours).map((period: string) => {
                Object.values(this.hours[period]).map((hour: string) => {
                    if (hour in availabilities[day]) {
                    } else {
                        availabilities[day][hour] = 0;
                    }
                });
            });
        });
        this.setState({ availabilities });
    }

    handleSubmit() {
        this.setState({ isLoading: true });
        const availabilities = this.state.availabilities;
        const p = AccountService.saveAvailabilities(availabilities);
        p.then((availabilities: any) => {
            console.log('Saved');
        });
        p.catch((error: any) => {
            console.error('Fail to Save Availabilities', error);
        });
        p.finally(() => {
            this.setState({ isLoading: false });
        });
    }

    handleReset() {
        this.makeAgenda();
    }

    toggleShowMorning() {
        const showMorning = this.state.showMorning;
        this.setState({ showMorning: !showMorning });
    }

    toggleShowEvening() {
        const showEvening = this.state.showEvening;
        this.setState({ showEvening: !showEvening });
    }

    toggleShowNight() {
        const showNight = this.state.showNight;
        this.setState({ showNight: !showNight });
    }

    toggleShowDawn() {
        const showDawn = this.state.showDawn;
        this.setState({ showDawn: !showDawn });
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
        const { showMorning, showEvening, showNight, showDawn } = this.state;
        Object.keys(this.hours).filter((period: string) => {
            if (period === 'morning' && showMorning) return true;
            if (period === 'evening' && showEvening) return true;
            if (period === 'night' && showNight) return true;
            if (period === 'dawn' && showDawn) return true;
            return false;
        }).forEach((period: string) => {
            Object.values(this.hours[period]).forEach((hour: string) => {
                if (availabilities[day][hour] === 0) {
                    availabilities[day][hour] = 1;
                } else {
                    availabilities[day][hour] = 0;
                }
            });
        });
        this.setState({ availabilities });
    }

    render() {
        const { availabilities, isLoading } = this.state;
        const { showMorning, showEvening, showNight, showDawn } = this.state;
        if (isLoading) return <PageLoader></PageLoader>;
        return (
            <main>
                <div className="flex-row text-center">
                    <p className={"p-1 cursor text-white font-w600 m-1 " + (
                        showMorning ? "bg-success" : "bg-secondary" ) }
                        onClick={this.toggleShowMorning}>
                        Morning
                    </p>
                    <p className={"p-1 cursor text-white font-w600 m-1 " +  (
                        showEvening ? "bg-success" : "bg-secondary" ) }
                        onClick={this.toggleShowEvening}>
                        Evening
                    </p>
                    <p className={"p-1 cursor text-white font-w600 m-1 " +  (
                        showNight ? "bg-success" : "bg-secondary" ) }
                        onClick={this.toggleShowNight}>
                        Night
                    </p>
                    <p className={"p-1 cursor text-white font-w600 m-1 " +  (
                        showDawn ? "bg-success" : "bg-secondary" ) }
                        onClick={this.toggleShowDawn}>
                        Dawn
                    </p>
                </div>
                <div className="flex-row text-center">
                    {Object.values(this.days).map((day: string) => (
                        <div key={day}>
                            <p className="p-3 cursor bg-primary text-white font-w600 m-3"
                                onClick={() => this.handleCheckAllByDay(day)}>{day}</p>
                            {Object.keys(this.hours).filter((period: string) => {
                                if (period === 'morning' && showMorning) return true;
                                if (period === 'evening' && showEvening) return true;
                                if (period === 'night' && showNight) return true;
                                if (period === 'dawn' && showDawn) return true;
                                return false;
                            }).map((period: string) => (
                                <div key={period}>
                                    {Object.values(this.hours[period]).map((hour: string) => (
                                        <p key={hour} className="mb-0">
                                            <span className={"crosshair p-2 m-1 badge badge-" + (
                                                availabilities[day][hour] ? 'success' : 'secondary' )}
                                                onClick={() => this.handleCheckTime(day, hour)}>
                                                {hour}</span>
                                        </p>
                                    ))}
                                </div>
                            ))}
                        </div>
                    ))}
                </div>
                <div className="flex-row text-center">
                    <button className="btn btn-primary m-3" onClick={this.handleSubmit}>Submit</button>
                    <button className="btn btn-secondary m-3" onClick={this.handleReset}>Reset</button>
                </div>
            </main>
        );
    }
}

if (document.getElementById('manage-availabilities')) {
    ReactDOM.render(<ManageAvailabilitiesComponent />, document.getElementById('manage-availabilities'));
}