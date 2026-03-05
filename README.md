# ✅ To-Do-List
Gestionar tareas de forma sencilla,intuitiva y ordenada por prioridades y categorias.

## 🚀 Funcionalidades
- CRUD Completo (Crear, Editar, Listar, Borrar).
- Sistema de prioridades visuales.
- Toggle de estado (Completado/Pendiente) con iconos dinámicos.

## 🛠️ Aspectos Técnicos Destacados
Para este proyecto, me enfoqué en aplicar buenas prácticas de desarrollo con **Laravel 11**:

* **Validación Robusta de Datos:** Implementación de reglas de negocio en el backend (Required, Max Length, etc.) para asegurar la integridad de la información antes de persistirla en la base de datos.
* **Feedback Visual de Errores:** Uso de directivas `@error` de Blade y clases condicionales de Tailwind CSS para resaltar campos inválidos y mostrar mensajes personalizados, mejorando la experiencia de usuario (UX).
* **Persistencia de Estado:**Uso de la función old() y manejo de sesiones para que el usuario no pierda la información ingresada si ocurre un error de validación.
* **Seguridad:** Protección completa contra ataques CSRF en todos los formularios de la aplicación.

## 📅 Próximas Funcionalidades (Roadmap)
Para seguir escalando la aplicación, tengo planeado implementar:

* **Autenticación de Usuarios:** Permitir que cada usuario tenga su propia lista de tareas privada mediante Laravel Breeze.
* **Fechas de Vencimiento:** Incorporar un campo de fecha límite con alertas visuales para tareas atrasadas.
* **API REST:** Desarrollo de endpoints para que la gestión de tareas sea accesible desde aplicaciones móviles o integraciones externas (JSON).
* **Drag & Drop:** Mejorar la UX permitiendo reordenar las tareas visualmente mediante Livewire o SortableJS.
* **Categorización Dinámica:** Implementar un sistema de gestión (CRUD) para que el usuario cree sus propias etiquetas (Trabajo, Estudio, Hogar, etc.).
