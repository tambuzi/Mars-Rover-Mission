# MARS ROVER MISSION 🚀

Ejercicio realizado por Alejandro Fernández.

## 1. Contexto 📋

El resto consiste en elaborar un sistema que permita que la nave (Mars Rover) sea capaz de llegar a su destino final sin colisionar con ningún obstáculo.
Para ello, se ha creado una interfaz gráfica sencilla en la que el usuario debe introducir la posición inicial de na nave (Eje X y Eje Y), junto con la orientación (Norte, Sur, Este y Oeste) y los movimientos que debe realizar la nave (F, R, L).
Una vez introducidos los datos, la aplicación nos retorna un JSON con la información del viaje espacial.
`{"statusCode":200,"startPosition":"10, 20","endPosition":"20, 20","message":"la nave ha llegado a su destino"}`

En el caso de que la nave detecte una colisión con un objetivo, se detendrá y retornará un mensaje de error.

## 2. Tecnologías

Para realizar esta aplicación se han usado las siguientes tecnologías:

1.  Docker
2.  PHP =< 8.1
3.  Laravel 9
4.  HTML, CSS y JS
5.  Arquitectura Hexagonal
6.  GitHub

## 3. Ejecución

Se recomienda levantar la aplicación dentro de Docker.
Para ello, abrir el directorio raíz del proyecto con la consola WSL y ejecutar el siguiente comando: `./vendor/bin/sail up`
Para visualizar el aplicativo, se debe entrar en http://localhost .

Para lanzar los test, se debe entrar dentro del contenedor docker de Laravel y ejecutar el siguiente comando: `php artisan test`

Por otro lado, la aplicación también se puede ejecutar levantando un servidor propio de apache.
Para ello insertar el repositorio en el directorio `htdocs` y ejecutar el instalador `composer install`

### 3.1 Jerarquía de carpetas

Durante el desarrollo del aplicativo, se ha intentado desacoplar al máximo la lógica de la Arquitectura Hexagonal. Mediante la separación de esta en una carpeta distinta a la jerarquía que propone Laravel.
Todos los componentes del aplicativo se encuentran dentro de la carpeta src a excepción de los test y el orquestador o controlador principal que se puede localizar dentro de la ruta `app/Http/Controllers`.

Por otro lado, se ha simulado un repositorio persistente a modo de mantener los datos en todo el aplicativo durante la ejecución debido a que no se ha hecho uso de una base de datos. 


## 4. Mejoras y Conclusiones

En primer lugar, agradecer la oportunidad que ha supuesto el reto, ya que me lo he pasado muy bien realizándolo y he podido aprender una nueva forma de integrar la Arquitectura Hexagonal dentro de Laravel.
Cómo puntos a mejorar dentro del aplicativo, destacaría la escasez de test, porque únicamente he podido efectuar un caso a modo demostrativo debido a la falta de tiempo en el desarrollo.
A su vez, también añadiría un mejor sistema de excepciones, junto con más avisos sobre el comportamiento del aplicativo en todo momento.