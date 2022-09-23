Test Poder Judicial Virtual

La presente es para explicar el proceso de la app

Proyecto creado en Laravel 8

Navegar cd test-company

1)composer install

2)cp .env.example .env

3)php artisan key:generate

4.  DB_CONNECTION=mysql
    DB_HOST=mariadb
    DB_PORT=3306
    DB_DATABASE=test_company
    DB_USERNAME=root
    DB_PASSWORD=password

6)php artisan migrate:fresh --seed

5)Ruta raiz dirige a login

6)Los usuarios que se registran siempre tienen el ron de clientes.

7)El usuario administrador:

administrador@gmail.com
password

8)Se crean dos usuarios clientes con el seeder:
cliente1@gmail.com
password

cliente2@gmail.com
password

9)Se incluyeron validacion y control de errores.

10)Deje modulo de sail instalado por si quieren iniciar el docker.

    a)composer require laravel/sail --dev
    b)php artisan sail:install
    c)Elije la base de datos de tu gusto (Tardara en descargar las imagenes si no las tienes instaladas en docker)
    d)./vendor/bin/sail up
    e)./vendor/bin/sail artisan sail:publish
    f)./vendor/bin/sail artisan migrate:fresh --seed

Nota: Deje las rutas del otro proyecto realizado para el php por si les interesa ver ese trabajo, en el archivo routes encontraran las rutas

ruta principal del otro proyecto

selection_cow

Gracias por la oportunidad....
