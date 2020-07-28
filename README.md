# [Mini-Market](https://acvillazon-market.000webhostapp.com)

Mini-Market, es una aplicación Web, que simula ser un administrador de ventas para pequeños comercios. Este pequeño software le permitirá al usuario o dueño de comercio llevar sus cuentas, tener sus clientes almacenados, saber el stock de cada producto y registrar cada venta.

El software básicamente cumple con las siguientes tareas.

* Registrar, actualizar, y eliminaros clientes.
* Registrar, actualizar, y eliminar productos de su tienda.
* Añadir mas productos al stock (actualizar la cantidad disponibles).
* Ver información del cliente.
* Ejecutar ventas, mediante un pequeño "cajero virtual". 
* Tiene un apartado de graficas que básicamente muestra información estadística sobre las ventas realizadas.
Para ejecutar

## Construido con 🛠️

* [Codeigniter: 3.1.11](https://codeigniter.es) y probado con PHP 7.3.19
* [Alojamiento: 000Webhost](https://www.000webhost.com)
* [Mysql (Servicio 000webhost)](https://www.000webhost.com)

### Pre-requisitos 📋

Para poner en marcha el proyecto debemos tener instalado.

```
PHP
Apache, Valet, Xampp o cualquier servidor que admita PHP.
```

### Ejecución 🔧
Luego de descargar el código fuente.
Lo ideal es crear una base de datos local y conectarse a ella. En el código fuente podrán encontrar la estructura de las bases de datos. 

Luego pasaremos a la configuración, debemos dirigirnos al archivo config/database.php que se encuentra dentro de la carpeta application y aqui debemos modificar los datos correspondientes a la conexión a nuestra base de datos.

Luego pasaremos a nuestro archivo config y lo recomendable es que modifiquemos nuestro $base_url, por la URL donde este corriendo nuestro proyecto.

Una ultima observación, para el correcto funcionamiento debemos tener en cuenta que las tablas referentes a los tipos de usuario (roles) y tipo de product (type_product), deberemos llenarla mediante comando SQL, ya que no existe apartado en la Web para llenar estos campos, esto porque son tablas ENUM, deberán ser llenadas con antelación.

### APP Mini Market 🔧

Mediante la app podrás gestionar tus productos, desde agregar nuevos hasta modificar los existentes. Además cuenta con un lector QR, cuyo fin es aprovechar la capacidad de nuestra cámara, a partir de ella podremos leer códigos QR validos que nos dirijan a los detalles de cierto producto en particular, a partir de aquí podrás realizar operaciones de actualización de datos. Nuestro lector sin duda nos ayudara en caso que tengamos miles de productos y queremos saber de uno. 

## Construido con 🛠️

* [Ionic: 5.4.16](https://ionicframework.com)
* [Angular 9](https://angular.io)
* Mysql

# Formato QR
Texo plano, como contenido el ID del producto.

[![Epayco|Solid](https://chart.googleapis.com/chart?cht=qr&chl=14&chs=180x180&choe=UTF-8&chld=L|2)](https://es.qr-code-generator.com)

**Andrés Villazon** - [acvillazon](https://github.com/acvillazon)