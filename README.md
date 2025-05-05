<img src="/public/serviatory.png" alt="Serviatory">

## About Serviatory
Seviatory is a site for reservation of specific created services and with a dashboard for admins to handle things going on with the whole site so to set up it, you need to:


## Requirements
- PHP > 8.1
- Composer
- Node.js & NPM
- MySQL
- Server like laragon or xampp


## About Setup of serviatory

- clone the repository with "git clone https://github.com/omerelkholy/Serviatory.git".
- open terminal and write "composer install".
- then you need node in your pc and then write "npm install".
- then write "cp .env.example .env".
- then write "php artisan key:generate".
- to make the server open, you need laragon, laravel herd or xampp
- write "php artisan migrate".
- to make the project work locally properly, write "npm run dev" and "php artisan serve".
- In .env, make sure that: <br>
  DB_CONNECTION=mysql <br>
  DB_HOST=127.0.0.1 <br>
  DB_PORT=3306 <br>
  DB_DATABASE=your_database <br>
  DB_USERNAME=your_username <br>
  DB_PASSWORD=your_password <br>


## tool choices and design decisions
- <strong>Breeze</strong> package for authentication
- <strong>Tailwind CSS</strong> at the most of the project to have fancy and clean UI
- <strong>MySQL</strong> for database.
- <strong>MVC</strong> design pattern


