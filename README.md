# Four Community

**Mata kuliah : Framework Pengembangan Web**

**Dosen Pengampu**
- **Isnar Sumartono, S.Kom., M.Kom.**

**Kelompok 4**
- **Denny Mario : 2214370318**
- **Fahriansyah : 2214370267**
- **Yeremia Tarigan : 2214370325**
- **Adhwa Arya Hafiz : 2214370329**
- **Angel Okta aviola dani : 2114370390**
- **Haikal Al Pasha : 2214370283**
- **Muhammad Bayu : 2214370331**

## Features

- Crud Member(Anggota)
- Crud Level
- Crud Group
- Crud User

Secara default ketika user dibuat password akan otomatis di generate 12345678

## Tech Stack
- Laravel 11
- MySql


Aplikasi ini akan terus dikembangkan untuk kepentingan edukasi!.


# Cara clone dan jalankan di local

Clone menggunakan git di terminal
```
git clone https://github.com/ITsDenny/four-community.git
```
buat env 
```
cp .env.example .env
```

update ini di env
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE={your_database_name}
DB_USERNAME={your_database_username}
DB_PASSWORD={your_database_password}
```
jalankan perintah composer untuk install semua depedencies 
```
composer i
```
setelah selesai jalankan perintah
```
php artisan key:generate
```
jalankan migration dan seeder
```
php artisan migrate:fresh --seed
```
jalankan npm untuk install vite Node 20+
```
npm i
```
jalankan server vite
```
npm run dev
```
jalankan server Laravel
```
php artisan serve
```

Done!


