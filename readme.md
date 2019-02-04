# Laravel Elasticsearch

Example Application using Laravel Framework with Elasticsearch.

There is a Docker setup included which may or may not be used. It includes Nginx, PHP FPM7.2, MySQL, Elasticsearch 5.6. 

Otherwise you need to set up your server by yourself. 

## Development


Start Docker
````
cd _DOCKER/nginx
docker-compose up
````

Create your .env file
````
cd www  
mv .env.example .env
````

Run on migrations on server and seed testing data
```
cd www 
php artisan migrate
php artisan db:seed 
```