build:
	composer install
	npm install
	php artisan migrate
	php artisan db:seed
	npm run build
