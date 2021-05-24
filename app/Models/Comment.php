<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table='comments';
    protected $fillable=[
        'id',
        'user_id',
        'announcement_id',
        'is_active',
        'content',
    ];
    protected $hidden=[];
    public $timestamps=true;


    ############## Relations ###################
    public function user(){
        return $this -> belongsTo('App\Models\User','user_id');
     }
      public function announcement(){
        return $this -> belongsTo('App\Models\Announcement','announcement_id');
     }

}
