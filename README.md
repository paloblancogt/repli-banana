## About System

Esta aplicacion tiene el objetivo de replicar los datos del banana panel de cada empacadora a la base de datos central.
## Pasos para instalar la aplicacion

1) Entrar a cmd y nos dirigimos a la direccion donde se encuentra el proyecto.

2) Ahora debemos de correr los siguientes comandos.
    a) docker-compose up --build -d (terminamos que termine de instalar las maquinas).
    b) docker-compose exec php bash 
    c) php composer.phar install
    d) php composer.phar require laravel/horizon ~4.0
    e) php artisan horizon:publish
    
3) Cerramos la consola.

4) Fin.
