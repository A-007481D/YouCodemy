<?php

namespace src\http;
class Request
{
    public function Method(): string
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function path(): string {
        $path =  $_SERVER['REQUEST_URI'] ?? '/';
        return parse_url($path)['path'];
        //return str_contains($path, "?" ) ? explode('?', $path)[0] : $path;
    }

}