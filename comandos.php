php artisan make:model NombreDelModelo -mcr


php artisan make:migration -nombre de la tabla-
php artisan migrate

//Para borrar todas las tablas de la base de datos y luego volverlas a crear:
php artisan migrate:refresh

Para eliminar todas las tablas
php artisan migrate:reset

Permite deshacer el último grupo de migraciones ejecutadas
php artisan migrate:rollback

Para ver el estatus de cada migración
php artisan migrate:status

Para subir la base de datos a heroku
heroku pg:push postgres://postgres:12345@localhost:5432/laravel DATABASE_URL --app laraveltorres


php artisan route:list