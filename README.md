### В корне проекта на локальной машине
docker-compose up \
npm run build

### Зайти в контейнер php
docker-compose exec php bash \
выполнить composer i

### Зайти в контейнер db
docker-compose exec db bash \
выполнить psql -U user -d items_db -a -f insert_items.sql

Проект будет доступен в бразуере по адресу http://localhost/