# Laravel Multiple Database Connections, Migrations, Relationships & Querying.
Developed this project using Laravel and MySQL 2 separate Database.

Follow these steps to get your project up and running:

1. User Model:
   ```bash
   class User extends Authenticatable
    {
        use HasFactory, Notifiable;
    
        protected $guarded = ['id'];
    
        protected $connection = 'mysql';
    
        public function posts()
        {
            return $this->hasMany('App\Models\Post');
        }
    }
2. Post Model:
   ```bash
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
3. ENV :
   ```bash
   DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=test_laravel_one
    DB_USERNAME=root
    DB_PASSWORD=
    
    DB_CONNECTION_SECOND=mysql
    DB_HOST_SECOND=127.0.0.1
    DB_PORT_SECOND=3306
    DB_DATABASE_SECOND=test_laravel_two
    DB_USERNAME_SECOND=root
    DB_PASSWORD_SECOND=
4. Migration Command for mysql2 :
   ```bash
    php artisan make:migration create_your_table --path=database/migrations/second_db_folder
    php artisan migrate --database=mysql2 --path=database/migrations/second_db_folder
