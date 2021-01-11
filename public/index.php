<?php

require __DIR__ . '/../vendor/autoload.php';

use ImpulsoLike\Oops\Oops;

echo '<h1>PHP Oops se ha instalado!</h1>';

echo '<p>Recuerda visitar nuestro <a href="https://github.com/impulsolike/php-oops" target="_blank">repositorio</a> en GitHub</p>';


$start_microtime = microtime(true);
try {

    /**
     * Oops lanzado
     */
    $code   = 0;
    $type   = 'error';
    $debug  = true;

    echo '<h2>Oops lanzado</h2>';
    echo '<div><code style="background:#eee;border:1px solid #999;padding:10px;">
    throw new Oops(' . $code . ', ' . $type . ', ' . $debug . ');
    </code></div><br /><br />';

    throw new Oops($code, $type, $debug);

} catch (Oops $error) {

    /**
     * Datos del Oops
     */
    echo '<h2>Datos del Oops</h2>';
    echo '<table style="background:#eee;border:1px solid #999">';
    echo '<tr style="background:#ccc">
    <th>Método</th>
    <th>Resultado</th>
    </tr>';
    echo '<tr>
    <td>$error->getDebug()</td>
    <td>' . ($error->getDebug() ? 'true' : 'false') . '</td>
    </tr>';
    echo '<tr>
    <td>$error->getType()</td>
    <td>' . $error->getType() . '</td>
    </tr>';
    echo '<tr>
    <td>$error->getCode()</td>
    <td>' . $error->getCode() . '</td>
    </tr>';
    echo '<tr>
    <td>$error->getMessage()</td>
    <td>' . $error->getMessage() . '</td>
    </tr>';
    echo '<tr>
    <td></td>
    <td></td>
    </tr>';
    echo '<tr>
    <td>$error->getFile()</td>
    <td>' . $error->getFile() . '</td>
    </tr>';
    echo '<tr>
    <td>$error->getLine()</td>
    <td>' . $error->getLine() . '</td>
    </tr>';
    echo '<tr>
    <td>$error->getTimestamp()</td>
    <td>' . $error->getTimestamp() . '</td>
    </tr>';
    echo '<tr>
    <td>$error->getMicrotime()</td>
    <td>' . $error->getMicrotime() . '</td>
    </tr>';
    echo '</table><br/>';

}

$end_microtime = microtime(true);

echo '<h2>Benchmarking</h2>';
echo '<table style="background:#eee;border:1px solid #999">';
echo '<tr style="background:#ccc">
<th>Microtime al incio</th>
<th>Microtime al final</th>
<th>Resultado</th>
</tr>';
echo '<tr>
<td>' . $start_microtime . '</td>
<td>' . $end_microtime . '</td>
<td>' . ($end_microtime - $start_microtime) . '</td>
</tr>';
echo '</table>';

echo '<p>by ImpulsoLike</p>';
