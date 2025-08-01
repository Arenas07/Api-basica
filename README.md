# API REST - Simulación CRUD con PHP

Este proyecto es una simulación de una API RESTful desarrollada en PHP, implementando operaciones CRUD (Crear, Leer, Actualizar, Eliminar) bajo principios de arquitectura limpia. La API está diseñada para ser modular, mantenible y escalable.

## 📁 Estructura del Proyecto

```
.
├── .github/              # Configuración de GitHub (Dependabot, CI/CD)
├── bootstrap/            # Archivo de arranque y configuración de dependencias
│   └── container.php
├── db/                   # Archivos de base de datos
│   └── database.sql
├── public/               # Punto de entrada público para la API
│   └── index.php
├── routes/               # Definición de rutas de la API
│   ├── camper.php
│   └── user.php
├── src/                  # Código fuente
│   ├── Controllers/      # Controladores de entrada (manejo HTTP)
│   ├── DTOs/             # Data Transfer Objects
│   ├── Domain/           # Entidades del dominio
│   ├── Handler/          # Manejo de errores o excepciones
│   ├── Infrastructure/   # Conexiones con BD u otros servicios
│   ├── Middleware/       # Lógica intermedia (autenticación, validación, etc.)
│   └── UseCases/         # Lógica de negocio (servicios o casos de uso)
├── .gitignore
├── .htaccess             # Configuración para Apache
├── README.md             # Este archivo
├── composer.json         # Dependencias PHP
├── composer.lock
└── index.php             # Entrada principal del sistema
```

## ⚙️ Tecnologías y Dependencias

- **PHP 8+**
- **Composer** (gestión de dependencias)
- **MySQL** (Base de datos relacional)
- **PSR-4 Autoloading**
- **Clean Architecture**

## 🚀 Funcionalidades

- CRUD para entidades como `Camper` y `User`.
- Separación por capas: controlador, caso de uso, dominio e infraestructura.
- Middleware personalizado para validaciones o autenticación.
- Manejo centralizado de errores.
- Conexión con base de datos incluida (`db/database.sql`).

## 📦 Instalación y Uso

1. Clona el repositorio:

   ```bash
   git clone https://github.com/tuusuario/tu-repo.git
   cd tu-repo
   ```

2. Instala las dependencias:

   ```bash
   composer install
   ```

3. Configura tu entorno y base de datos:

   - Carga el archivo `db/database.sql` en tu servidor MySQL.
   - Configura la conexión en el archivo correspondiente de `Infrastructure`.

4. Levanta el servidor (si usas PHP embebido):

   ```bash
   php -S localhost:8000 -t public
   ```

5. Prueba las rutas definidas en `routes/`.

## 📌 Rutas de ejemplo

- `GET /camper` – Listar campers
- `POST /camper` – Crear un nuevo camper
- `PUT /camper/{id}` – Actualizar un camper
- `DELETE /camper/{id}` – Eliminar un camper

