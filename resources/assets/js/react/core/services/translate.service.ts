export class TranslateService {
    protected locale: string;
    private data: any;

    constructor() {
        try {
            if (window['Laravel'].locale) {
                this.locale = window['Laravel'].locale;
            }
            if (window['Laravel'].lang) {
                this.data = window['Laravel'].lang;
            }
        } catch(error) {
            console.error('TranslateService', error);
        }
    }

    /** Get translation value from a string key. */
    public get(key: string): string {
        return this.instant(key);
    }

    /** Transform key and values to a human readable string. */
    public transform(key: string, values: any): string {
        let message = this.instant(key);
        const filters = Object.keys(values);
        filters.forEach((name: string) => {
            const pos = message.search(':' + name);
            if (pos >= 0) {
                message = message.replace(':' + name, values[name]);
            }
        });
        return message;
    }

    /** Read object value from a string in dot notation. */
    private instant(key: string): string {
        if (this.data) {
            return key.split(".").reduce(function(o, x) { return o[x] }, this.data);
        }
        return "";
    }
}