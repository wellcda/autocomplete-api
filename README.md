# autocomplete-api

A simple API built with the Laravel framework.

## Requirements

Docker https://docs.docker.com/install/

Docker Compose https://docs.docker.com/compose/install/

## Installation

This project is fully dockerized, to install it you must fulfil the requirements listed above.

1. The first step would be to create the .env file and make sure it is configured properly, but,**since this is a test, I will commit the .env file and make sure everything is "plug and play"**

2. Build the Docker images
```bash
docker-compose up --build
```

3. Then execute the shell script to set up Laravel enviroment. If you're using Windows, open `app-install.sh` and execute the commands manually.
```bash
bash app-install.sh
```

After those commands, the API should be up and running and you can access the API at http://localhost:8000/ and Adminer (DBMS) at http://localhost:8080/.

If you're having trouble with Postgres users after building your images for the first time, remove the volume and build the images again.
```
$ docker-compose down
$ docker rm autocomplete-api_dbdata
$ docker-compose up --build
```
