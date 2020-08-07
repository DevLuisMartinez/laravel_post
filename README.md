## Laravel Blogging Platform

This is a proect test to implements laravel concepts, you can use this for check the code.

## How to Run

After Clone The Project, you need to run this commmands...

- php artisan composer install

    Install all composer project dependencies

- cp .env.example .env

    Generate a .env file to setting project
    Create a database and setting .env file
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=db-name
    DB_USERNAME=your-user
    DB_PASSWORD=your-pass

- php artisan key:generate

    Generate laravel key

- php artisan migrate

    Generate databases tables

- php artisan run:seed

    Save some data into database

Well Done, happy coding...

- if you need to get some posts from an external API

    RUN THIS

    - php artisan schedule:run
    
## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
