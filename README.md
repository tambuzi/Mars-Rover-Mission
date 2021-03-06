# MARS ROVER MISSION 馃殌

Ejercicio realizado por Alejandro Fern谩ndez.

## 1. Contexto 馃搵

El reto consiste en elaborar un sistema que permita que la nave (Mars Rover) sea capaz de llegar a su destino final sin colisionar con ning煤n obst谩culo.
Para ello, se ha creado una interfaz gr谩fica sencilla en la que el usuario debe introducir la posici贸n inicial de na nave (Eje X y Eje Y), junto con la orientaci贸n (Norte, Sur, Este y Oeste) y los movimientos que debe realizar la nave (F, R, L).
Una vez introducidos los datos, la aplicaci贸n nos retorna un JSON con la informaci贸n del viaje espacial.
`{"statusCode":200,"startPosition":"10, 20","endPosition":"20, 20","message":"la nave ha llegado a su destino"}`

En el caso de que la nave detecte una colisi贸n con un objetivo, se detendr谩 y retornar谩 un mensaje de error.

## 2. Tecnolog铆as

Para realizar esta aplicaci贸n se han usado las siguientes tecnolog铆as:

1.  Docker
2.  PHP =< 8.1
3.  Laravel 9
4.  HTML, CSS y JS
5.  Arquitectura Hexagonal
6.  GitHub

## 3. Ejecuci贸n

Se recomienda levantar la aplicaci贸n dentro de Docker.

Para ello, abrir el directorio ra铆z del proyecto con la consola WSL y ejecutar el instalador `composer install`. Posteriormente, ejecutar el siguiente comando: `./vendor/bin/sail up` o levantar los contenedores mediante `docker-compose up`

Para visualizar el aplicativo, se debe entrar en http://localhost .

Para lanzar los test, se debe entrar dentro del contenedor docker de Laravel y ejecutar el siguiente comando: `php artisan test`

Por otro lado, la aplicaci贸n tambi茅n se puede ejecutar levantando un servidor propio de apache.
Para ello insertar el repositorio en el directorio `htdocs` y ejecutar el instalador `composer install`

### 3.1 Jerarqu铆a de carpetas

Durante el desarrollo del aplicativo, se ha intentado desacoplar al m谩ximo la l贸gica de la Arquitectura Hexagonal. Mediante la separaci贸n de esta en una carpeta distinta a la jerarqu铆a que propone Laravel.
Todos los componentes del aplicativo se encuentran dentro de la carpeta src a excepci贸n de los test y el orquestador o controlador principal que se puede localizar dentro de la ruta `app/Http/Controllers`.

Por otro lado, se ha simulado un repositorio persistente a modo de mantener los datos en todo el aplicativo durante la ejecuci贸n debido a que no se ha hecho uso de una base de datos. 


## 4. Mejoras y Conclusiones

En primer lugar, agradecer la oportunidad que ha supuesto el reto, ya que me lo he pasado muy bien realiz谩ndolo y he podido aprender una nueva forma de integrar la Arquitectura Hexagonal dentro de Laravel.
C贸mo puntos a mejorar dentro del aplicativo, destacar铆a la escasez de test, porque 煤nicamente he podido efectuar un caso a modo demostrativo debido a la falta de tiempo en el desarrollo.
A su vez, tambi茅n a帽adir铆a un mejor sistema de excepciones, junto con m谩s avisos sobre el comportamiento del aplicativo en todo momento.
