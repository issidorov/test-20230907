<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Описание

Проект является тестовым заданием на тему "получение курсов валют".

## Задание

Написать консольную команду получения курса валют (EUR, USD, KGS) за текущую неделю.
Текущей неделей считается интервал от предыдущего понедельника до сегодняшнего дня.

Запрашивать сайт ЦБ
https://www.cbr.ru/scripts/XML_daily.asp?date_req=15/06/2023

Результаты запросов объединить в массив (ключ - дата в формате Y-m-d) и вывести в консоль.

## Stack

- Laravel v10
- PHP v8.2
- MySQL v8.0
- Vue.js v3
- Inertia.js

## Примеры использования

Валюты по умолчанию:

    $ sail artisan app:show-money-rates
    EUR:
    2023-09-04      104.6108
    2023-09-05      104.4171
    2023-09-06      104.9043
    2023-09-07      105.0789
    
    USD:
    2023-09-04      96.3411
    2023-09-05      96.6199
    2023-09-06      97.5383
    2023-09-07      97.8439
    
    KGS:
    2023-09-04      10.9158
    2023-09-05      10.9479
    2023-09-06      11.05
    2023-09-07      11.0846

Курсы только для валют USD и KGS:

    $ sail artisan app:show-money-rates USD KGS
    USD:
    2023-09-04      96.3411
    2023-09-05      96.6199
    2023-09-06      97.5383
    2023-09-07      97.8439
    
    KGS:
    2023-09-04      10.9158
    2023-09-05      10.9479
    2023-09-06      11.05
    2023-09-07      11.0846

