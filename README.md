# autocomplete-api

A simple API built with the Laravel framework.

## Requirements

Docker https://docs.docker.com/install/

Docker Compose https://docs.docker.com/compose/install/

## Installation

This project is fully dockerized, to install it you must fulfil the requirements listed above.

1. The first step would be to create the .env file and make sure it is configured properly, but, **since this is a test, I will commit the .env file and make sure everything is "plug and play"**, otherwise you would have to copy the .env.example file and create your own .env file.

2. Build the Docker images
```bash
docker-compose up --build
```

3. Then execute the shell script to set up Laravel enviroment. If you're using Windows, open `app-install.sh` and execute the commands manually.
```bash
bash app-install.sh
```

After those commands, the API should be up and running and you can access it at http://localhost:8000/ and Adminer (DBMS) at http://localhost:8080/.

## Database access

To access the database using Adminer at http://localhost:8080/ just fill the inputs as listed below.

| Label | Value |
| -------- | -------- |
| **System** | PostgreSQL |
| **Server** | pgdb |
| **Username** | admin |
| **Password** | password |
| **Database** | autocomplete |

## Tests with PHPUnit
To execute the Unit and HTTP tests use the command below

```bash
docker-compose exec app vendor/bin/phpunit --testdox
```

## Postman Collection
There's a postman collection with a single request available at https://www.getpostman.com/collections/0c372377c4ed5d99448a, feel free to use it.

## CURL command (as requested)

```curl
curl 'http://localhost:4200/api/countries?searchQuery=af' -H 'Accept: application/json' --compressed
```
