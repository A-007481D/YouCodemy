<?php

function isAdmin(): bool
{
    if (isset($_SESSION['admin'])) {
        return true;
    }
    return false;
}

//function isInstructor(): bool
//{
//    if (isset($_SESSION['instructor'])) {
//        return true;
//    }
//    return false;
//}

function isInstructor(): bool {
    return isset($_SESSION['user']) && $_SESSION['user']->getRole() === 'instructor';
}

function isStudent(): bool
{
    if (isset($_SESSION['student'])) {
        return true;
    }
    return false;
}


function dd($value)
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    die();
}

function pd($value)
{
    echo '<pre>';
    print_r($value);
    echo '</pre>';
    die();
}