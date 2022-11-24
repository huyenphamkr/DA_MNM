<?php

namespace App\Repositories\Order;

use App\Models\Orders;
use App\Repositories\BaseRepository;
use App\Repositories\Order\OrderRepositoryInterface;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{
    public function getModel()
    {
        return Orders::class;
    }
    public function getOrderByUserId($userId)
    {
        return $this->model
            ->where('user_id', $userId)
            ->get();
    }
}