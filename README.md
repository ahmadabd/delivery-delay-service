# delivery-delay-service
Its a service for notify delay of delivery food to users.

I have used Laravel 10 and Mysql as database and redis as queue manager for this project.

## Database schema
![databaseSchema](./Schema.png)

## Go to project
>> cd delivery-delay-service

## Install dependencies
>> composer install

## create .env
>> cp .env.example .env

## Running project
>> ./vendor/bin/sail up

## Running migrations
>> ./vendor/bin/sail artisan migrate

## Running seeders 
>> ./vendor/bin/sail artisan db:seed

## Running tests
>> ./vendor/bin/sail artisan test