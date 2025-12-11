.PHONY: help up down install shell php restart logs phpstan

help: ## Show this help message
	@echo 'Usage: make [target]'
	@echo ''
	@echo 'Available targets:'
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "  \033[36m%-15s\033[0m %s\n", $$1, $$2}'

up: ## Start the container
	docker-compose up -d

down: ## Stop the container
	docker-compose down

install: ## Install composer dependencies
	docker-compose exec php composer install

update: ## Update composer dependencies
	docker-compose exec php composer update

shell: ## Access container shell
	docker-compose exec php sh

php: ## Run PHP command (usage: make php CMD="script.php")
	docker-compose exec php php $(CMD)

composer: ## Run composer command (usage: make composer CMD="require package/name")
	docker-compose exec php composer $(CMD)

restart: ## Restart the container
	docker-compose down
	docker-compose up -d

logs: ## Show container logs
	docker-compose logs -f php

test: ## Run PHPUnit tests
	docker-compose exec php vendor/bin/phpunit

phpstan: ## Run PHPStan static analysis
	docker-compose exec php vendor/bin/phpstan analyse

style-fix:
	docker compose exec --env XDEBUG_MODE=off php php ./vendor/bin/php-cs-fixer fix src
	docker compose exec --env XDEBUG_MODE=off php php ./vendor/bin/php-cs-fixer fix tests
