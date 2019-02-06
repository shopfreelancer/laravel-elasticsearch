# Laravel Elasticsearch

Example Application using to show how to integrate Elasticsearch into Laravel.

There is a Docker setup included which may or may not be used. It includes Nginx, PHP FPM7.2, MySQL, Elasticsearch 5.6. 

Otherwise you need to set up your server by yourself. 

## What it does 
There are two routes that can be used.
Use http://localhost/articles to list articles in database. Eloquent only, no elasticsearch.

Now search with elasticsearch http://localhost/search?q=omnis

The power of elasticsearch will come into play when using Lucene parameters in the search. In  
class ElasticsearchArticlesRepository `'fields' => ['title^5', 'body', 'tags']` so title weights five times more.

## Development

Start Docker Containers
````
cd _DOCKER/nginx
docker-compose up
````
This should build your containers. App runs on port :80 so application goes at http://localhost

Create your .env file in Laravel
````
cd www
mv .env.example .env
````

Run migrations on server and seed database with testing data. Fill elasticsearch.
```
docker exec -it nginx_php-es_1 bash
php artisan migrate
php artisan db:seed
php artisan search:reindex 
```

Disable the elasticseach and use only Eloquent models with MySQL with environment variable SEARCH_ENABLED=false

Based on the tutorial https://madewithlove.be/how-to-integrate-your-laravel-app-with-elasticsearch/ 