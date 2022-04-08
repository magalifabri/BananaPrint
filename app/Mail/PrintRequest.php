<?php

namespace App\Mail;

use App\Models\Job;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Printer;

class PrintRequest extends Mailable
{
    use Queueable, SerializesModels;

    public Job $job;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($job)
    {
        $this->job = $job;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->from('noreply@bananaprint.com', config('app.name'));
        $this->replyTo($this->job->user->email, $this->job->user->name);
        $this->subject('New print request from ' . $this->job->user->name);

        return $this->view('emails.print_request', ['job', $this->job]);
    }
}
