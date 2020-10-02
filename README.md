# E-Learning Platform V1 (2018-2019)
## Made with Laravel and React/Typescript.

### Requirements
- PHP ^7.1.3
- Laravel 5.8
- React ^16.2
- Typescript ^3.6

### Scaffolding
- All project configurations will be found in `config/app.php` file
- For schema and mock data, look at `database/migrations` and `database/seeds`
- The application uses a **Service Layer**. All logic is performed inside a service file.
- The above also means: **Controller** are used to control the request flow ONLY.
- The React/Typescript (.tsx) code can be found at `resources/assets/js/react` folder.
- Refer to the [official Laravel documentation](https://laravel.com/docs/5.8) for general understading.

### Instalation
*Follow this guide to get started with the application.*

1. Create a `.env` file in the project folder
2. Copy content of `.env.example` to `.env`
3. Execute `php artisan key:generate` to generate an application key (required for encryptation)
4. Edit the `.env` as you wish. Then..

Install Composer dependencies
`composer install`

Create and populate the database
`php artisan migrate --seed`

Install Npm dependencies
`npm install`

Build JS once
`npm run dev`

Serve JS as Live Browser
`npm run watch`

### Credentials
Admin Account: **admin@app.com / admin**
Student Account: **student@app.com / student**

*Feel free to edit the users you want in the application. Edit `database/seeds/UsersTableSeeder.php`.*

### Third Party
**Iugu** - (Payment Provider in Brazil)[https://dev.iugu.com/docs/iugu-js]

### Author
Marlon Alexandri Junges Ferreira
ma.ferreira93@gmail.com
Montreal, QC - CA