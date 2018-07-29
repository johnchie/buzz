<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usercategories extends Model {

    protected $table = 'user_categories';
    protected $fillable = [
        'user_id', 'category_id'
    ];
    protected $hidden = [
        'created_at', 'updated_at',
    ];
    protected $primaryKey = 'id';

}
