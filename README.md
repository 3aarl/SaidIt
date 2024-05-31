# SaidIt

An Applications of Development and Emerging Technologies Finals Project

# Initialization

## **REQUIREMENTS**

- ### Composer
- ### XAMPP
- ### Mailtrap
  This is used to serve as a temporary inbox for email verification, useful for testing

## Preparations

### Composer + Node.JS Installations

Open the terminal (Ctrl + Shift + `) and type
`npm install`to install Node Module and`composer install` to install your Vendor file.

---

### .env Setup

Copy the `.env.example`, replace the following code with your own personal database

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=laravel
    DB_USERNAME=root
    DB_PASSWORD=

Afterwards, replace the following code to match your mailtrap specifications

    MAIL_MAILER=smtp
    MAIL_HOST=mailpit
    MAIL_PORT=1025
    MAIL_USERNAME=null
    MAIL_PASSWORD=null

### Sample

    MAIL_MAILER=smtp
    MAIL_HOST=sandbox.smtp.mailtrap.io
    MAIL_PORT=2525
    MAIL_USERNAME=aad07a2ee0c29b
    MAIL_PASSWORD=****\*\*****a420

---

## Migrations

- ### php artisan migrate

- ### php artisan migrate:fresh

- ### php artisan migrate:refresh --seed

## Composer and NPM Installations

    composer require cviebrock/eloquent-sluggable

php artisan code to try to publish Slugs

    php artisan vendor:publish --provider="Cviebrock\EloquentSluggable\ServiceProvider"

# Troubleshooting

## Unable to resolve dependency tree error when installing npm packages

`npm run build`

find package.json
add `"type": "module"`

## PHP has an error

change the `php.ini`, remove the `;` in `extensions=zip`

## middleware not found

Fix =
`composer require inertiajs/inertia-laravel`
or
`composer dump-autoload`

# References and Tools

- Code With Tony (September 6,2022) Laravel Reddit Clone, Youtube. https://youtube.com/playlist?list=PL6tf8fRbavl2IU88yNI338feOyiYI6xh6&si=rds_nGriO_dkrgk3

- Mailtrap https://mailtrap.io/
