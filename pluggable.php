<?php
/**
 * Contains any and all global functions
 */


function siteUrl ($path, $echo = true)
{
    static $scriptPath;
    if ($scriptPath === null)
        $scriptPath = trim(preg_replace('/index\.[a-z]+/i', '', $_SERVER['SCRIPT_NAME']), '/');

    $result = '/' . $scriptPath . '/' . trim($path);

    if ($echo) echo $result;
    else return $result;
}