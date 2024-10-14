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

      Modify the test.blade.php to display the content to the recipient, modify TestEmail.php to send message to recipient updating the build() function that is used to configure the contents of the email and           return the test.blade.php view. 
        
5. Create a job to send the emails. This job is responsible for handling the sending of an email asynchronously by queuing the task. 
    
        php artisan make:job SendTestEmail
    
    This will generate a file named SendTestEmail.php in app/jobs/
    
    Modify the file to use the TestEmail mailable class to send the emails.handle() function contains the main logic responsible for sending the emails, like creating instance of mailable class each time to send      an email.

6. Dispatching the job using the controller class.
    
        php artisan make:controller EmailController
    
    dispatch the job using the EmailController class.

7. Test the working of the job, 
    
    i) run the laravel app
    ii) navigate to the url http://localhost:8000/send-email
    iii) open mail hog server http://localhost:8025/
