<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

## О Larablog

Larablog - это мой первый проект на Laravel.

## Функционал:

1. Авторизация
2. Неавторизированные пользователи:
    * Просматривают все посты
    * Посты можно фильтровать по категориям, авторам
3. Авторизированные пользователи:
    * При авторизации по-умолчанию пользователь получает учетку типа "Автор"
    * Автор может:
        * Видеть статистику блога: количество постов блога, количество категорий блога, количество зарегистрированных пользователей блога
        * Добавлять новые посты
        * Редактировать/удалять только свои посты
        * Видеть список категорий блога
        * Видеть список пользователей блога
    * Администратор может:
        * Видеть статистику блога: количество постов блога, количество категорий блога, количество зарегистрированных пользователей блога
        * Добавлять новые посты
        * Редактировать/удалять свои посты и посты других авторов
        * Видеть список категорий блога, редактировать и удалять категории блога
        * Видеть список пользователей блога, редактировать имя пользователя и тип учетной записи (Автор/Администратор), удалять пользователей
4. Пост имеет название (обязательно), содержание (обязательно), категорию (обязательно), изображение (не обязательно)

## Установка

1. Клонируем репозиторий: **git clone https://github.com/aksvitpav/larablog.git**
2. Устанавливаем зависимости: **composer install**
3. Создаем файлик с переменными окружения: **cp .env.example .env**
4. В файле .env указываем нужные **переменные окружения**
5. Генерируем ключ приложения: **php artisan key:generate**
6. Создаем символьную ссылку для storage для хранения картинок постов: **php artisan storage:link**
7. Создаем даблицы в БД: **php artisan migrate**
8. Наполняем БД тестовыми данными: **php artisan db:seed** (таблица постов может наполнятся долго!!! картинки к постам берутся с сайта lorempixel.com, который очень медленно работает иногда!)