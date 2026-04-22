 TP 6 – PWD 2026

E.E.S.T. N°1 “Eduardo Ader” – 7° 2° Grupo B

 Descripción del Proyecto

Este proyecto consiste en el desarrollo de un generador de contraseñas seguras, implementado como un formulario  dentro del sistema EVA.

El sistema permite al usuario ingresar su correo electrónico y datos personales, generando automáticamente credenciales seguras (usuario y contraseña aleatoria).

Además, el sistema:

Envía las credenciales al correo del usuario mediante SMTP
Guarda los datos en una base de datos MySQL
Aplica principios de Clean Code mediante refactorización del código


Equipo de Desarrollo

Zoe Linares – Desarrollo completo (Frontend, Backend, Lógica y UX)

Funcionalidades Principales

- Generación automática de contraseñas seguras
- Generación de usuario aleatorio
- Validación de datos del formulario
- Envío de credenciales por correo electrónico (PHPMailer + SMTP)
- Almacenamiento en base de datos MySQL
- Interfaz moderna con diseño glassmorphism
- Aplicación de Clean Code y refactorización

 Consigna aplicada 

El proyecto se basa en la mejora de un código inicialmente “sucio”, aplicando:

Nombres de variables descriptivos
Separación de responsabilidades
Modularización de funciones
Código reutilizable y mantenible


 Experiencia de Usuario (UX)

El sistema fue diseñado para ser:

Intuitivo y fácil de usar
Visualmente moderno
Rápido en respuesta
Claro en la información mostrada

Tecnologías Utilizadas
Frontend
HTML5
CSS3 (Glassmorphism)
JavaScript 

 Backend
PHP
PHPMailer (SMTP Hostinger)

 Base de Datos
MySQL

Otros
JSON


GitHub

 Estructura del Proyecto
├── index.php
├── css/
│   └── style.css
├── js/
│   └── principal.js
├── php/
│   ├── mandar_credenciales.php
│   └── db.php
├── vendor/
│   └── PHPMailer
├── README.md
├── LICENCE.txt
├── .gitignore


Funcionamiento del Sistema
El usuario ingresa sus datos

El sistema genera automáticamente:
Usuario
Contraseña segura
Se envían los datos al servidor

PHP:
Guarda la información en MySQL
Envía un correo con las credenciales
El usuario recibe su acceso


Instalación y Ejecución

Clonar repositorio:
git clone https://github.com/zoelinaresrios/TP5DWD

Link de hosting

Este proyecto se distribuye bajo la licencia MIT.