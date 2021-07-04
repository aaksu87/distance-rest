## Environment
Run `docker-compose build` and `docker-compose up -d` in the project folder, then use
`docker exec -it <name_of_php_container> /bin/bash` to enter the PHP container for composer install and running the unit-test.

## Dependencies

In php container;

Run `composer install`

## Call Api - Documentation

http://localhost:8080/api/documentation

## Unit Test

In php container;

`php artisan test`
