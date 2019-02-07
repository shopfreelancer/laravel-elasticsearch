# Laravel Elasticsearch

Example Application using to show how to integrate Elasticsearch into Laravel.

There is a Docker setup included which may or may not be used. It includes Nginx, PHP FPM7.2, MySQL 5.7, Elasticsearch 6.5, Kibana 

Otherwise you need to set up your server by yourself. 

## What it does 
There are a few routes that can be used.
Use http://localhost/articles to list articles in database. Eloquent only, no elasticsearch.

Route to add one article GET http://localhost/article/insert

Now search with elasticsearch http://localhost/search?q=omnis

The power of elasticsearch will come into play when using Lucene parameters in the search. In  
class ElasticsearchArticlesRepository `'fields' => ['title^5', 'body', 'tags']` so title weights five times more.

Your Kibana Dashboard for Elasticsearch should run at http://localhost:5601/

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

The reindex should be fired every time the es container had to be restarted. The es cluster works like a cache so data is not 
persisted over there.

Disable the elasticseach and use only Eloquent models with MySQL with environment variable SEARCH_ENABLED=false

## More
This project is based on the tutorial https://madewithlove.be/how-to-integrate-your-laravel-app-with-elasticsearch/ 

Docs of Elasticsearch PHP go here https://www.elastic.co/guide/en/elasticsearch/client/php-api/current/_quickstart.html