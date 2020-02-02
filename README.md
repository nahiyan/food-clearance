# Food Clearance
An e-commerce web app, based on Laravel, which lets bakeries sell food items easily, which would otherwise expire within a short time.

# Installation

## Pre-requisites
Before you install, make sure you have meet the requirements:
- [Laravel 6's requirements](https://laravel.com/docs/6.x#server-requirements) for Laravel 6 to work.
- [Composer](https://getcomposer.org/) for installing PHP packages.

## Steps

Since it's based on Laravel, installation is pretty straightforward. Here are the steps:

*Note: Make sure you switched to the project's root directory before running the commands.*

- Clone this repository using Git (recommended):
  ```bash
  git clone https://github.com/nahiyan/food_clearance.git
  ```

- Install dependencies using Composer (a package manager for PHP):
  ```bash
  composer install
  ```

- Since you need to set variables specific to your project, you need to copy the `.env.example` to `.env`. On UNIX-based systems: 
  ```bash
  cp .env.example .env`
  ```

- Set the variables in your newly created `.env` file, especially the ones prefixed with "DB"
- Create a link between storage and public directory using: 

  ```bash
  php artisan storage:link
  ```

- To setup all the tables, run migrations:

  ```bash
  php artisan migrate
  ```

  Optionally you can put sample data in the tables using:

  ```bash
  php artisan db:seed
  ```

- Start the server and you should be good to go!
  ```bash
  php artisan serve
  ```
