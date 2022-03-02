<?php

declare(strict_types=1);

namespace AbstractFactory\Repository;

use AbstractFactory\Contract\OrderRepositoryInterface;
use AbstractFactory\Entity\Order;
class RedisOrderRepository extends BaseRedisRepository
    implements OrderRepositoryInterface
{
    public function add(Order $order)
    {
        echo 'Добавляем в redis заказ $order.' . PHP_EOL;
    }

    public function delete(Order $order)
    {
        echo 'Удаляем в redis заказ $order.' . PHP_EOL;
    }

    public function update(Order $order)
    {
        echo 'Обновляем в redis заказ $order.' . PHP_EOL;
    }
}