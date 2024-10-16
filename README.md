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
6. 
        
        


        
        
