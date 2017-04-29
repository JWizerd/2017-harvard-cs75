<?php

/**
 * Renders template.
 *
 * @param array $data
 */
function render($template, $data = array())
{
    $path = __DIR__ . '/../views/' . $template . '.php';
    if (file_exists($path))
    {
        extract($data);
        require($path);
    }
}

?>
