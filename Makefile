up:
	@docker-compose up -d

stop:
	@docker-compose stop

build:
	@docker-compose up -d --build

tail:
	@docker-compose logs -f

php:
	@docker-compose exec php-fpm bash

test:
	docker exec -ti docker-phpunit-basic-php-fpm ./vendor/phpunit/phpunit/phpunit tests

.PHONY: up stop build tail php test
