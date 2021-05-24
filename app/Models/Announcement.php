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

    // public function getStatusIdAttribute($value){
    //     if($value==1)
    //       return "pinding";
    //     if($value==2)
    //       return "active";
    //     if($value==3)
    //       return "rejected";
    //     if($value==4)
    //       return "accepted";
    //     if($value==5)
    //       return "deliverd";
    //     if($value==6)
    //      return "disabled";
    // }

    //   public function getTypeIdAttribute($value){
    //     if($value==1)
    //       return "lost";
    //     if($value==2)
    //       return "found";
    //     if($value==3)
    //       return "requst";
    // }

    ##############  Moutetors ####################
    // public function setDetailsAttribute($value)
    // {
    //     $this->attributes['details'] = json_decode($value);

    // }

    // public function setCategoryIdAttribute($value)
    // {
    // if($value=="documents")
    //     $this->attributes['category_id'] =1;
    //   if($value=="childrens")
    //     $this->attributes['category_id'] =2;
    //   if($value=="bags")
    //     $this->attributes['category_id'] =3;
    //   if($value=="electronics")
    //     $this->attributes['category_id'] =4;
    //   if($value=="others")
    //     $this->attributes['category_id'] =5;
    // }

    // public function setStatusIdAttribute($value)
    // {
    // if($value=="pinding")
    //     $this->attributes['status_id'] =1;
    //   if($value=="active")
    //     $this->attributes['status_id'] =2;
    //   if($value=="rejected")
    //     $this->attributes['status_id'] =3;
    //   if($value=="accepted")
    //     $this->attributes['status_id'] =4;
    //   if($value=="delivered")
    //     $this->attributes['status_id'] =5;
    // if($value=="disabled")
    //     $this->attributes['status_id'] =6;
    // }

    // public function setTypeIdAttribute($value)
    // {
    // if($value=="lost")
    //     $this->attributes['type_id'] =1;
    //   if($value=="found")
    //     $this->attributes['type_id'] =2;
    //   if($value=="request")
    //     $this->attributes['type_id'] =3;
    // }

}
