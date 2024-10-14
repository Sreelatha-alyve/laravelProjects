<?php

namespace App\Jobs;

use App\Mail\TestEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendTestEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public $emailData;
    public function __construct($emailData)
    {
        //
        $this->emailData=$emailData;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        // Send email using the TestEmail Mailable
        Mail::to('recipient@example.com')->send(new TestEmail($this->emailData));
    }
}
