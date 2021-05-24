<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compliant extends Model
{
    use HasFactory;
    protected $table='compliants';
    protected $fillable=[
        'id',
        'user_id',
        'subject',
        'content',
        'status'
    ];
    protected $hidden=[];
    public $timestamps=true;


    ############## Relations ###################
    public function user(){
        return $this -> belongsTo('App\Models\User','user_id');
     }

}
