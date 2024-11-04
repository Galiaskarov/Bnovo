## Запуск
- git clone https://github.com/Galiaskarov/Bnovo.git
- Скопировать env: cp .env.example .env
- Запуск докера: docker-compose up --build -d
- Из контейнера php-cli запустить: composer instal
- Из контейнера php-cli запустить: php artisan migrate --seed
## Созданные классы
- app/Http/Controllers/GuestController.php
- app/Services/GuestService.php
- app/Http/Requests/Guests/GuestCreateRequest.php
- app/Http/Requests/Guests/GuestUpdateRequest.php
- app/Http/Resources/GuestResource.php
- app/Models/Country.php
- app/Models/Guest.php
- database/factories/CountryFactory.php
- database/factories/GuestFactory.php
- database/seeders/Country.php
- database/seeders/GuestSeeder.php
- tests/Feature/GuestTest.php
## Роуты
- Получить всех гостей: get /api/guests
- Получить конкретного гостя по ID: get /api/guests/{id}
- Создать нового гостя: post /api/guests
- Обновить гостя: path /api/guests/{id}
- Удалить гостя: delete /api/guests/{id}

Дополнительно приложил postman коллекцию.

Запустить тесты: php artisan test tests/Feature/GuestTest.php

## Тз
Написать микросервис работы с гостями используя язык программирования на PHP, можно пользоваться любыми opensource пакетами, также возможно реализовать с использованием фреймворков или без них. БД также любая на выбор, использующая SQL в качестве языка запросов.   Микросервис реализует API для CRUD операций над гостем. То есть принимает данные для создания, изменения, получения, удаления записей гостей хранящихся в выбранной базе данных.  Сущность "Гость" Имя, фамилия и телефон – обязательные поля. А поля телефон и email уникальны. В итоге у гостя должны быть следующие атрибуты: идентификатор, имя, фамилия, email, телефон, страна. Если страна не указана то доставать страну из номера телефона +7 - Россия и т.д.   Правила валидации нужно придумать и реализовать самостоятельно. Микросервис должен запускаться в Docker.   Результат опубликовать в Git репозитории, в него же положить README файл с описанием проекта. Описание не регламентировано, исполнитель сам решает что нужно написать (техническое задание, документация по коду, инструкция для запуска). Также должно быть описание API (как в него делать запросы, какой формат запроса и ответа), можно в любом формате, в том числе в том же README файле.

Доп. обязательное условие для уровня Middle (по желанию для Junior): “В ответах сервера должны присутствовать два заголовка X-Debug-Time и X-Debug-Memory, которые указывают сколько миллисекунд выполнялся запрос и сколько Кб памяти потребовалось соответственно.”
