# [Mini-Market](https://acvillazon-market.000webhostapp.com)

Mini-Market, es una aplicación Web, que simula ser un administrador de ventas para pequeños comercios. Este pequeño software le permitirá al usuario o dueño de comercio llevar sus cuentas, tener sus clientes almacenados, saber el stock de cada producto y registrar cada venta.

El software basicamente cumple con las siguientes tareas.

* Registrar, actualizar, y eliminaros clientes.
* Registrar, actualizar, y eliminar productos de su tienda.
* Añadir mas productos al stock (actualizar la cantidad disponibles).
* Ver información del cliente.
* Ejecutar ventas, mediante un pequeño "cajero virtual". 
* Tiene un apartado de graficas que basicamente muestra información estadistica sobre las ventas realizadas.
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
Lo ideal es crear una base de datos local y conectarse a ella. En el codigo fuente podran encontrar la estructura de las bases de datos. 

Luego pasaremos a la configuración, debemos dirigirnos al archivo config/database.php que se encuentra dentro de la carpeta application y aqui debemos modificar los datos correspondientes a la conexion a nuestra base de datos.

Luego pasaremos a nuestro alchivo config y lo recomendable es que modifiquemos nuestro $base_url, por la url donde este corriendo nuestro proyecto.

Una ultima observación, para el correcto funcionamiento debemos tener en cuenta que las tablas refetentes a los tipos de usuario (roles) y tipo de product (type_product), deberemos llenarla mediante comando sql, ya que no existe apartado en la web para llenar estos campos, esto porque son tablas ENUM, deberan ser llenadas con antelación.

**Andrés Villazon** - [acvillazon](https://github.com/acvillazon)