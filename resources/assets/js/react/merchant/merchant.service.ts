import { HttpService } from '../core/services/http.service';

import { PlanModel } from '../core/models/plan.model';
import { InvoiceModel } from '../core/models/invoice.model';
import { CouponModel } from '../core/models/coupon.model';

export class MerchantService {
    /**
     * Get List of Plans.
     * @returns PlanModel[]
     */
    static async getPlans() {
        const res = await HttpService.get('/api/plans');
        return res.map((item: Partial<PlanModel>) => {
            return new PlanModel().fromJson(item);
        });
    }

    /**
     * Subscribe a Plan.
     * @returns Void
     */
    static async subscribePlan(invoice: InvoiceModel) {
        return await HttpService.post('/api/subscribe', invoice.toJson());
    }

    /**
     * Get Coupon by Slug Property.
     * @returns CouponModel
     */
    static async getCouponBySlug(coupon: CouponModel) {
        const res = await HttpService.post('/api/coupons/check', {
            slug: coupon.slug,
        });
        return new CouponModel().fromJson(res.data);
    }
}