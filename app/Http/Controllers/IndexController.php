<?php

namespace App\Http\Controllers;

use App\Domain\Info\Gateways\InfoGateway;
use Exception;

final class IndexController
{
    /**
     * Получаем данные
     * @param array $requestData
     * @param int $offset
     * @param int $limit
     * @return array
     */
    public function getInfo(array $requestData):array
    {
        try {
            $page = isset($requestData['get']['page']) ? (int)$requestData['get']['page'] : 1;
            $limit = isset($requestData['get']['limit']) ? (int)$requestData['get']['limit'] : 5;
            $offset = ($page - 1) * $limit;
            return (new InfoGateway())->getInfo($offset, $limit);

        } catch (Exception $e) {
            echo $e->getMessage();
            return [];
        }
    }

}