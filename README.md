## About System

Esta aplicacion tiene el objetivo de replicar los datos del banana panel de cada empacadora a la base de datos central.
## Pasos para instalar la aplicacion
0) instalar git, usar la opcion Checkout as is, commit Unix-style

1) Entrar a cmd y nos dirigimos a la direccion donde se encuentra el proyecto. 

2) Ahora debemos de correr los siguientes comandos.
    a) git config --global core.autocrlf input 
    b) git rm --cached -r .
    c) git reset --hard
    d) docker-compose up --build -d (terminamos que termine de instalar las maquinas).
    e) docker-compose exec php bash 
    f) php composer.phar install
    g) php artisan horizon:publish
    
3) Cerramos la consola.

4) Fin.
