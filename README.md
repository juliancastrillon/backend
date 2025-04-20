# API de Productos

API RESTful desarrollada con Laravel para la gestión de productos.

## Características

- Gestión CRUD de productos
- Validación de datos
- Respuestas en formato JSON
- Paginación de resultados
- Documentación de endpoints

## Requisitos

- PHP >= 8.1
- Composer
- MySQL/MariaDB
- Apache/Nginx

## Instalación

1. Clonar el repositorio:
```bash
git clone https://github.com/juliancastrillon/backend.git
cd backend
```

2. Instalar dependencias:
```bash
composer install
```

3. Copiar el archivo de entorno:
```bash
cp .env.example .env
```

4. Generar la clave de aplicación:
```bash
php artisan key:generate
```

5. Configurar la base de datos en el archivo `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_base_datos
DB_USERNAME=usuario
DB_PASSWORD=contraseña
```

6. Ejecutar migraciones:
```bash
php artisan migrate
```

7. Iniciar el servidor de desarrollo:
```bash
php artisan serve
```

## Endpoints

### Listar Productos
```
GET /api/products
```
Retorna una lista paginada de productos.

### Crear Producto
```
POST /api/products
```
Crea un nuevo producto.

Parámetros requeridos:
- `name`: string (nombre del producto)
- `price`: numeric (precio del producto)
- `detail`: string (descripción del producto)

### Actualizar Producto
```
PUT /api/products/{id}
```
Actualiza un producto existente.

Parámetros requeridos:
- `name`: string (nombre del producto)
- `price`: numeric (precio del producto)
- `detail`: string (descripción del producto)

### Eliminar Producto
```
DELETE /api/products/{id}
```
Elimina un producto existente.

## Ejemplos de Respuestas

### Crear Producto (201 Created)
```json
{
    "data": {
        "id": 1,
        "name": "Lente polarizado",
        "price": 99.99,
        "detail": "Protección UV"
    }
}
```

### Listar Productos (200 OK)
```json
{
    "data": [
        {
            "id": 1,
            "name": "Lente polarizado",
            "price": 99.99,
            "detail": "Protección UV"
        }
    ],
    "meta": {
        "current_page": 1,
        "per_page": 15,
        "total": 1
    }
}
```

## Validación

La API incluye validación de datos para asegurar la integridad de la información:

- El nombre del producto es requerido y debe ser una cadena de texto
- El precio es requerido y debe ser un valor numérico
- La descripción es requerida y debe ser una cadena de texto

## Seguridad

- La API utiliza autenticación mediante tokens
- Todas las rutas están protegidas por middleware de autenticación
- Las solicitudes deben incluir el token de autenticación en el encabezado `Authorization`

## Contribución

1. Fork el proyecto
2. Crear una rama para tu feature (`git checkout -b feature/AmazingFeature`)
3. Commit tus cambios (`git commit -m 'Add some AmazingFeature'`)
4. Push a la rama (`git push origin feature/AmazingFeature`)
5. Abrir un Pull Request

## Licencia

Este proyecto está bajo la Licencia MIT. Ver el archivo `LICENSE` para más detalles.
