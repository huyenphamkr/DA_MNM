<?php

namespace App\Repositories\OrderDetail;

use App\Models\Orderdetail;
use App\Repositories\BaseRepository;
use App\Repositories\OrderDetail\OrderDetailRepositoryInterface;

class OrderDetailRepository extends BaseRepository implements OrderDetailRepositoryInterface
{
    public function getModel()
    {
        return Orderdetail::class;
    }
}