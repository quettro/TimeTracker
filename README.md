### Запуск проекта:

1. `docker compose up -d --build`
2. `docker compose exec -u laravel web sh -c "composer install"`
3. `docker compose exec -u laravel web sh -c "composer setup"`
4. [http://localhost:8080/](http://localhost:8080/)