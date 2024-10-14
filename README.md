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
        MAIL_FROM_ADDRESS="gounipallesreelatha@example.com"
        MAIL_FROM_NAME="${APP_NAME}"
3. Create a new mailable class named TestEmail that uses a Markdown template for email content.
    
        php artisan make:mail TestEmail --markdown=emails.test
       
      A mailable class is used to send emails in laravel, it consists of logic like setting the recipient, subject, and the email content."--markdown=emails.test" this option tells that mailable class should use        the markdown template which simplifies the process of designing email layouts with pre-styled components.

      The above command will generate the following:
       i) TestEmail.php class in app/Mail/
       ii) test.blade.php template in Resources/views/emails/

4. Create a job to send the emails.
    
           
            
