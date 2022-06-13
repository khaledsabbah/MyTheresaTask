build:
	cd docker && docker-compose build
up:
	cd docker && docker-compose up
stop:
	cd docker && docker-compose stop
test:
	docker exec -w /var/www/html phpfpm ./vendor/bin/phpunit
down:
	cd docker && docker-compose down
install:
	docker exec -w /var/www/html phpfpm composer install
permission:
	docker exec -w /var/www/html phpfpm sh ./afterInstall.sh

init: build up install permission
