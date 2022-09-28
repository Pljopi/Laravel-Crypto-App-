# Crypto price app and webstie

---

- Simple CLI app and website
- This is a learning project in a unfinished stage, it is still being updated.
- Build using Laravel Sail and Laravel breeze

---

## Set up

### Install docker and composer

### Build docker with sail

    ./vendor/bin/sail up -d
     or
    ./vendor/bin/sail up

For ease of use PHPMyAdmin is included, you can access it at http://localhost:8001

#### Enter container:

     Run Artisan commands from within sail container
    ./vendor/bin/sail artisan

### Build dependencies:

    install composer

    npm install

## MySql database and tables

Fill your .env file with your server data

### Database : laravel_crypto_app

Run migrations

    ./vendor/bin/sail artisan migrate

- After running migrations manually change the table favorites column 'id' from PRIMARY to INDEX, otherwise each user will only be able to add one favorite currency

## CLI app

- COMMANDS:
  - php artisan crypto: Help
  - php artisan crypto: List // List all coins
  - php artisan crypto: Price // Get price of a cryptocurrency denominated in a fiat currency
  - php artisan favorite: add // Add one or more currencyes to favorites for a user id.
  - php artisan favorite: list // List all favorites for a user id.
  - php artisan favorite: remove // Remove one or more currencyes from favorites for a user id.
- By default user id is 1, you can change it in the code
- ./vendor/bin/sail artisan create:generate-users {count} // Generate users
- Default password for factory-generated users is "password"

- By deafultv Laravel breeze password email verification is diasbled, you can enable it in the code

---

## WEBSITE

- Basic website, user can signup, login and add/remove currencies from his/her list of favourites and check currency prices.

---

## Built on

- PHP : '8.1.9'
- Laravel : '9.31.0'
- mysql : 8
