**Create a model and save data to db:**
1. update the .env file and modify the Database details
           
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=learningdb
        DB_USERNAME=root
        DB_PASSWORD=
2. Create a migration:
    Migration is used to define the schema of a table.
   
        php artisan make:migration create_ideas_table
    The above command creates a file under Database directory -> Migrations directory -> create_ideas_table, modify the schema definition to add few more column names.
   
        Schema::create('ideas', function (Blueprint $table) {
            $table->id();
            $table->string('content');
            $table->unsignedInteger('likes')->default(0);
            $table->timestamps();
        });
   
4.
   
    
