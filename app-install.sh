#!/bin/bash

# Instala todas as dependências
docker-compose exec app composer install

# Dá permissão de leitura, escrita na pasta storage
docker-compose exec app chmod -R 775 storage

# Cria as chaves do Laravel
docker-compose exec app php artisan key:generate

# Cacheia as configurações
docker-compose exec app php artisan config:cache

# Executa as migrations
docker-compose exec app php artisan migrate --seed

# Configura o Laravel Passport
docker-compose exec app php artisan passport:install

# Roda Queue Worker do Laravel (Interrompendo o processo antigo porque ele usa o código antigo).
docker-compose exec app php artisan queue:restart
docker-compose exec -d app php artisan queue:work --sleep=10
