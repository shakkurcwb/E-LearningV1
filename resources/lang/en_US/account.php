<?php

return [

    'attributes' => [
        'user' => [
            'role' => 'Role',
            'state' => 'State',
            'name' => 'Username',
            'email' => 'Email Address',
            'password' => 'Password',
            'password_confirmation' => 'Password Confirmation',
        ],
        'person' => [
            'first_name' => 'First Name',
            'middle_names' => 'Middle Names',
            'last_name' => 'Last Name',
            'document' => 'Document',
            'birth' => 'Date of Birth',
            'gender' => 'Gender',
            'nationality' => 'Nationality',
        ],
        'address' => [
            'address' => 'Address',
            'number' => 'Number',
            'unit' => 'Unit',
            'complement' => 'Complement',
            'district' => 'District',
            'city' => 'City',
            'zip_code' => 'Zip Code',
            'province' => 'Province',
            'country' => 'Country',
        ],
        'phone' => [
            'country_prefix' => 'Country Prefix',
            'prefix' => 'Prefix',
            'phone' => 'Phone Number',
            'allow_messages' => 'Allow Messages',
        ],
        'bank_account' => [
            'bank' => 'Bank',
            'agency' => 'Agency',
            'account' => 'Account',
            'preferred_currency' => 'Preferred Currency',
        ],
        'settings' => [
            'theme' => 'Theme',
            'locale' => 'Locale',
            'timezone' => 'Timezone',
            'currency' => 'Currency',
            'avatar' => 'Avatar',
            'background' => 'Background',
            'allow_newsletters' => 'Allow Newsletters',
            'show_hints' => 'Show Quest Log',
        ],
        'preferences' => [
            'biography' => 'Biography',
            'video' => 'YouTube Video',
            'allow_trial_sessions' => 'Allow Trial Sessions',
            'allow_public_view' => 'Allow Public View',
            'availabilities' => 'Availabilities',
        ],
        'feedback' => [
            'subject' => 'Subject',
            'description' => 'Description',
        ],
    ],

    'forms' => [
        'user_basic' => [
            'title' => 'Basic Information',
        ],
        'user_full' => [
            'title' => 'Main Information',
        ],
        'person' => [
            'title' => 'Personal Information',
        ],
        'address' => [
            'title' => 'Address Information',
        ],
        'phone' => [
            'title' => 'Phone Information',
        ],
        'bank_account' => [
            'title' => 'Bank Account Information',
        ],
        'settings' => [
            'settings' => [
                'title' => 'Custom Settings',
            ],
            'avatar' => [
                'title' => 'Public Avatar',
            ],
            'background' => [
                'title' => 'Background Image',
            ],
        ],
        'preferences' => [
            'title' => 'Main Preferences',
        ],
        'feedback' => [
            'title' => 'Describe Issues Or Share Ideas',
        ],
        'availabilities' => [
            'title' => 'Listing Availabilities',
            'instructions' => 'In this board you can manage your week availability.',
            'warning' => 'Only the selected times will be presented to the students.',
        ],
    ],

    'tables' => [
        'users' => [
            'title' => 'Listing Users',
            'headers' => [
                'identity' => 'Identity',
                'role' => 'Role',
                'state' => 'State',
            ],
        ],
        'notifications' => [
            'title' => 'Listing Notifications',
            'headers' => [
                'type' => 'Type',
                'content' => 'Content',
                'state' => 'State',
            ],
        ],
    ],

    'alerts' => [
        'users' => [
            'store_success' => 'User Created.',
            'store_failed' => 'Fail to Create User.',
            'update_success' => 'User Updated.',
            'update_failed' => 'Fail to Update User.',
            'destroy_success' => 'User Deleted.',
            'destroy_failed' => 'Fail to Delete User.',
        ],
        'account' => [
            'person' => [
                'update_success' => 'Personal Informations Updated.',
                'update_failed' => 'Fail to Update Personal Informations.',
            ],
            'address' => [
                'update_success' => 'Address Informations Updated.',
                'update_failed' => 'Fail to Update Address Informations.',
            ],
            'phone' => [
                'update_success' => 'Phone Informations Updated.',
                'update_failed' => 'Fail to Update Phone Informations.',
            ],
            'bank_account' => [
                'update_success' => 'Bank Account Informations Updated.',
                'update_failed' => 'Fail to Update Bank Account Informations.',
            ],
            'update_success' => 'Account Informations Updated.',
            'update_failed' => 'Fail to Update Account Informations.',
        ],
        'settings' => [
            'update_success' => 'Settings Updated.',
            'update_failed' => 'Fail to Update Settings.',
            'basic' => [
                'update_success' => 'Basic Informations Updated.',
                'update_failed' => 'Fail to Update Basic Informations.',
            ],
            'avatar' => [
                'update_success' => 'Avatar Updated.',
                'update_failed' => 'Fail to Update Avatar.',
            ],
            'background' => [
                'update_success' => 'Background Updated.',
                'update_failed' => 'Fail to Update Background.',
            ],
        ],
        'preferences' => [
            'update_success' => 'Preferences Updated.',
            'update_failed' => 'Fail to Update Preferences.',
        ],
        'feedback' => [
            'store_success' => 'Feedback Sent. Thanks For Your Cooperation!',
            'store_failed' => 'Fail to Send Feedback. Try Again Later.',
        ],
        'notifications' => [
            'read_success' => 'Notification Read.',
            'read_failed' => 'Fail to Mark Notification as Read.',
            'unread_success' => 'Notification Unread.',
            'unread_failed' => 'Fail to Mark Notification as Unread.',
        ],
    ],

    'confirms' => [
        'notifications' => [
            'mark_as_read' => 'Mark notification as read?',
            'mark_as_unread' => 'Mark notification as unread?',
        ],
    ],

    'pages' => [
        'users' => [
            'title' => 'Managing Our Users',
        ],
        'account' => [
            'title' => 'Managing Your Account',
            'profile_progress' => 'Your profile is :progress% filled.',
        ],
        'settings' => [
            'title' => 'Managing Your Settings',
        ],
        'preferences' => [
            'title' => 'Managing Your Preferences',
            'preferences_progress' => 'Your preferences are :progress% filled.',
        ],
        'feedback' => [
            'title' => 'Send Feedback',
        ],
        'notifications' => [
            'title' => 'Managing Your Notifications',
        ],
        'availabilities' => [
            'title' => 'Managing Your Availabilities',
        ],
    ],

    'labels' => [
        'mark_as_read' => 'Mark as Read',
        'mark_as_unread' => 'Mark as Unread',
        'not_readed' => 'Not Read',
        'readed' => 'Read',
    ],

    'components' => [
        'user_informations' => [
            'title' => 'User Informations',
        ],
    ],

];
