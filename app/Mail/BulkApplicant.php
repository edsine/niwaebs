<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Modules\EmployerManager\Models\Employer;

class BulkApplicant extends Mailable
{
    use Queueable, SerializesModels;

    public $employer;
    public $password;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Employer $employer, $password)
    {
        $this->employer = $employer;
        $this->password = $password;
        //
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    // public function envelope()
    // {
    //     return new Envelope(
    //         subject: 'Bulk Applicant',
    //     );
    // }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    // public function content()
    // {
    //     return new Content(
    //         view: 'view.name',
    //     );
    // }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    // public function attachments()
    // {
    //     return [];
    // }

    // public function build()
    // {
    //     return $this->subject('E-NIWA REGISTRATION SUCCESSFUL')
    //         ->to($this->employer->company_email)->view('emails.applicant');
    // }

    public function build()
    {
        return $this->view('emails.applicant')->with([
            'employer' => $this->employer,
            'password' => $this->password,
        ]);
    }
}
