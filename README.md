
## Technical Requirements

- PHP 8.0 or higher
- Composer installed

## Installation

- First clone this Repo
- Go to project directory
- Run composer `composer install`
- Copy env file `cp .env.example .env`
- Generate laravel key `php artisan key:generate`
- Configure database and mail in .env file
- Run migrate with seeder `php artisan migrate:fresh --seed`
- Project run `php artisan serve`
