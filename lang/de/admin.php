<?php

return [
    // Navigation
    'nav_dashboard'    => 'Dashboard',
    'nav_clients'      => 'Klienten',
    'nav_messages'     => 'Nachrichten',
    'nav_jobs'         => 'Stellen',
    'nav_users'        => 'Benutzer',
    'nav_cantons'      => 'Kantone / Preise',
    'nav_view_site'    => 'Website ansehen',
    'logout'           => 'Abmelden',

    // Dashboard
    'dashboard'        => 'Dashboard',
    'welcome'          => 'Willkommen, :name!',
    'clients'          => 'Klienten',
    'messages'         => 'Nachrichten',
    'job_postings'     => 'Stellenangebote',
    'applications'     => 'Bewerbungen',
    'users'            => 'Benutzer',
    'cantons'          => 'Kantone',

    // Shared table columns
    'col_name'         => 'Name',
    'col_email'        => 'E-Mail',
    'col_phone'        => 'Telefon',
    'col_date'         => 'Datum',
    'col_actions'      => 'Aktionen',
    'col_status'       => 'Status',

    // Clients
    'page_clients'     => 'Klienten',
    'col_canton'       => 'Kanton',
    'col_services'     => 'Leistungen',
    'no_clients'       => 'Noch keine Klienten.',

    // Messages
    'page_messages'         => 'Kontaktnachrichten',
    'col_message'           => 'Nachricht',
    'no_messages'           => 'Noch keine Nachrichten.',
    'confirm_delete_msg'    => 'Diese Nachricht wirklich löschen?',

    // Jobs - index
    'page_jobs'             => 'Stellenverwaltung',
    'create_job'            => 'Neue Stelle erstellen',
    'col_title'             => 'Titel',
    'col_location'          => 'Standort',
    'col_canton'            => 'Kanton',
    'col_type'              => 'Typ',
    'col_applications'      => 'Bewerbungen',
    'status_active'         => 'Aktiv',
    'status_inactive'       => 'Inaktiv',
    'n_applications'        => ':count Bewerbungen',
    'no_jobs'               => 'Noch keine Stellen',
    'no_jobs_hint'          => 'Erstellen Sie jetzt Ihr erstes Stellenangebot.',
    'confirm_delete_job'    => 'Möchten Sie diese Stelle wirklich löschen?',

    // Jobs - show
    'page_job_details'      => 'Stellendetails',
    'back_to_list'          => 'Zurück zur Liste',
    'back_to_job'           => 'Zurück zu Stellendetails',
    'btn_edit'              => 'Bearbeiten',
    'view_applications'     => 'Bewerbungen ansehen (:count)',
    'field_status'          => 'Status',
    'field_location'        => 'Standort',
    'field_employment_type' => 'Beschäftigungsart',
    'field_description'     => 'Beschreibung',
    'field_requirements'    => 'Anforderungen',
    'field_created'         => 'Erstellungsdatum',
    'recent_applications'   => 'Aktuelle Bewerbungen',
    'badge_new'             => 'Neu',
    'badge_read'            => 'Gelesen',
    'btn_view_cv'           => 'Lebenslauf ansehen',

    // Jobs - create / edit
    'create_new_job'        => 'Neue Stelle erstellen',
    'edit_job'              => 'Stelle bearbeiten: :title',
    'label_title_en'        => 'Titel (Englisch)',
    'label_title_de'        => 'Titel (Deutsch)',
    'label_desc_en'         => 'Beschreibung (Englisch)',
    'label_desc_de'         => 'Beschreibung (Deutsch)',
    'label_canton'          => 'Kanton',
    'label_location'        => 'Standort',
    'label_employment_type' => 'Beschäftigungsart',
    'opt_select'            => 'Auswählen...',
    'opt_fulltime'          => 'Vollzeit',
    'opt_parttime'          => 'Teilzeit',
    'opt_contract'          => 'Vertrag',
    'opt_temporary'         => 'Temporär',
    'label_req_en'          => 'Anforderungen (Englisch)',
    'label_req_de'          => 'Anforderungen (Deutsch)',
    'label_active'          => 'Aktiv (öffentlich sichtbar)',
    'btn_save'              => 'Stelle speichern',
    'btn_update'            => 'Stelle aktualisieren',
    'btn_cancel'            => 'Abbrechen',

    // Jobs - applications
    'applications_for'      => 'Bewerbungen für: :title',
    'total_applications'    => 'Gesamte Bewerbungen: :count',
    'col_cv'                => 'Lebenslauf',
    'col_cover_letter'      => 'Motivationsschreiben',
    'btn_download'          => 'Herunterladen',
    'btn_mark_read'         => 'Als gelesen markieren',
    'no_applications'       => 'Noch keine Bewerbungen.',
    'cover_letters'         => 'Motivationsschreiben',

    // Users - index
    'page_users'            => 'Benutzer',
    'btn_new_user'          => 'Neuer Benutzer',
    'search_placeholder'    => 'Nach Name oder E-Mail suchen…',
    'btn_search'            => 'Suchen',
    'col_admin'             => 'Admin',
    'col_permissions'       => 'Berechtigungen',
    'col_registered'        => 'Registriert',
    'badge_super'           => 'Super',
    'all_permissions'       => 'Alle',
    'no_users'              => 'Keine Benutzer gefunden.',
    'confirm_delete_user'   => ':name wirklich löschen?',
    'perm_clients'          => 'Klienten',
    'perm_messages'         => 'Nachrichten',

    // Users - create
    'create_user'           => 'Benutzer erstellen',
    'label_name'            => 'Name',
    'label_password'        => 'Passwort',
    'label_confirm_pw'      => 'Passwort bestätigen',
    'label_is_admin'        => 'Admin',
    'label_view_clients'    => 'Klienten anzeigen',
    'label_view_messages'   => 'Nachrichten anzeigen',
    'btn_create_user'       => 'Benutzer erstellen',
    'saving'                => 'Wird gespeichert...',
    'updating'              => 'Wird aktualisiert...',

    // Cantons
    'page_cantons'          => 'Kantonpreise',
    'cantons_hint'          => 'Stundensätze für jeden Kanton festlegen. Änderungen gelten sofort für neue Buchungen.',
    'no_cantons'            => 'Keine Kantone gefunden. Führen Sie den CantonSeeder aus.',
];
