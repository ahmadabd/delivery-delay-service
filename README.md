# delivery-delay-service
Its a service for notify delay of delivery food to users.

I have used Laravel 10 and Mysql as database and redis as queue manager for this project.

## Running project
>> ./vendor/bin/sail up
or
>> ./vendor/bin/sail up -d

## Running migrations
>> ./vendor/bin/sail artisan migrate

## Running seeders 
>> ./vendor/bin/sail artisan db:seed

## Running tests
>> ./vendor/bin/sail artisan test