# TPE-WEB2

## Trabajo Practico Especial WEB 2

**Integrantes:** 
- Roberto Ricardo (roberto060804@gmail.com) 
- Simon Salvador (salvadorsimon14@gmail.com).

**Tematica:** 
* BodegaDigital - Tienda de bebidas online.

**Descripcion:** 
Endpoints de nuestro trabajo:

Listado de todos los productos: permite obtener un listado de todos los productos y sus características en formato de objeto JSON. HTTP METHOD: GET. Ejemplo para obtener todos los productos de forma normal: http://localhost/tpe-web2-entrega3/api/bebidas Ejemplo para obtener los productos dado un campo de la tabla y un tipo de orden: http://localhost/tpe-web2-entrega3/api/bebidas/?sort=valor&order=desc 

Listado de un producto en particular (por id): se ingresa el id del producto del cual se quiere ver su información y se lista ese producto en particular. HTTP METHOD: GET Ejemplo: http://localhost/tpe-web2-entrega3/api/bebidas/7

Agregar un nuevo producto: se completan todos los campos requeridos en la sección 'body' y se agrega un producto. Ejemplo: http://localhost/tpe-web2-entrega3/api/bebidas METHOD: POST 

Modificar un producto: permite, si se está autorizado, modificar un producto dado su id y completando los campos requeridos. HTTP METHOD: PUT Ejemplo: http://localhost/tpe-web2-entrega3/api/bebidas/5 

Eliminar un producto: permite dado un id, eliminar un producto. METHOD: DELETE Ejemplo: http://localhost/tpe-web2-entrega3/api/bebidas/18
