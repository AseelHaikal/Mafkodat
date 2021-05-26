<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;
    protected $table='announcements';
    protected $fillable=[
        'id',
        'user_id',
        'status_id',
        'category_id',
        'type_id',
        'place',
        'photo',
        'details',
        'description',
        'date',
        'is_active'

    ];
    protected $hidden=[];
    public $timestamps=true;


    ############## Relations ###################
    public function user(){
        return $this -> belongsTo('App\Models\User','user_id');
     }
     public function status(){
         return $this -> belongsTo('App\Models\Announcement_Status','status_id');
      }
      public function category(){
        return $this -> belongsTo('App\Models\Announcement_Category','category_id');
     }
     public function type(){
        return $this -> belongsTo('App\Models\Announcement_Type','type_id');
     }
     public function comments(){
        return $this -> hasMany('App\Models\Comment','announcement_id');
     }


     ################# Accessors #######################
     public function getDetailsAttribute($value){
         return json_decode($value);
     }

     public function getCategoryIdAttribute($value){
        if($value==1)
          return "documents";
        if($value==2)
          return "childrens";
        if($value==3)
          return "bags";
        if($value==4)
          return "electronics";
        if($value==5)
          return "others";
    }

}
