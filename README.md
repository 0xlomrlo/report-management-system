<p align="center"><img src="https://lomrlo.me/up/01.png"></p><br />



## Installation

First, clone the repository to your local machine:

```bash
git clone https://github.com/0xlomrlo/Report-Management-System.git
```

Composer install:

```bash
cd Report-Management-System
composer install
```

Setup the configuration file:

```bash
cp .env.example .env
```

Modify the configuration file (.env):

```bash
DB_HOST=127.0.0.1
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```

Migrate tables and seed fakers:

```bash
php artisan migrate --seed
```

Finally, run the development server:

```bash
php artisan serve
```

The project will be available at **127.0.0.1:8000**.

Username: **admin** Password: **secret**




Made with ❤️ by Waleed Alharbi.