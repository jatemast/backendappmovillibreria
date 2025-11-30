# Guía para Probar Endpoints de la API Librería

Este documento detalla cómo probar los diferentes endpoints de la API de la librería, asumiendo que el servidor de Laravel está corriendo en `http://127.0.0.1:8000`.

**Base URL:** `http://127.0.0.1:8000/api`

## Autenticación

### 1. Registrar un Nuevo Usuario

- **URL:** `http://127.0.0.1:8000/api/register`
- **Método:** `POST`
- **Headers:** `Content-Type: application/json`
- **Body (JSON):**
    ```json
    {
        "name": "Nombre del Usuario",
        "email": "correo@ejemplo.com",
        "password": "passwordSeguro",
        "password_confirmation": "passwordSeguro"
    }
    ```
- **Descripción:** Crea una nueva cuenta de usuario.

### 2. Iniciar Sesión

- **URL:** `http://127.0.0.1:8000/api/login`
- **Método:** `POST`
- **Headers:** `Content-Type: application/json`
- **Body (JSON):**
    ```json
    {
        "email": "correo@ejemplo.com",
        "password": "passwordSeguro"
    }
    ```
- **Descripción:** Autentica al usuario y devuelve un token de acceso que se debe usar en los `Authorization` headers para los endpoints protegidos.

## Endpoints de Recursos (Requieren Autenticación)

Para los siguientes endpoints, necesitarás incluir el token de acceso obtenido del login en el header de tu solicitud:
`Authorization: Bearer <tu_token_de_acceso>`

### Autores

- **Listar todos los autores:**
    - **URL:** `http://127.0.0.1:8000/api/autores`
    - **Método:** `GET`
- **Obtener un autor por ID:**
    - **URL:** `http://127.0.0.1:8000/api/autores/{id}`
    - **Método:** `GET`
- **Crear un nuevo autor:**
    - **URL:** `http://127.0.0.1:8000/api/autores`
    - **Método:** `POST`
    - **Headers:** `Content-Type: application/json`
    - **Body (JSON):**
        ```json
        {
            "nombre": "Nombre del Autor"
        }
        ```
- **Actualizar un autor:**
    - **URL:** `http://127.0.0.1:8000/api/autores/{id}`
    - **Método:** `PUT`
    - **Headers:** `Content-Type: application/json`
    - **Body (JSON):**
        ```json
        {
            "nombre": "Nuevo Nombre del Autor"
        }
        ```
- **Eliminar un autor:**
    - **URL:** `http://127.0.0.1:8000/api/autores/{id}`
    - **Método:** `DELETE`

### Categorías

- **Listar todas las categorías:**
    - **URL:** `http://127.0.0.1:8000/api/categorias`
    - **Método:** `GET`
- **Obtener una categoría por ID:**
    - **URL:** `http://127.0.0.1:8000/api/categorias/{id}`
    - **Método:** `GET`
- **Crear una nueva categoría:**
    - **URL:** `http://127.0.0.1:8000/api/categorias`
    - **Método:** `POST`
    - **Headers:** `Content-Type: application/json`
    - **Body (JSON):**
        ```json
        {
            "nombre": "Nombre de la Categoría"
        }
        ```
- **Actualizar una categoría:**
    - **URL:** `http://127.0.0.1:8000/api/categorias/{id}`
    - **Método:** `PUT`
    - **Headers:** `Content-Type: application/json`
    - **Body (JSON):**
        ```json
        {
            "nombre": "Nuevo Nombre de la Categoría"
        }
        ```
- **Eliminar una categoría:**
    - **URL:** `http://127.0.0.1:8000/api/categorias/{id}`
    - **Método:** `DELETE`

### Libros

- **Listar todos los libros:**
    - **URL:** `http://127.0.0.1:8000/api/libros`
    - **Método:** `GET`
- **Obtener un libro por ID:**
    - **URL:** `http://127.0.0.1:8000/api/libros/{id}`
    - **Método:** `GET`
- **Crear un nuevo libro:**
    - **URL:** `http://127.0.0.1:8000/api/libros`
    - **Método:** `POST`
    - **Headers:** `Content-Type: application/json`
    - **Body (JSON):**
        ```json
        {
            "titulo": "Título del Libro",
            "autor_id": 1,
            "categoria_id": 1,
            "isbn": "978-3-16-148410-0",
            "fecha_publicacion": "2023-01-01",
            "precio": 25.99,
            "stock": 100
        }
        ```
- **Actualizar un libro:**
    - **URL:** `http://127.0.0.1:8000/api/libros/{id}`
    - **Método:** `PUT`
    - **Headers:** `Content-Type: application/json`
    - **Body (JSON):**
        ```json
        {
            "titulo": "Nuevo Título del Libro",
            "precio": 29.99
        }
        ```
- **Eliminar un libro:**
    - **URL:** `http://127.0.0.1:8000/api/libros/{id}`
    - **Método:** `DELETE`

### Ventas

- **Listar todas las ventas:**
    - **URL:** `http://127.0.0.1:8000/api/ventas`
    - **Método:** `GET`
- **Obtener una venta por ID:**
    - **URL:** `http://127.0.0.1:8000/api/ventas/{id}`
    - **Método:** `GET`
- **Crear una nueva venta:**
    - **URL:** `http://127.0.0.1:8000/api/ventas`
    - **Método:** `POST`
    - **Headers:** `Content-Type: application/json`
    - **Body (JSON):**
        ```json
        {
            "user_id": 1,
            "total": 50.00,
            "fecha_venta": "2023-11-30"
        }
        ```
- **Actualizar una venta:**
    - **URL:** `http://127.0.0.1:8000/api/ventas/{id}`
    - **Método:** `PUT`
    - **Headers:** `Content-Type: application/json`
    - **Body (JSON):**
        ```json
        {
            "total": 60.00
        }
        ```
- **Eliminar una venta:**
    - **URL:** `http://127.0.0.1:8000/api/ventas/{id}`
    - **Método:** `DELETE`