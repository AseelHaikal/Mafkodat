<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement_Status extends Model
{
    use HasFactory;
    protected $table='announcement_status';
    protected $fillable=[
        'id',
        'name'
    ];
    protected $hidden=[];
    public $timestamps=false;


    ############## Relations ###################
    public function announcements(){
        return $this -> hasMany('App\Models\Announcement','status_id');
     }

}
