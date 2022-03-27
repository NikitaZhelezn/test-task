#!/bin/

cp .env.example .env
cd laradock
docker-compose exec workspace composer install
docker-compose exec workspace chmod 777 -R /var/www
docker-compose exec workspace php artisan key:generate
docker-compose exec workspace php artisan migrate
docker-compose exec workspace php artisan db:seed
docker-compose exec workspace yarn install
docker-compose exec workspace yarn run prod
