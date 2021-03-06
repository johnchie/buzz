<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contact_us';

    protected $fillable = [
        'user_id','firstname','lastname','email','message'
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    protected $primaryKey = 'id';

}
