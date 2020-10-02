import * as React from 'react';

export function ProgressBar(props: any) {
    const percent = props.percent;
    return (
        <div className="progress rounded-0"
            data-wizard="progress"
            style={{ height: 8 + 'px' }}>
            <div className="progress-bar progress-bar-striped progress-bar-animated"
                role="progressbar" style={{ width: percent + '%' }}
                aria-valuenow={ percent } aria-valuemin={ 0 } aria-valuemax={ 100 }></div>
        </div>
    );
}