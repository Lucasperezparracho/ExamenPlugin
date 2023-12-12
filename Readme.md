# Contador Hola WordPress Plugin

Este es un plugin para WordPress que cuenta la cantidad de veces que aparece la palabra 'hola' en el contenido y el título de las publicaciones.

## Funciones

El plugin tiene tres funciones principales:

1. `crear_tabla_contador_hola()`: Esta función crea una tabla en la base de datos de WordPress para almacenar la cantidad de veces que aparece la palabra "hola" en el contenido y el título. La tabla tiene tres columnas: `id`, `titulo` y `contenido`.

2. `insertar_contador_hola($titulo, $contenido)`: Esta función inserta un nuevo registro en la tabla creada por `crear_tabla_contador_hola()`. El registro contiene la cantidad de veces que la palabra "hola" aparece en el título y el contenido.

3. `mostrar_contador_hola()`: Esta función recupera todos los registros de la tabla creada por `crear_tabla_contador_hola()` y los muestra en una tabla HTML. Cada fila de la tabla representa un registro y muestra la cantidad de veces que la palabra "hola" aparece en el título y el contenido.

## Filter

El plugin utiliza los Filter de WordPress para ejecutar estas funciones cuando se carga el contenido y el título de una publicación:

- `add_filter( 'the_content', 'insertar_contador_hola' )`: Este hook ejecuta la función `insertar_contador_hola()` cuando se carga el contenido de una publicación.
- `add_filter( 'the_content', 'mostrar_contador_hola')`: Este hook ejecuta la función `mostrar_contador_hola()` cuando se carga el contenido de una publicación.
- `add_filter( 'the_title', 'insertar_contador_hola' )`: Este hook ejecuta la función `insertar_contador_hola()` cuando se carga el título de una publicación.
- `add_filter( 'the_title', 'mostrar_contador_hola')`: Este hook ejecuta la función `mostrar_contador_hola()` cuando se carga el título de una publicación.


