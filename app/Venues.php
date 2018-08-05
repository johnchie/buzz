<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venues extends Model {

    protected $table = 'venues';
    protected $fillable = [
        'title', 'location', 'latitude', "longitude", "phone_number", "fax_number", "open_hours", "close_hours", "banner_image",
        "logo_image", "about_us", "status"
    ];
    protected $hidden = [
        'created_at', 'updated_at',
    ];
    protected $primaryKey = 'id';

}
