import * as React from 'react';

export function PageLoader(props: any) {
    const color = props.color;
    return (
        <section className="py-4 text-center">
            <div className={ "spinner-border fa-6x text-" + ( color ? color : 'dark' ) } role="status">
                <span className="sr-only">Loading...</span>
            </div>
        </section>
    );
};