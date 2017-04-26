<?php

/**
 * Renders footer.
 *
 * @param array $data
 */
function renderFooter($data = array())
{
    extract($data);
    require('footer.php');
}

/**
 * Renders header.
 *
 * @param array $data
 */
function renderHeader($data = array())
{
    extract($data);
    require('header.php');
}

?>
