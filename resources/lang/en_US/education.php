<?php

return [

    'attributes' => [
        'form' => [
            'title' => 'Title',
            'type' => 'Type',
            'description' => 'Description',
            'tags' => 'Tags',
            'state' => 'State',
        ],
        'question' => [
            'title' => 'Question Title',
            'type' => 'Answer Type',
            'is_matchable' => 'Is Matchable',
            'show_matches' => 'Show Matches',
            'options' => 'Available Options',
            'correct_answers' => 'Correct Answers',
        ],
        'session' => [
            'student_id' => 'Student',
            'tutor_id' => 'Tutor',
            'start_at' => 'Start At',
            'end_at' => 'End At',
            'cost' => 'Cost',
            'additional_info' => 'Additional Information',
            'explanation' => 'Explanation',
        ],
    ],

    'forms' => [
        'form' => [
            'title' => 'Form Properties',
            'toolbar' => [
                'add' => 'Add Question',
            ],
        ],
        'builder' => [  
            'title' => 'Form Properties',
        ],
        'admission' => [
            'title' => 'Admission Properties',
        ],
        'audition' => [
            'title' => 'Audition Properties',
        ],
        'session' => [
            'title' => 'Session Properties',
        ],
        'lessons' => [
            'title' => 'Lesson Properties',
        ],
        'deposits' => [
            'title' => 'Deposit Properties',
        ],
        'transfers' => [
            'title' => 'Transfer Properties',
        ],
        'live' => [
            'title' => 'Live Streaming',
        ],
        'schedule' => [
            'title' => 'Schedule Sessions Form',
            'stepper' => [
                'step1' => 'Tutor',
                'step2' => 'Agenda',
                'step3' => 'Review',
            ],
        ],
    ],

    'tables' => [
        'forms' => [
            'title' => 'Listing Forms',
            'title_fixed' => 'Listing Global Forms',
            'headers' => [
                'identity' => 'Identification',
                'type' => 'Type',
                'state' => 'State',
            ],
        ],
        'admissions' => [
            'title' => 'Listing Admissions',
            'headers' => [
                'identity' => 'Identification',
                'role' => 'Role',
                'state' => 'State',
            ],
        ],
        'auditions' => [
            'title' => 'Listing Auditions',
            'headers' => [
                'identity' => 'Identification',
                'details' => 'Details',
                'status' => 'Status',
            ],
        ],
        'sessions' => [
            'title' => 'Listing Sessions',
            'headers' => [
                'identity' => 'Identification',
                'details' => 'Details',
                'state' => 'Status',
            ],
        ],
        'lives' => [
            'title' => 'Listing Lives',
            'headers' => [
                'identity' => 'Identification',
                'details' => 'Details',
                'status' => 'Status',
            ],
        ],
        'lessons' => [
            'title' => 'Listing Lessons',
            'headers' => [
                'identity' => 'Identification',
                'details' => 'Details',
                'status' => 'Status',
            ],
        ],
        'deposits' => [
            'title' => 'Listing Deposits',
            'headers' => [
                'identity' => 'Identification',
                'details' => 'Details',
                'status' => 'Status',
            ],
        ],
        'transfers' => [
            'title' => 'Listing Transfers',
            'headers' => [
                'identity' => 'Identification',
                'details' => 'Details',
                'status' => 'Status',
            ],
        ],
    ],

    'alerts' => [
        'admission' => [
            'person_incomplete' => 'You have to fill your personal informations before starting your admission.',
        ],
        'admissions' => [
            'store_success' => 'Admission Processed/Validated.',
            'store_failed' => 'Fail to Processed/Validated Admission.',
        ],
        'schedule' => [
            'profile_incomplete' => 'You have to completely fill your profile informations before using this feature.',
        ],
        'sessions' => [
            'approve_success' => 'Session Confirmed.',
            'approve_failed' => 'Fail to Confirm Session.',
            'reject_success' => 'Session Canceled.',
            'reject_failed' => 'Fail to Cancel Session.',
            'schedule_success' => 'Session(s) Scheduled. Check Your Inbox For Updates.',
            'schedule_failed' => 'Fail to Schedule Session(s).',
        ],
    ],

    'confirms' => [
        'admissions' => [
            'approve' => 'Are you sure to approve this admission?',
            'reject' => 'Are you sure to reject this admission?',
        ],
        'sessions' => [
            'approve' => 'Are you sure to confirm this session?',
            'reject' => 'Are you sure to cancel this session?',
            'explanation' => "Please explain why you cancelling this session.",
        ],
    ],

    'pages' => [
        'forms' => [
            'title' => 'Managing Forms',
            'builder' => [
                'title' => 'Building a Form',
            ],
        ],
        'admission' => [
            'title' => 'Completing Admission Form',
        ],
        'admissions' => [
            'title' => 'Managing Admissions',
            'preview' => [
                'title' => 'Previewing Admission',
            ],
        ],
        'auditions' => [
            'title' => 'Managing Auditions'
        ],
         'deposits' => [
            'title' => 'Managing Your Deposits',
        ],
        'transfers' => [
            'title' => 'Managing Transfers',
        ],
        'schedule' => [
            'title' => 'Scheduling Your Sessions',
        ],
        'lessons' => [
            'title' => 'Managing Your Lessons',
        ],
        'sessions' => [
            'title' => 'Managing Your Sessions',
            'summary' => [
                'title' => 'Session Summary',
            ],
        ],
        'live' => [
            'title' => 'Live Session',
        ],
        'lives' => [
            'title' => 'Managing Lives',
        ],
    ],

    'general' => [
    ],

    'placeholders' => [
    ],

    'components' => [
        'session_informations' => [
            'title' => 'Session Informations',
        ],
    ],

];
