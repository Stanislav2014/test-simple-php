<?php

namespace App\Domain\Info\Gateways;

use App\Db\Db;
use PDO;

final class InfoGateway
{
    /**
     * Получение информации
     * @return array
     */
    public function getInfo(int $offset, int $limit): array
    {
        $db = (new Db());

        $sql = $db->pdo->prepare('SELECT * FROM items LIMIT :limit OFFSET :offset');
        $sql->bindParam(':limit', $limit, PDO::PARAM_INT);
        $sql->bindParam(':offset', $offset, PDO::PARAM_INT);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}