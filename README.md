**Create a command/API to cache the database in laravel using redis:**

1. Create a laravel project:
        
        composer create-project laravel/laravel:^10 caching-app

2. Configure the .env file about database and cache_driver

3. Make a model and create a migration to define the schema of the students table and run the migrations to create a table in the database:

         php artisan make:model Student
         php artisan make:migration create_students_table
         php artisan migrate

5. Install redis extension using composer

        composer require predis/predis
   
6. Create a command and define the logic to cache the database
    
       php artisan make:command CacheDatabase

7. 
