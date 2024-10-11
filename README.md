**Steps:**

1. Download and run Mailhog, the mailhog UI can be accessed using the following url: 

        http://localhost:8025/
2. Configure .env file's Mail details, indicating laravel to use Mailhog

        MAIL_MAILER=smtp
        MAIL_HOST=localhost
        MAIL_PORT=1025
        MAIL_USERNAME=null
        MAIL_PASSWORD=null
        MAIL_ENCRYPTION=null
        MAIL_FROM_ADDRESS="hello@example.com"
        MAIL_FROM_NAME="${APP_NAME}"
3. Create a mailable class, that defines the email content.
    
        php artisan make:mail UserNotificationMail
       
   Modify the contents of the file like the message or body of the email, subject and attachments.

4. Create a job to send the emails.
    
           
            
