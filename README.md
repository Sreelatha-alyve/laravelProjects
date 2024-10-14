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

6.
   
