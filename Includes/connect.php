<?php
use \JProjFinal\Configuration;

try
{
    dibi::connect(array(
        'driver'   => 'mysqli',
        'host'     => Configuration::mysql_hostname,
        'username' => Configuration::mysql_username,
        'password' => Configuration::mysql_password,
        'database' => Configuration::mysql_database,
        'options'  => array(
            MYSQLI_OPT_CONNECT_TIMEOUT => 30
        ),
        'flags'    => MYSQLI_CLIENT_COMPRESS,
    ));

}
catch (DibiException $e)
{
    echo get_class($e), ': ', $e->getMessage(), "\n";
}