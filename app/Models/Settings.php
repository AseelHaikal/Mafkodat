<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;
    protected $fillable=[
        'website_name',
        'website_logo',
        'website_favicon',
        'announcemets_expire_period',
    ];
    protected $hidden=[];
    public $timestamps=false;
}
