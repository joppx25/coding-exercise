# Coding Exercise
A simple ecommerce example for microservice architecture implementation\

## Prerequisite
 - Docker, Docker Compose
 - PHP
 - Composer
 - Git
 - NodeJS
 - MySQL
 - RabbitMQ (Message Broker)
 - Mailtrap (For Email Testing)

## Steps to run the three services
There are three project directories inside this repository. It can simply spin up all the three projects by running `sail up -d` command on each of the project.

### Step 1
```bash
> cd CatalogService
> cp .env.example .env
> cd OrderService
> cp .env.example .env
> cd EmailService
> cp .env.example .env
```
### Step 2
Run the containers of each projects

```bash
> cd CatalogService && sail up -d
#... do same other project directory
```

### Step 3
Run queue worker for Product and Email service

```bash
> cd CatalogService && sail artisan queue:work
#... same thing with EmailService
```
