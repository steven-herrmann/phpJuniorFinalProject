<?php
namespace JProjFinal\Includes;

class Views
{
    static function exists ($page)
    {
        return self::getViewPath($page) != '';
    }

    static function render ($page, $vars=array())
    {
        self::renderPart($page, $vars);
        exit;
    }

    static function renderPart ($page, $vars=array())
    {
        if (!self::exists($page))
        {
            if (!self::exists('404')) exit('No 404 page found');
            self::render('404');
        }

        extract($vars);

        require self::getViewPath($page);
    }

    private static function getViewPath ($page)
    {
        return realpath(PAGEPATH . "/$page.php");
    }
}