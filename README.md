**Create a command/API to cache the database in laravel using redis:**

1. Create a laravel project:
        
        composer create-project laravel/laravel:^10 caching-app

2. Configure the .env file about database and cache_driver

3. Make a model and create a migration to define the schema of the students table and run the migrations to create a table in the database:

         php artisan make:model Student
         php artisan make:migration create_students_table
         php artisan migrate

4. Download the Redis from here https://github.com/microsoftarchive/redis/releases and install redis extension using composer

        composer require predis/predis
   
5. Create a command and define the logic to cache the database by fetching records from students table.
    
       php artisan make:command CacheStudents

6. Register the command by going to the app/Console/Kernel.php and add the CacheStudents class to the commands array.
    
        protected $commands = [ \App\Console\Commands\CacheStudents::class,];

7. Create a route defining the api end point to retrieve the cached data, get the cached data if it's not cached then cache the data and retrieve it again.

8. Run the redis server
    
        redis-server

9. Now run the cache command to cache the students data
        
        php artisan cache:students

10. Now try to access the url to see the cached data
    
        http://127.0.0.1:8000/api/students

