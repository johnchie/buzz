<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eventslike extends Model {

    protected $table = 'event_like';
    protected $fillable = [
        'event_id', 'user_id'
    ];
    protected $hidden = [
        'created_at', 'updated_at',
    ];
    protected $primaryKey = 'id';

}
