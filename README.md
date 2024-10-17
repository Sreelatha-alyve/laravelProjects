**Create api/command to cache the students data using redis:**

1. Install WSL on windows for installing redis, WSL stands for windows subsystem for linux that provides linux environment in windows.
       
        wsl --install

2. Install redis on wsl and start the server:
   
    In wsl:
   
       sudo apt update
       sudo apt install redis-server #install the redis server
       sudo service redis-server start # to start the redis server
       sudo service redis-server status #to know the status of the redis serve
   
4. Change the config file in redis by changing the binding adress of redis to accept the connections from any ip address.
   
   In wsl:

       sudo nano /etc/redis/redis.conf

   search for bind in the redis.conf file and modify bind and protected-mode
    
        bind 0.0.0.0
        protected-mode no

5. If you want to access the xampp servers mysql then go to xampp installation dir and look for my.ini and change the binding-address to 0.0.0.0, by doing this we can access the mysql server of xampp through wsl.
   
6. Change the .env configuration by setting these values:

        CACHE_DRIVER=redis
        REDIS_HOST=172.22.80.1 # this is the ip address of the redis on wsl
        REDIS_PASSWORD=null
        REDIS_PORT=6379
   
7. Now create a command to cache the students data
        
        php artisan make:command CacheStudentData
   
    find the CacheStudentData.php under app/Console/Commands and modify the file to retrieve the students data and cache them.
   
8. Register the create command, go to app/Console/Kernel.php and add the command array:

        protected $commands = [\App\Console\Commands\CacheStudentsData::class,];

9.

