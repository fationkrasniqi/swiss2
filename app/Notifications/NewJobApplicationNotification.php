<?php

namespace App\Notifications;

use App\Models\JobApplication;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewJobApplicationNotification extends Notification
{
    /**
     * Create a new notification instance.
     */
    public function __construct(
        public JobApplication $application
    ) {}

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Neue Bewerbung: ' . $this->application->job->getLocalizedTitle())
            ->greeting('Neue Bewerbung eingegangen!')
            ->line('Sie haben eine neue Bewerbung für die Position erhalten: **' . $this->application->job->getLocalizedTitle() . '**')
            ->line('**Bewerber:** ' . $this->application->first_name . ' ' . $this->application->last_name)
            ->line('**E-Mail:** ' . $this->application->email)
            ->line('**Telefon:** ' . $this->application->phone)
            ->action('Bewerbung ansehen', url('/admin/jobs/' . $this->application->job_id))
            ->line('Vielen Dank für die Nutzung unserer Plattform!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'job_id' => $this->application->job_id,
            'job_title' => $this->application->job->title,
            'applicant_name' => $this->application->first_name . ' ' . $this->application->last_name,
            'applicant_email' => $this->application->email,
            'application_id' => $this->application->id,
        ];
    }
}
