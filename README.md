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
> cd CatalogService && sail artisan queue:work --queue=produce_queue
> cd EmailService && sail artisan queue:work --queue=email_queue
```

### Testing
You can simply make a post request to `localhost:4000/api/order/save` and provide a post data

product:
```json
{"id":1,"sku":"#fb2423","title":"Ms.","description":"Quae illum modi a cum odio.","price":"832008.00","quantity":49,"created_at":"2023-10-28T17:52:00.000000Z","updated_at":"2023-10-29T15:45:58.000000Z"}
```
user:
```json
{"id":1,"name":"Pat Bartoletti","email":"torp.garrick@example.net","email_verified_at":"2023-10-29T15:21:54.000000Z","created_at":"2023-10-29T15:21:54.000000Z","updated_at":"2023-10-29T15:21:54.000000Z"}
```

![image](https://github.com/joppx25/coding-exercise/assets/8535609/f41a645d-e8de-45e1-971b-5bf4102a55c4)

