<?php

/*
Die & Dump. var_dump function in prettier version.
*/
function dd($data)
{
    echo '<pre>';
    die(var_dump($data));
    echo '</pre>';
}

/*
Used to highlight the active section in Navbar.
*/
function isActive($isActive)
{
    if(trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/') == $isActive)
        {
            $result = 'active';
        } else {
            $result = '';
        }
        return  "{$result}";
}

