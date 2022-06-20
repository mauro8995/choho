# choho
Proyecto echo en laravel 8 
el archivo del codigo esta en app/http/controllers/advisesController
- la documentacion esta adjunto en el correo(documentacion API y la documentacion codigo).

Requerimientos minimos.
 - Servidor local Xampp con la versión 7.3 de PHP como mínimo.
 - La última versión de Composer.
 - base de datos postgres 12.8 como minimo

1. bajar el proyecto.
clonar el repositorio
```
git clone https://github.com/mauro8995/choho.git

```
2. hacer un composer install dentro de la carpeta.
instalar el composer.
```
composer install

```
3. restaurar y conectarse a la base de datos desde el archivo .env
la base de datos esta en la carpeta database se llama choho.backup 

iniciar el servidor
```
php artisan serve

``` 

# Para ver el endpoint api 
http://127.0.0.1:8000/api/advedise/order


