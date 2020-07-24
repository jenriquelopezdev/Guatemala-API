# Guatemala API
Este es el repositorio principal del proyecto Guatemala API.

## Setup
Para ejecutar la aplicación, primero clone el repositorio en su máquina local:


```bash
git clone https://github.com/jenriquelopezdev/Guatemala-API.git
```

Si está recién clonado, se necesitan algunos pasos adicionales:
1. Instale las dependencias del proyecto: ``` composer install ```  
Esto es lo que realmente instala Laravel, entre otros paquetes necesarios para comenzar.
2. Instalar dependencias NPM: ``` npm install ``` ó ``` yarn install ```.  
Esto instalará los paquetes necesarios de Javascript (o Nodo): Vue.js, Bootstrap.css, Lodash y Laravel Mix.
3. Cree/copie el archivo .env: ``` cp .env.example .env ```  
El repositorio contiene un archivo _.env.example_ que es una plantilla del archivo _.env_ que necesita el proyecto.
4. Crear una base de datos para el proyecto ```  mysql> CREATE DATABASE tu_base_de_datos;```  
5. Modificar el archivo  _.env_  para que quede acorde al ambiente que tenemos en el nuevo equipo, particularmente lo que se refiere a la conectividad con la base de datos.
```  DB_HOST=localhost ``` 
```  DB_DATABASE=tu_base_de_datos ``` 
```  DB_USERNAME=root ``` 
```  DB_PASSWORD=  ``` 
6. Genere una clave de cifrado de la aplicación:``` php artisan key:generate ```  
Laravel requiere que tenga una clave de cifrado de la aplicación que se almacena en su archivo _.env_ para cifrar cookies, hashes de contraseña y más.
7. Ejecute el siguiente comando para migrar su base de datos: ``` php artisan migrate:fresh --seed  ```  
8. Luego, debes ejecutar el comando: ``` php artisan passport:install  ```  
Este comando creará las llaves de encriptación necesarias para generar los tokens de acceso. Adicionalmente el comando creará el “personal access” y “password grant” de los clientes que se usarán para generar los tokens de acceso:
9. Ejecute los UnitTesting ``` composer test ```  
10. Generar documentación swagger ```  php artisan l5-swagger:generate ```  



Si tiene PHP instalado localmente y desea utilizar el servidor de desarrollo integrado de PHP para servir su aplicación, puede usar el comando serve Artisan. Este comando iniciará un servidor de desarrollo en
[localhost:8000](http://localhost:8000):

```
php artisan serve
```

Para visualizar la documentación visitar la url:
[localhost:8000/api/documentation](http://localhost:8000/api/documentation):
