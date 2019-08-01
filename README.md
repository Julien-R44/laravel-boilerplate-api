# Laravel-boilerplate-api

Built on top of :
- [Laradock](https://github.com/laradock/laradock)
- [Laravel-cors](https://github.com/barryvdh/laravel-cors)
- [JWT-auth](https://github.com/tymondesigns/jwt-auth) 
- [Laravel-uuid](https://github.com/webpatser/laravel-uuid) (to use UUID as PK for some models)
- [Telescope](https://github.com/laravel/telescope) (only for dev environnement)

## Requirements
You must have docker and composer installed.

## Setup
By default the boilerplate is using PostgreSQL as RDBMS and Nginx, but you can change it for anything you want. Check the laradock documentation for launching the needed containers. This setup documentation assumes you will using PostgreSQL and Nginx.

```
# Create project from this repository
composer create-project julien-r44/laravel-boilerplate-api myProjectName -s dev
cd myProjectName

# Set the .env file of Laradock. You can customize it for matching your needs.
cp laradock/env-example laradock/.env

# If you run docker on windows check this issue related to postgres container and update your docker-compose.yml https://github.com/laradock/laradock/issues/1188

# Run Nginx, Redis, Postgres and Pgadmin containers
composer dockerize

# Set .env file of laradock project. You may have to edit it according to your needs.
cp .env.example .env

# Access the laradock workspace to run artisan's commands
docker exec -it laradock_workspace_1 bash

# Generate secret keys
php artisan key:generate
php artisan jwt:secret

# Migrate the database
php artisan migrate:fresh --seed
```
You can also PgAdmin by typing `localhost:5050` in your browser and login with following default credentials ( defined in laradock/.env ) :
- pgadmin4@pgadmin.org / admin

Telescope is available by default in : `localhost/telescope`

By default, the Users table is configured to use Uuid as primary key.


