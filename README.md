<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>  

<p align="center">  
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>  
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>  
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>  
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>  
</p>

# Welcome to Test App

Aplikasi ini Untuk Test menggunakan Laravel Versi 8 dengan beberapa library yaitu :
1. Datatables Yajra Version 9
2. Spatie Laravel Permission Version 5
3. Maatwebsite Version 3.1
4. Sanctum Version 2 (untuk API)

# Cara menjalankan di awal
1. Composer Install
2. copy .env.example menjadi file .env
3. buat database dan masukan ke .env

### CMD
1. jalankan perintah **php artisan migrate:fresh --seed**
2. kemudian jalankan perintah **php artisan serve**

## Login Ke Web
1. di URL ketik **localhost:8000**
2. untuk login menggunakan Akun **admin@admin.com** dengan password **123456789**
3. registrasi dan buat akun didalam juga bisa dilakukan

## Penggunaan API
1. di github ini terdapat folder **#example-api#**
2. disana terdapat file untuk dapat melakukan import collection file Test **App.postman_collection.json**
3. setelah melakukan import melalui postman ada 4 API yang telah dibuat anda dapat menggunakan api tersebut untuk mengakses API


# License
The Laravel framework is open-sourced software licensed under the  [MIT license](https://opensource.org/licenses/MIT).
