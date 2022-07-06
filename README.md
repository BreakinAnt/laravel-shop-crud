### Requirements
- PHP 7.4 or superior
- Laravel 8.0
- Database server (MySQL 8.0 is recommended)

### How to run
- Run ```composer install```, ``` php artisan key:generate ``` and ``` php artisan migrate ``` by order.
- You can run ``` php artisan db:seed --class=FactorySeeder ``` to populate your database with fake data.
- Start the project by running ``` php artisan serve ```

Note: this project uses Laravel's Mail Facade, be sure to configure your .env correctly.
