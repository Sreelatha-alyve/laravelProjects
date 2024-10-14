**Create an artisan command to bulk update the database**:
1. Create a db in mysql and update the .env file in laravel app

2. Create a migration to define the schema of students table

        php artisan make:migration create_students_table

3. Run the migration to create the table in the mysql server
        
        php artisan migrate
    
    columns of students table: id, name, class, country, major, created_at & updated_at.

4. Now insert some values into the students table and country name = United States of America for 20 entries and rest others like China, India & Nepal.
    
5. Create an artisan command to update the database.

        php artisan make:command UpdateCountryName

    the above command genereates a UpdateCountryName.php file in app/Console/Commands , modify the file by defining logic to change the country name 'United States of America' to 'USA'

6. Register the above created command by modifying the kernel.php file at app/Console/ 

        protected $commands = [ \App\Console\Commands\UpdateCountryName::class,];

7. Run the command UpdateCountryName
    
        php artisan students:update-country

8. Verify the change.
