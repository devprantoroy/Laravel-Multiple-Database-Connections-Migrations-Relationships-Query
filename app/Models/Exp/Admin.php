<?php

namespace App\Models\Exp;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $connection = 'mysql';

    public function details()
    {
        return $this->hasMany('App\Models\Exp\AdminDetail');
    }
}
