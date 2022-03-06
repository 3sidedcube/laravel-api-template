default:

lint:
	docker-compose exec -u sail "laravel.test" ./vendor/bin/php-cs-fixer fix

test-lint:
	docker-compose exec -u sail "laravel.test" ./vendor/bin/php-cs-fixer fix -v --dry-run --stop-on-violation --using-cache=no

test:
	docker-compose exec -u sail "laravel.test" ./vendor/bin/php-cs-fixer fix -v --dry-run --stop-on-violation --using-cache=no
	docker-compose exec -u sail "laravel.test" php artisan test --parallel
