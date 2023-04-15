<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bills extends Model
{
    use HasFactory;
    protected $table = 'bills';
    protected $primaryKey = 'id';

    public function userOrder()
    {
        return $this->hasOne('App\Models\User', 'user_order_id');
    }
}
