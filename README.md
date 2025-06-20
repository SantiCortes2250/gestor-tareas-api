# 🛠️ API Laravel - Gestor de Tareas

API REST construida con **Laravel 11**, con soporte completo para **autenticación mediante tokens** utilizando **Laravel Sanctum**, y operaciones CRUD para tareas.

## 🌐 Demo en Producción

🔗 **API Pública:** [https://laravel-api-nj2d.onrender.com/api/status](https://laravel-api-nj2d.onrender.com/api/status)

---

## 🔐 Autenticación

La autenticación se maneja mediante **tokens de Sanctum**, ideal para consumo desde SPA (Vue.js).

Asegúrate de agregar el token al `Authorization` header en cada solicitud protegida:


---

## 📌 Endpoints principales

| Método | Ruta               | Descripción                     | Protección |
|--------|--------------------|----------------------------------|------------|
| POST   | `/api/register`    | Registrar nuevo usuario         | ❌ Pública |
| POST   | `/api/login`       | Iniciar sesión y obtener token  | ❌ Pública |
| GET    | `/api/me`          | Datos del usuario autenticado   | ✅ Privada |
| POST   | `/api/logout`      | Revocar token                   | ✅ Privada |
| GET    | `/api/tasks`       | Listar todas las tareas         | ✅ Privada |
| POST   | `/api/tasks`       | Crear una nueva tarea           | ✅ Privada |
| PUT    | `/api/tasks/{id}`  | Actualizar tarea                | ✅ Privada |
| DELETE | `/api/tasks/{id}`  | Eliminar tarea                  | ✅ Privada |

---

## ⚙️ Instalación local

```bash
git clone https://github.com/SantiCortes2250/gestor-tareas-api
cd gestor-tareas-api
cp .env.example .env
composer install
php artisan key:generate
php artisan migrate
php artisan serve


