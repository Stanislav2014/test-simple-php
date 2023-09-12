<?php

namespace App\Http\Responses;

final class Response
{
    /**
     * Отправляем ответ
     * @param $data
     */
    public static function sendResponse($data)
    {
        echo json_encode($data);
        return;
    }
}