<?php

namespace App\Http\Controllers;

use App\Jobs\SendTestEmail;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function sendEmail()
    {
        $emailData = [
            'message' => 'This is a test email using MailHog!',
        ];

        // Dispatch the job to send the email
        SendTestEmail::dispatch($emailData);

        return 'Email has been sent!';
    }
}
