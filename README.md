<p align="center">
  <a href="https://github.com/tu_usuario" target="_blank">
    <img src="https://avatars.githubusercontent.com/u/155660138?s=400&u=9b6d536e9f012ef961054861ecae72c6ff13bace&v=4" width="150" alt="AlejandroMBP">
  </a>
</p>

## Proyecto Laravel 10

Este es un proyecto desarrollado con Laravel 10. Aquí hay algunos detalles sobre cómo ejecutarlo.

### Requisitos

- PHP >= 8.1
- Composer
- Un servidor web (Apache, Nginx, etc.)

### Instalación

1. Clona el repositorio:
   ```bash
   git clone https://github.com/tu_usuario/tu_repositorio.git
   cd tu_repositorio
2. Instala las dependencias:
   ```bash
       composer install

4. Configura el archivo .env:
   ```bash
   cp .env.example .env

6. Generar clave de aplicacion:
   ```bash
   php artisan key:generate

8. Ejecutar migraciones (si es necesario):
   ```bash
   php artisan migrate

10. Hacer correr el servidor local: 
    ```bash
    php artisan serve

