# 🧑‍💻 CRUD de Personas con PHP y MySQL

Una aplicación web básica que permite realizar operaciones **CRUD** (Crear, Leer, Actualizar y Borrar) sobre una tabla `persona` en una base de datos **MySQL**, utilizando **PHP**, **PDO**, **Bootstrap** y **CSS personalizado**.

---

## 📁 Estructura del Proyecto

├── bd/ │ └── bd_crud.sql ├── conexion.php ├── delete.php ├── index.php ├── insert.php ├── update.php ├── style.css

yaml
Copiar
Editar

---

## 🧠 Descripción de Archivos y Funcionalidad

### 📄 `bd/bd_crud.sql`
Contiene el script SQL para crear la tabla `persona`. Define columnas como:
- `id` (clave primaria, auto-incremental)
- `nombre`, `apellido`, `teléfono`, `ciudad`, `correo`
- Restricciones como `NOT NULL`

---

### 🔌 `conexion.php`
Establece la conexión a la base de datos utilizando **PDO**. Configura las credenciales, crea la instancia y maneja errores mediante excepciones.

---

### 🗑 `delete.php`
Elimina un registro de la tabla `persona`:
- Recibe el `id` por **GET**
- Ejecuta una sentencia `DELETE`
- Redirige a `index.php`
- Muestra error si no hay `id` válido

---

### 🏠 `index.php`
Página principal que:
- Lista todas las personas en una tabla
- Permite búsqueda por nombre o apellido
- Muestra botones para **Editar** y **Eliminar**
- Enlace para **Agregar nuevo cliente**
- Usa **Bootstrap** para la interfaz

---

### ➕ `insert.php`
Formulario para **crear** un nuevo cliente:
- Validación de campos vacíos y formato de correo
- Verifica duplicados por correo o teléfono
- Inserta el registro en la base de datos
- Redirige a `index.php` tras insertar
- Estilo con **Bootstrap**

---

### 🎨 `style.css`
Hoja de estilo personalizada para:
- Fondo, contenedores y tablas
- Formularios y botones
- Búsqueda, enlaces de acción y más

---

### ✏️ `update.php`
Formulario para **editar** un registro existente:
- Carga datos desde la BD con el `id` recibido
- Muestra formulario con campos prellenados
- Valida entradas y actualiza la base de datos
- Redirige a `index.php` tras actualizar
- Usa **Bootstrap** para la UI

---

## 🔄 Flujo CRUD

| Operación | Archivo | Descripción |
|----------|---------|-------------|
| **Crear** | `insert.php` | Formulario para agregar personas |
| **Leer** | `index.php` / `update.php` | Mostrar listado y datos individuales |
| **Actualizar** | `update.php` | Modificar un registro existente |
| **Borrar** | `delete.php` | Eliminar un registro con ID |

---

## 🛠️ Tecnologías Utilizadas

- PHP (con PDO)
- MySQL
- HTML5 / CSS
- Bootstrap 4

---

## 📌 Requisitos

- Servidor local (XAMPP, WAMP, Laragon, etc.)
- PHP 7.x o superior
- MySQL
- Navegador web moderno

---

## 🚀 Cómo Empezar

1. Clona este repositorio o descarga el ZIP
2. Importa el archivo `bd/bd_crud.sql` en tu base de datos MySQL
3. Ajusta las credenciales en `conexion.php`
4. Ejecuta `index.php` desde tu servidor local
5. ¡Listo! Prueba las operaciones CRUD

---

Desarrollado con 💻 por EM_DEV
