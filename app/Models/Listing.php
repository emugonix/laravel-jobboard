<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function click(){
        return $this ->hasMany(Click::class);
    }

    public function user(){
        return $this -> belongsTo(User::class);
    }

    public function tag(){
        return $this -> belongsToMany(Tag::class);
    }
}
