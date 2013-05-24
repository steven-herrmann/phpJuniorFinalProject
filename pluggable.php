<?php
/**
 * Contains any and all global functions
 */


function siteUrl ($path, $echo = true)
{
    $schema = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] ? 'https' : 'http';
    $domain = rtrim($_SERVER['HTTP_HOST'], '/');

    $path = $schema . '://' . $domain . '/' . SITE_PATH . '/' . trim($path, '/');

    if ($echo) echo $path;
    else return $path;
}

/**
 * Given an array, get the value of the given key, or default if it does not exist
 * @param  array  $array
 * @param  mixed  $key     
 * @param  string $default
 * @param  bool   $echo
 * @return mixed 
 */
function av (&$array, $key, $default='', $echo=true)
{
    if (is_array($array) && array_key_exists($key, $array))
        $output = $array[$key];
    else
        $output = $default;

    if ($echo) echo htmlspecialchars($output);
    else return $output;
}

function flashMessage ($path, $message='')
{
    $_SESSION['flashmessage'] = $message;
    redirect($path);
}

function displayFlashMessage ()
{
    if (isset($_SESSION['flashmessage']))
    {
        echo '<div class="message">'.$_SESSION['flashmessage'].'</div>';
        unset($_SESSION['flashmessage']);
    }
}

function redirect ($path)
{
    header('Location: ' . siteUrl($path, false));
    exit;
}