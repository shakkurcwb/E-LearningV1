import { HttpService } from '../core/services/http.service';

import { FormModel } from '../core/models/form.model';
import { SessionModel } from '../core/models/session.model';

export class EducationService {
    /**
     * Get Form.
     * @returns FormModel
     */
    static async getForm(id: number) {
        const res = await HttpService.get('/api/forms/' + id);
        return new FormModel().fromJson(res);
    }

    /**
     * Store Form.
     * 
     */
    static storeForm(form: FormModel) {
        return HttpService.post('/api/forms', new FormModel(form).toJson());
    }

    /**
     *  Update Form.
     * 
     */
    static updateForm(id: number, form: FormModel) {
        return HttpService.put('/api/forms/' + id, new FormModel(form).toJson());
    }

    /**
     * List Tutors.
     * @returns FormModel
     */
    static async listTutors() {
        const res = await HttpService.get('/api/schedule/tutors');
        return res;
    }

    /**
     * Schedule Sessions.
     * 
     */
    static scheduleSessions(sessions: SessionModel[]) {
        const body = sessions.map((session: Partial<SessionModel>) => new SessionModel(session).toJson());
        return HttpService.post('/api/schedule', {
            sessions: body,
        });
    }
}