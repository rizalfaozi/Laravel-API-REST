# Laravel-API-REST-Api

Laravel Rest Api ini diperuntukan untuk membuat rest api untuk mobile app 
rest api berupa data json menggunakan tehnology jwt

#Install Composer

composer install

#untuk register

url : http://url/api/auth/register
type : post
input : name:xxx
		password:admin123
		email:xxx@gmail.com

#untuk login
url : http://url/api/auth/login
type : post
input : email:xxx@gmail.com
		password:admin123



- anda akan mendapatkan token jwt

#cara menjalankannya
ex : get data user yang sudah login

url : http://url/api/user
type : get

- pilih header
- bulk-edit
- isikan Authorization:bearer token yang sebelumnya anda login masukan disini
- klik send





		


