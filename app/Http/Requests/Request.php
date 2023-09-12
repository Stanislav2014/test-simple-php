<?php

namespace App\Http\Requests;

final class Request
{
    public static function getRequest()
    {
        $data['get'] = $_GET;
        $data['post'] = $_POST;
        return $data;
    }
}