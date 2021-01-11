# PHP Oops

Librería para el manejo de errores en PHP.

## Instalación

```
composer require impulsolike/oops
```

## Importar

```
use ImpulsoLike\Oops\Oops;
```

## Lanzar un error

Puedes lanzar un error `Oops` tal como lanzarías una `Exception` de PHP, ejemplo:

```
throw new Oops();
```

Adicional puedes personalizar tu error `Oops` usando los siguientes parámetros:

```
throw new Oops(?int $code, ?string $type, ?bool $debug);
```

Parámetro       | Tipo de variable  | Default       | Descripción
-------------   |-------------      |-------------  |-------------
`$code`         | `int`             | `0`           | Código de error
`$type`         | `string`          | `error`       | Tipo de error
`$debug`        | `bool`            | `true`        | Modo debug

Por ejemplo si requiero lanzar un `Oops` por un error que ocurrió en mi servicio de **Login** lo haría del siguiente modo:

```
throw new Oops(1, 'login');
```

Y como notarás los parámetros son opcionales.

## Atrapar un error

Para atrapar un `Oops` usa la lógica `catch` del siguiente modo:

```
catch (Oops $error) {
    ...
}
```

Igual puedes usar la interfaz `IsOops` del siguiente modo:

```
catch (IsOops $error) {
    ...
}
```

## Obtener datos del error

Los métodos disponibles en la clase `Oops` son los siguientes:

Método              | Descripción
-------------       | -------------
`->getType()`       | Tipo de error
`->getCode()`       | Código de error
`->getFile()`       | Archivo donde ocurrio el error
`->getLine()`       | Linea del archivo donde ocurrio el  de error
`->getMessage()`    | Mensaje de error
`->getMicrotime()`  | Microtime del error
`->getTimestamp()`  | Timestamp del error
`->getDebug()`      | Modo debug

## Obtener datos del error en un array

Si deseas generar un array con los datos del error, puedes emplear el método `->toArray()`, ejemplo:
```
$mi_error = $error->toArray();
```
El resultado en `$mi_error` será un array que contenga los índices `type`, `code`, `message` y `debug`.

Recuerda que si indicas `$debug` como `true` al momento de lanzar tu `Oops`, al resultado en `$mi_error` se le agregarán los índices `file`, `line`, `microtime` y `timestamp`.

## Licencia

PHP Error es una librería de código abierto bajo la licencia [MIT license](https://opensource.org/licenses/MIT).
