<?php

namespace App\Mail;

use App\Models\Job;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PrintRequestMd extends Mailable
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
//        $this->from('from.example@example.com', 'Example');
//        $this->replyTo('replyTo@example.com', 'Reply To');
        $this->subject('New print request from ' . $this->job->user->name);

        return $this->markdown('emails.print_request_md')
            ->with('job', $this->job);
    }
}
