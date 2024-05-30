<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $connection = 'mysql2';

    protected $table_name = 'mysql2.posts';

    public function __construct() {
        $this->table = DB::connection($this->connection)->getDatabaseName() . '.' . $this->getTable();
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
