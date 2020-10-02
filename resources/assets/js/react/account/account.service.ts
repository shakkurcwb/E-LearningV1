import { HttpService } from '../core/services/http.service';

export class AccountService {

    /**
     * Get User.
     * @returns Any
     */
    static async getUser() {
        const res = await HttpService.get('/api/user');
        return res;
    }

    /**
     * Get Availabilities.
     * @returns Any
     */
    static async getAvailabilities() {
        const res = await HttpService.get('/api/availabilities');
        return res;
    }

    /**
     * Save Availabilities.
     * @returns Void
     */
    static async saveAvailabilities(availabilities: any) {
        return await HttpService.post('/api/availabilities', { availabilities: { ...availabilities } });
    }
}