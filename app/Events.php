<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $table = 'events';

    protected $fillable = [
        'title','short_description','description','image','start_date','end_date','venue','popular','top_events','category_id','latitude','longtitude','organized_name','address','city','state','contact_number','email','website_url',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    protected $primaryKey = 'id';

    
    public static function getTopEvents(){
        return Events::where('top_events', 1)->get();
    }
}
