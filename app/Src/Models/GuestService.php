<?php

namespace App\Src\Models;

use Illuminate\Database\Eloquent\Model;

class GuestService extends Model
{
    protected $guarded = ['id'];
    protected $hidden = [];
    protected $table = 'guest_services';
    public $timestamps = false;

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

}
