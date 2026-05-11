<?php

namespace App\Notifications;

use App\Models\JobApplication;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewJobApplicationNotification extends Notification implements ShouldQueue
{
    use Queueable;

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
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Aplikim i Ri për Punë: ' . $this->application->job->title)
            ->greeting('Njoftim i Ri!')
            ->line('Keni marrë një aplikim të ri për pozicionin: **' . $this->application->job->title . '**')
            ->line('**Aplikanti:** ' . $this->application->first_name . ' ' . $this->application->last_name)
            ->line('**Email:** ' . $this->application->email)
            ->line('**Telefoni:** ' . $this->application->phone)
            ->action('Shiko Aplikimin', url('/admin/jobs/' . $this->application->job_id))
            ->line('Faleminderit për përdorimin e platformës sonë!');
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
