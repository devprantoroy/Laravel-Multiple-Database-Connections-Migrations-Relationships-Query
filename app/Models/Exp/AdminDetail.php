<?php

namespace App\Models\Exp;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AdminDetail extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $connection = 'mysql2';

    protected $table_name = 'mysql2.admin_details';

    public function __construct() {
        $this->table = DB::connection($this->connection)->getDatabaseName() . '.' . $this->getTable();
    }

    public function admin()
    {
        return $this->belongsTo('App\Models\Exp\Admin');
    }
}
