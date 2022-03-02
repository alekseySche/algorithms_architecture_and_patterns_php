<?php

declare(strict_types=1);

namespace AbstractFactory\Repository;

use AbstractFactory\Contract\OrderRepositoryInterface;
use AbstractFactory\Entity\Order;

class PostgresOrderRepository extends BasePostgresRepository
    implements OrderRepositoryInterface
{
    public function add(Order $order)
    {
        echo 'Добавляем в postgres заказ $order.' . PHP_EOL;
    }

    public function delete(Order $order)
    {
        echo 'Удаляем в postgres заказ $order.' . PHP_EOL;
    }

    public function update(Order $order)
    {
        echo 'Обновляем в postgres заказ $order.' . PHP_EOL;
    }
}