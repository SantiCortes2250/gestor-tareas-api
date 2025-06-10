# 🛠️ API Laravel - Gestor de Tareas

API REST construida con Laravel 11. Soporta autenticación de usuarios con Sanctum y CRUD de tareas.

## 🚀 Endpoints principales

- `POST /register` – Registrar usuario
- `POST /login` – Iniciar sesión
- `GET /me` – Obtener usuario autenticado
- `POST /logout` – Cerrar sesión
- `GET /tasks` – Listar tareas
- `POST /tasks` – Crear tarea
- `PUT /tasks/{id}` – Actualizar tarea
- `DELETE /tasks/{id}` – Eliminar tarea

## ⚙️ Instalación

```bash
git clone https://github.com/tuusuario/backend.git
cd backend
cp .env.example .env
composer install
php artisan key:generate
php artisan migrate
php artisan serve
