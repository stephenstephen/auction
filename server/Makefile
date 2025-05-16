# Makefile - Laravel + Docker PostgreSQL

up:
	docker-compose up

down:
	docker-compose down

restart:
	docker-compose down && docker-compose up

ps:
	docker-compose ps

migrate:
	php artisan migrate

fresh:
	php artisan migrate:fresh --seed

seed:
	php artisan db:seed

test:
	php artisan test

logs:
	docker-compose logs -f

artisan:
	php artisan

composer:
	docker run --rm -v $$(pwd):/app composer:2 composer

.PHONY: up down restart ps migrate fresh seed test logs artisan composer
