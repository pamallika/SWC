Тестовое задание на позицию Backend Php(Laravel) developer  
Разработать RESTful API для:  
а) регистрация пользователя;  
b) авторизация пользователя;  
c) создание события;  
d) получение списка событий;  
e) участие в событии;  
f) отмена участия в событии;  
g) удаление события создателем.  

Ответ с сервера должен приходить в виде такого JSON: {"error":null,
"result":{"id":1, "first_name":"Вася", "last_name":"Петров"}}.  
При просмотре НЕ своего события внизу находится кнопка "Принять
участие", при просмотре своего события - кнопка "Отказаться от участия"
Элементы "Все события" и "Участники" должны обновляться каждые 30
секунд, по возможности, без перезагрузки страницы.  

# Установка  
composer install  
docker-compose up -d  
php artisan migrate  
npm install  
  
Запуск  
npm run dev  
docker-compose up -d  
php artisan serve  

# Стек:  
Бд: (driver:mysql host:localhost db:swc user:root, password:root port:3306)  
Backend: PHP + Laravel  
Frontend: Vue  
Auth: Web - with Token Coockie, Api with Bearer token  
Схема БД https://drive.google.com/file/d/1-BXy25y3afz8Qfu4YkWxFVwmdeTfngMp/view?usp=sharing  
Swagger http://localhost:8000/api/documentation  
    Токен в Swagger вставлять вместе с Bearer -> Bearer ... 
