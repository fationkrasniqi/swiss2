<?php

return [
    // Navigation
    'nav_dashboard'    => 'Dashboard',
    'nav_clients'      => 'Clients',
    'nav_messages'     => 'Messages',
    'nav_jobs'         => 'Jobs',
    'nav_users'        => 'Users',
    'nav_cantons'      => 'Cantons / Prices',
    'nav_view_site'    => 'View Site',
    'logout'           => 'Logout',

    // Dashboard
    'dashboard'        => 'Dashboard',
    'welcome'          => 'Welcome, :name!',
    'clients'          => 'Clients',
    'messages'         => 'Messages',
    'job_postings'     => 'Job Postings',
    'applications'     => 'Applications',
    'users'            => 'Users',
    'cantons'          => 'Cantons',

    // Shared table columns
    'col_name'         => 'Name',
    'col_email'        => 'Email',
    'col_phone'        => 'Phone',
    'col_date'         => 'Date',
    'col_actions'      => 'Actions',
    'col_status'       => 'Status',

    // Clients
    'page_clients'     => 'Clients',
    'col_canton'       => 'Canton',
    'col_services'     => 'Services',
    'no_clients'       => 'No clients yet.',

    // Messages
    'page_messages'         => 'Contact Messages',
    'col_message'           => 'Message',
    'no_messages'           => 'No messages yet.',
    'confirm_delete_msg'    => 'Delete this message?',

    // Jobs - index
    'page_jobs'             => 'Jobs Management',
    'create_job'            => 'Create New Job',
    'col_title'             => 'Title',
    'col_location'          => 'Location',
    'col_canton'            => 'Canton',
    'col_type'              => 'Type',
    'col_applications'      => 'Applications',
    'status_active'         => 'Active',
    'status_inactive'       => 'Inactive',
    'n_applications'        => ':count applications',
    'no_jobs'               => 'No jobs yet',
    'no_jobs_hint'          => 'Get started by creating your first job posting.',
    'confirm_delete_job'    => 'Are you sure you want to delete this job?',

    // Jobs - show
    'page_job_details'      => 'Job Details',
    'back_to_list'          => 'Back to list',
    'back_to_job'           => 'Back to job details',
    'btn_edit'              => 'Edit',
    'view_applications'     => 'View Applications (:count)',
    'field_status'          => 'Status',
    'field_location'        => 'Location',
    'field_employment_type' => 'Employment Type',
    'field_description'     => 'Description',
    'field_requirements'    => 'Requirements',
    'field_created'         => 'Created Date',
    'recent_applications'   => 'Recent Applications',
    'badge_new'             => 'New',
    'badge_read'            => 'Read',
    'btn_view_cv'           => 'View CV',

    // Jobs - create / edit
    'create_new_job'        => 'Create New Job',
    'edit_job'              => 'Edit Job: :title',
    'label_title_en'        => 'Title (English)',
    'label_title_de'        => 'Title (German)',
    'label_desc_en'         => 'Description (English)',
    'label_desc_de'         => 'Description (German)',
    'label_canton'          => 'Canton',
    'label_location'        => 'Location',
    'label_employment_type' => 'Employment Type',
    'opt_select'            => 'Select...',
    'opt_fulltime'          => 'Full-time',
    'opt_parttime'          => 'Part-time',
    'opt_contract'          => 'Contract',
    'opt_temporary'         => 'Temporary',
    'label_req_en'          => 'Requirements (English)',
    'label_req_de'          => 'Requirements (German)',
    'label_active'          => 'Active (visible to public)',
    'btn_save'              => 'Save Job',
    'btn_update'            => 'Update Job',
    'btn_cancel'            => 'Cancel',

    // Jobs - applications
    'applications_for'      => 'Applications for: :title',
    'total_applications'    => 'Total applications: :count',
    'col_cv'                => 'CV',
    'col_cover_letter'      => 'Cover Letter',
    'btn_download'          => 'Download',
    'btn_mark_read'         => 'Mark as Read',
    'no_applications'       => 'No applications yet.',
    'cover_letters'         => 'Cover Letters',

    // Users - index
    'page_users'            => 'Users',
    'btn_new_user'          => 'New User',
    'search_placeholder'    => 'Search by name or email…',
    'btn_search'            => 'Search',
    'col_admin'             => 'Admin',
    'col_permissions'       => 'Permissions',
    'col_registered'        => 'Registered',
    'badge_super'           => 'Super',
    'all_permissions'       => 'All',
    'no_users'              => 'No users found.',
    'confirm_delete_user'   => 'Delete :name?',
    'perm_clients'          => 'Clients',
    'perm_messages'         => 'Messages',

    // Users - create
    'create_user'           => 'Create User',
    'label_name'            => 'Name',
    'label_password'        => 'Password',
    'label_confirm_pw'      => 'Confirm Password',
    'label_is_admin'        => 'Admin',
    'label_view_clients'    => 'View Clients',
    'label_view_messages'   => 'View Messages',
    'btn_create_user'       => 'Create User',
    'saving'                => 'Saving...',
    'updating'              => 'Updating...',

    // Cantons
    'page_cantons'          => 'Canton Pricing',
    'cantons_hint'          => 'Set hourly rates for each canton. Changes update immediately for new bookings.',
    'no_cantons'            => 'No cantons found. Run the CantonSeeder to populate.',
];
