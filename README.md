# Food Clearance
An e-commerce web app, based on Laravel, which lets bakeries sell food items easily, which would otherwise expire within a short time.

# Installation

## Pre-requisites
Before you install, make sure you have meet the requirements:

- [Laravel 8's requirements](https://laravel.com/docs/8.x/installation#server-requirements) for Laravel 8 to work.
- [Composer](https://getcomposer.org/) for installing PHP packages.

## Steps

Since it's based on Laravel, installation is pretty straightforward. Here are the steps:

> Note: Make sure you switched to the project's root directory before running the commands.

- Clone this repository using Git (recommended):

  ```
  git clone https://github.com/nahiyan/food_clearance.git
  ```

- Install dependencies using Composer (a package manager for PHP):

  ```
  composer install
  ```

- Since you need to set variables specific to your environment, you need to create a `.env` file. A quick way to get started is by copying `.env.example` into `.env`. On UNIX-based systems, you can do this:

  ```
  cp .env.example .env
  ```

- Set the variables in your newly created `.env` file, especially the ones prefixed with "DB".
- Create a link between storage and public directory using: 

  ```
  php artisan storage:link
  ```

- To setup all the database tables, run the migrations:

  ```
  php artisan migrate
  ```

  Optionally, you can put sample data in the tables using:

  ```
  php artisan db:seed
  ```

- Start the server and you should be good to go!

  ```
  php artisan serve
  ```
