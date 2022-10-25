## Задача
Даны два списка. Список автомобилей и список пользователей.
C помощью laravel сделать api для управления списком использования автомобилей пользователями.
В один момент времени 1 пользователь может управлять только одним автомобилем. В один момент времени 1 автомобилем может управлять только 1 пользователь.
Код разместить на https://github.com/
Подготовить документацию в https://editor.swagger.io/
Обязательно наличие тестов.

## Методы

**Регистрация аренды автомобиля пользователем** `GET /api/rent/car/`

**Прекращение аренды автомобиля пользователем** `GET /api/terminate/rentcar/`

## Маршруты

```
Route::get('/', [RentCarController::class, 'rentCar'])->name('rent.car');
Route::get('/rent/car', [ApiRentCarController::class, 'rentCar'])->name('rentcar.api');
Route::get('/terminate/rentcar', [ApiRentCarController::class, 'terminateRent'])->name('terminate.rent.api');

```

## Установка

1. Установите зависимости:

      ```shell
    composer install
    ```

      ```shell
    composer update
    ```
3. Создайте базу данных в вашем локальном сервере

4. Изменить .env

      ```shell
    DB_DATABASE=
    DB_USERNAME=
    DB_PASSWORD=
    ```

5. Запустить миграцую базу данных:

    ```shell
    php artisan migrate
    ```

6. Заполнить базу данных

    ```shell
    php artisan db:seed
    ```

7. Запустить локальный сервер:

    ```shell
    php artisan serve
    ```
8. Генерация документации API:

    ```shell
    php artisan l5-swagger:generate
    ```
### Файл с swagger документацией

 ```shell
    /storage/api-docs/api-docs.json
   ```
### Запуск теста

 ```shell
    php artisan test 
   ```

[Арендовать автомобилей](http://127.0.0.1:8000/rent)

[Swagger документация](http://127.0.0.1:8000/api/documentation)

