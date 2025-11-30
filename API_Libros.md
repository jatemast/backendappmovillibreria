# API de Libros

Este documento proporciona ejemplos de cómo interactuar con la API de Libros utilizando `curl`. Asume que el servidor Laravel está ejecutándose en `http://127.0.0.1:8000`.

## Endpoints

| Método HTTP | URI                     | Acción                       |
|-------------|-------------------------|------------------------------|
| GET         | `/api/libros`           | Obtener todos los libros     |
| POST        | `/api/libros`           | Crear un nuevo libro         |
| GET         | `/api/libros/{id}`      | Obtener un libro específico  |
| PUT/PATCH   | `/api/libros/{id}`      | Actualizar un libro existente|
| DELETE      | `/api/libros/{id}`      | Eliminar un libro            |

---

## 1. Obtener todos los libros (GET /api/libros)

Este endpoint recupera una lista de todos los libros disponibles.

```bash
curl -X GET "http://127.0.0.1:8000/api/libros" \
     -H "Accept: application/json"
```

---

## 2. Crear un nuevo libro (POST /api/libros)

Este endpoint permite crear un nuevo libro en la base de datos. Se requiere un token de autenticación.

**Cuerpo de la solicitud (JSON):**
```json
{
    "titulo": "Cien años de soledad",
    "autor_id": 1,
    "categoria_id": 1,
    "isbn": "978-0307474728",
    "editorial": "Sudamericana",
    "precio": 15.99,
    "stock": 100,
    "fecha_publicacion": "1967-05-30",
    "descripcion": "Novela de realismo mágico de Gabriel García Márquez.",
    "imagen": "http://example.com/imagen-cien-anios.jpg"
}
```

**Ejemplo `curl`:**
```bash
curl -X POST "http://127.0.0.1:8000/api/libros" \
     -H "Accept: application/json" \
     -H "Content-Type: application/json" \
     -H "Authorization: Bearer <TU_TOKEN_DE_AUTENTICACION>" \
     -d '{
           "titulo": "Cien años de soledad",
           "autor_id": 1,
           "categoria_id": 1,
           "isbn": "978-0307474728",
           "editorial": "Sudamericana",
           "precio": 15.99,
           "stock": 100,
           "fecha_publicacion": "1967-05-30",
           "descripcion": "Novela de realismo mágico de Gabriel García Márquez.",
           "imagen": "http://example.com/imagen-cien-anios.jpg"
         }'
```

---

## 3. Obtener un libro específico (GET /api/libros/{id})

Este endpoint recupera los detalles de un libro por su ID.

**Ejemplo `curl` (para el libro con ID 1):**
```bash
curl -X GET "http://127.0.0.1:8000/api/libros/1" \
     -H "Accept: application/json"
```

---

## 4. Actualizar un libro existente (PUT/PATCH /api/libros/{id})

Este endpoint actualiza los detalles de un libro existente. Se requiere un token de autenticación.

**Cuerpo de la solicitud (JSON):**
```json
{
    "titulo": "Cien años de soledad (Edición Conmemorativa)",
    "precio": 19.99,
    "stock": 80
}
```

**Ejemplo `curl` (para el libro con ID 1):**
```bash
curl -X PUT "http://127.0.0.1:8000/api/libros/1" \
     -H "Accept: application/json" \
     -H "Content-Type: application/json" \
     -H "Authorization: Bearer <TU_TOKEN_DE_AUTENTICACION>" \
     -d '{
           "titulo": "Cien años de soledad (Edición Conmemorativa)",
           "precio": 19.99,
           "stock": 80
         }'
```

---

## 5. Eliminar un libro (DELETE /api/libros/{id})

Este endpoint elimina un libro de la base de datos por su ID. Se requiere un token de autenticación.

**Ejemplo `curl` (para el libro con ID 1):**
```bash
curl -X DELETE "http://127.0.0.1:8000/api/libros/1" \
     -H "Accept: application/json" \
     -H "Authorization: Bearer <TU_TOKEN_DE_AUTENTICACION>"