import Axios from "./axios.adapter";

export class HttpService {
    /**
     * Make a GET request.
     * @param {string} url
     * @param {any} options
     * @returns {Promise}
     */
    static async get(url: string, options: any = {}): Promise<any> {
        try {
            const res = await Axios.get(url, options);
            return res.data;
        } catch(error) {
            console.error('HttpService on GET', error);
        }
    }

    /**
     * Make a POST request.
     * @param {string} url
     * @param {any} data
     * @param {any} options
     * @returns {Promise}
     */
    static async post(url: string, data: any = {}, options: any = {}): Promise<any> {
        return await Axios.post(url, data, options);
        try {
            const res = await Axios.post(url, data, options);
            return res.data;
        } catch(error) {
            console.error('HttpService on POST', error);
        }
    }

    /**
     * Make a PUT request.
     * @param {string} url
     * @param {any} data
     * @param {any} options
     * @returns {Promise}
     */
    static async put(url: string, data: any = {}, options: any = {}): Promise<any> {
        return await Axios.put(url, data, options);
        try {
            const res = await Axios.put(url, data, options);
            console.log(res);
            return res.data;
        } catch(error) {
            console.error('HttpService on PUT', error);
        }
    }
}