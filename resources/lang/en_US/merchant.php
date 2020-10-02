<?php

return [

    'enum' => [

        'features' => [
            'frequency' => [
                'Unique' => 'Unique',
                'Once Per Week' => 'Once Per Week',
                'Twice Per Week' => 'Twice Per Week',
                'Thrice Per Week' => 'Thrice Per Week',
            ],
        ],
        'plans' => [
            'interval' => [
                'Single' => 'Single',
                'Weekly' => 'Weekly',
                'Monthly' => 'Monthly',
            ],
        ],

    ],

    'attributes' => [

        'coupon' => [
            'slug' => 'Promo Code',
            'discount' => 'Discount Amount',
            'expires_at' => 'Expires At',
        ],
        'plan' => [
            'id' => 'Plan ID',
            'name' => 'Name',
            'price' => 'Price',
            'interval' => 'Recurrence',
            'is_recommended' => 'Is Recommended',
        ],
        'features' => [
            'frequency' => 'Frequency',
            'duration' => 'Duration',
            'credits' => 'Credits',
        ],
        'subscription' => [
            'plan_id' => 'Plan',
            'quantity' => 'Quantity',
            'discount' => 'Discount',
        ],
        'invoice' => [
            'method' => 'Payment Method',
            'cc_token' => 'Credit Card Token',
        ],
        'credit_card' => [
            'number' => 'Card Number',
            'cvv' => 'CVV',
            'full_name' => 'Full Name',
            'expiration' => 'Expiration (MM/YYYY)',
        ],

    ],

    'forms' => [
        'coupon' => [
            'title' => 'Coupon Properties',
        ],
        'plan' => [
            'title' => 'Plan Properties',
        ],
        'subscribe' => [
            'title' => 'Plan Subscription Form',
            'stepper' => [
                'step1' => 'Plan',
                'step2' => 'Payment',
                'step3' => 'Summary',
            ],
            'choose_plan' => 'Select a plan to continue:',
            'choose_quantity' => 'How many credits do you need?',
            'input_coupon' => 'Have a Promo Code?',
            'choose_payment_method' => 'Select a payment method:',
            'confirm_subscription' => 'Please review your data and click on NEXT to subscribe.',
        ],
    ],

    'tables' => [
        'coupons' => [
            'title' => 'Listing Coupons',
            'headers' => [
                'identity' => 'Identification',
                'discount' => 'Discount',
                'expiration' => 'Expiration',
            ],
        ],
        'plans' => [
            'title' => 'Listing Plans',
            'headers' => [
                'identity' => 'Identity',
                'details' => 'Details',
                'features' => 'Features',
            ],
        ],
        'subscriptions' => [
            'title' => 'Listing Subscriptions',
            'headers' => [
                'identity' => 'Identity',
                'total' => 'Total',
                'state' => 'State',
            ],
        ],
        'invoices' => [
            'title' => 'Listing Invoices',
            'headers' => [
                'method' => 'Method',
                'details' => 'Details',
                'state' => 'State',
            ],
        ],
    ],

    'alerts' => [
        'coupons' => [
            'store_success' => 'Coupon Created.',
            'store_failed' => 'Fail to Create Coupon.',
            'update_success' => 'Coupon Updated.',
            'update_failed' => 'Fail to Update Coupon.',
            'destroy_success' => 'Coupon Deleted.',
            'destroy_failed' => 'Fail to Delete Coupon.',
            'valid' => 'Coupon Is Valid',
            'invalid' => 'Coupon Is Invalid',
        ],
        'plans' => [
            'store_success' => 'Plan Created.',
            'store_failed' => 'Fail to Create Plan.',
            'update_success' => 'Plan Updated.',
            'update_failed' => 'Fail to Update Plan.',
            'destroy_success' => 'Plan Deleted.',
            'destroy_failed' => 'Fail to Delete Plan.',
        ],
        'invoices' => [
            'create_info' => 'Invoice Processed. Check Your Inbox.',
            'create_success' => 'Invoice Paied. Check Your Inbox.',
            'create_failed' => 'Fail to Process Invoice. Check the Error Below.',
            'duplicate_success' => 'Invoice Duplicated. Check Your Inbox.',
            'duplicate_failed' => 'Fail to Duplicate Invoice. Check the Error Below.',
            'refresh_success' => 'Invoice Refreshed. Check Below.',
            'refresh_failed' => 'Fail to Duplicate Invoice. Check the Error Below.',
        ],
        'subscriptions' => [
            'subscribe_success' => 'Plan Subscription Requested. Check Your Inbox.',
            'subscribe_failed' => 'Fail to Request Plan Subscription.',
            'activate_success' => 'Subscription Activated. Enjoy!',
            'activate_failed' => 'Fail to Activate Subscription.',
        ],
        'subscribe' => [
            'profile_incomplete' => 'You have to completely fill your profile informations before using this feature.',
        ],
    ],

    'pages' => [
        'coupons' => [
            'title' => 'Managing Coupons',
        ],
        'plans' => [
            'title' => 'Managing Plans',
        ],
        'subscriptions' => [
            'title' => 'Managing Your Subscriptions',
        ],
        'pricing' => [
            'title' => 'Super flexible plans just for you.',
            'subtitle' => 'Step up your experience with a better plan.',
        ],
        'subscribe' => [
            'title' => 'Subscribing a Plan',
        ],
    ],

    'general' => [
        'actions' => [
            'subscribe' => 'Subscribe',
        ],
        'frequencies' => [
            'unique' => 'Unique',
            'once_per_week' => 'Once Per Week',
            'twice_per_week' => 'Twice Per Week',
            'thrice_per_week' => 'Thrice Per Week',
        ],
        'payments' => [
            'methods' => [
                'credit_card' => 'Credit Card',
                'bank_slip' => 'Bank Slip',
            ],
            'status' => [
                'draft' => 'Draft',
                'processing' => 'Processing',
                'pending' => 'Pending',
                'failed' => 'Failed',
                'approved' => 'Approved',
                'canceled' => 'Canceled',
            ],
            'alerts' => [
                'bank_slip' => [
                    'status' => 'On this modality, the payment usually is slower to be processed.',
                    'instructions' => 'We will send you an email with the next steps required for the payment.',
                ],
                'credit_card' => [
                    'status' => 'We do not store your credit card information!',
                    'instructions' => 'Please fill the following form to continue your subscription.',
                ],
            ],
        ],
        'labels' => [
            'monthly' => 'Monthly',
            'unique' => 'Unique',
            'recommended' => 'Recommended',
            'unit_price' => 'Unit Price',
            'quantity' => 'Quantity',
            'discount' => 'Discount',
            'total_price' => 'Total Price',
            'payment_method' => 'Payment Method',
            'invoices' => 'Invoices',
            'active' => 'Active',
            'pending' => 'Pending',
            'canceled' => 'Canceled',
        ],
    ],

    'placeholders' => [
        'credits' => '$:amount credit(s)',
        'duration' => ':hours hour(s)',
        'sessions' => ':amount session(s)',
    ],

];
