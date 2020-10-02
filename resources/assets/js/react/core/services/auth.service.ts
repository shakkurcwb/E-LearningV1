import { HttpService } from './http.service';

export class AuthService {
    /**
     * Get User.
     * @returns Any
     */
    static async getUser() {
        const res = await HttpService.get('/api/user');
        return res;
    }
}