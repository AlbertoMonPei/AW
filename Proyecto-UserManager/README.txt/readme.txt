Este proyecto consiste en crear una aplicacion web de un CRUD (Crear, Leer, Actualizar y Eliminar).

El objetivo es gestionar usuarios permitiendo el registro, el login y un panel de administracion protegido solo para usuarios con rol de admin.

--ESTRUCTURA--

He organizado la estructura en varios bloques y archivos.

Bloque admin: es zona privada donde tengo todas las operaciones que se pueden realizar del CRUD.
Bloque CSS: donde está toda la personalizacion visual del codigo de la aplicacion
Bloque sql: donde tengo las instrucciones para crear la base de datos, insertando por primera vez un usuario con rol de admin.
Bloque JavaScript(js):
Bloque readme: en este bloque tengo un archivo donde explico qué es, cómo funciona y cómo está estructurado.

index.php: está es la página principal de la aplicación, en ella damos la bienvenida a la aplicacion y damos la opcion de registrarnos o logearnos.
db.php: en este archivo conectamos la aplicacion a nuestra base de datos creada previamente usando mysql
list.php: en este archivo tengo creado la lista de usuarios, en el que puedo 