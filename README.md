# Instalación y Configuración de Homestead #
1. Instalar Vagrant.
2. Verificar versión de Vagrant con `vagrant -v`.
3. Agregar una caja al Vagrant con `vagrant box add laravel/homestead`.
4. Seleccionar el virtualizador que estemos utilizando.
5. En una terminal de Git bash clonar el repositorio `git clone https://github.com/laravel/homestead.git ~/Homestead`.
6. Dirigirse a la carpeta clonada `cd ~/Homestead`.
7. Desde Git bash ejecutar el archivo **init.sh** `bash init.sh`.
8. Abrimos la carpeta **Homestead** en nuestro editor de texto favorito `code .`.
9. Generar los archivos de llaves ssh desde Git bash en la carpeta **.ssh** `touch ~/.ssh/vagrant_rsa` y `touch ~/.ssh/.vagrant_rsa.pub`.
10. Configuración del archivo **Homestead.yaml** con el que se trabaja para configurar todos nuestros proyectos en Laravel:
 - `authorize: ~/.ssh/vagrant_rsa.pub`
 - `keys: `<br>
    `   - ~/.ssh/vagrant_rsa`
 - `folders:`<br>
    `   - map: C:\Users\{user}\code`<br>
    `     to: /home/vagrant/code`
 - `sites:`<br>
    `   - map: empleados.test`<br>
    `     to: /home/vagrant/code/pruebaempleados/public`
 - `databases:`<br>
    `   - pruebaempleados`
11. Iniciamos la máquina virtual con `vagrant up`.
12. Mapeamos la dirección IP al dominio empleados.test en el archivo hosts (linux: `/etc/hosts`) (Windows: `C:\Windows\System32\drivers\etc\hosts`). Al final del archivo agregamos la linea:
 - `192.168.10.10 	empleados.test`
13. Nos situamos en la carpeta `~/Homestead` para conectarnos a la máquina virtual vía ssh. Para ello ejecutamos `vagrant ssh`.
14. Clonamos el repositorio de nuestro proyecto `git clone https://github.com/ortegacarlos/empleadoslaravel.git ~/code`.
15. Automáticamente se sincroniza con la máquina virtual de Homestead.
16. Desde la máquina virtual nos dirigimos a la carpeta `~/code/pruebaempleados`.
17. Ejecutamos las migraciones y los seeders para poblar la base de datos con `php artisan migrate --seed`.
18. Desde el navegador ingresamos a `empleados.test` para visualizar el proyecto.
19. La información relacionada con el nombre de la base de datos, usuario y contraseña se encuentra en el archivo `.env` del proyecto.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
