# About project

## This project This project aims to implement a simple CRUD and solve the following tests:

- There must not be two clients with the same email.
- The product must have a photo.
- The data must be validated.
- The system must contain a set of predefined product types.
- The order must include N products.
- The client can have N orders.
- After order creation, the system must send an email to the client containing the details of their order.

# How to run this project in your local

## Getting Started

1. Clone the project using `git clone` and the project link.

2. Run `npm install` to install all dependencies.

3. Execute the command `./vendor/sail up -d` to start the system. The `-d` flag is used to detach the terminal.
    - If you want to shut down the system, use `./vendor/sail down`.
    - Note: Before executing this command, make sure you have Docker installed and running. You can download Docker from [here](https://docker.com).

4. Run the command `docker exec pastry_order_control_api.test-1 php artisan migrate:fresh`.

Great! Now everything is up and running. You can send requests to create, update, or delete (with soft delete) the desired items.

## Areas for Improvement

- [ ] Add validation for mandatory field completion.
- [ ] Implement a queue system for handling orders.
- [ ] Incorporate search functionality with filters.
- [ ] Integrate Elasticsearch or a similar tool for advanced search capabilities.
- [ ] Implement user authentication and authorization for secure queries.
- [ ] Create a helper to handle errors and provide better responses to the frontend.
- [ ] Alter product_id on store_orders to jsonb and deal with foreign key


# About Framework Lumen PHP Framework

[![Build Status](https://travis-ci.org/laravel/lumen-framework.svg)](https://travis-ci.org/laravel/lumen-framework)
[![Total Downloads](https://img.shields.io/packagist/dt/laravel/lumen-framework)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Stable Version](https://img.shields.io/packagist/v/laravel/lumen-framework)](https://packagist.org/packages/laravel/lumen-framework)
[![License](https://img.shields.io/packagist/l/laravel/lumen)](https://packagist.org/packages/laravel/lumen-framework)

Laravel Lumen is a stunningly fast PHP micro-framework for building web applications with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Lumen attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as routing, database abstraction, queueing, and caching.

> **Note:** In the years since releasing Lumen, PHP has made a variety of wonderful performance improvements. For this reason, along with the availability of [Laravel Octane](https://laravel.com/docs/octane), we no longer recommend that you begin new projects with Lumen. Instead, we recommend always beginning new projects with [Laravel](https://laravel.com).

## Official Documentation

Documentation for the framework can be found on the [Lumen website](https://lumen.laravel.com/docs).

## Contributing

Thank you for considering contributing to Lumen! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Lumen, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Lumen framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
