#!/bin/bash

# завершение работы скрипта при возникновении ошибки
set -e

# скачивание последних изменений из репозитория
git pull origin master

# перевод приложения в режим обслуживания
php8.1 artisan down

# установка зависимостей
php8.1 /usr/local/bin/composer install --optimize-autoloader --prefer-dist --no-interaction --no-progress

npm ci --cache .npm --prefer-offline --no-audit

npx vite build

# запуск миграций
php8.1 artisan migrate --force

# вывод приложения из режима обслуживания
php8.1 artisan up
