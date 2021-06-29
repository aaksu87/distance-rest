## Environment
Run `docker-compose build` and `docker-compose up -d` in the project folder, then use
`docker exec -it <name_of_php_container> /bin/bash` to enter the PHP container for composer install and running the unit-test.

## Dependencies
Run `composer install`

## Call Api



## Unit Test

In php container;

`php bin/phpunit`






### Thoughts
To be honest that was not a complex assignment. Because of this, some components(try-catch, service module e.g) of my result might be overDo and against YAGNI in some sense. But general assignment structure that I'm using is like that. It was very effortless with developing symfony skeleton framework and maker bundle of it for that type of assignments and restApis.

Calculating nth of fibonacci was not so hard, finding it from the internet was much easier :) I didn't get into the negative integer. It named "negafibonacci" numbers which is different issue for this task I guess. My route works with only zero and positive integers. So my service doesn't have to deal with negative numbers also.

One last thing I realized with unit tests. With the big integers, result returns "execution time" error. So I changed the calculation with better one.