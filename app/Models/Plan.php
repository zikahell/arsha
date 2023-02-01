<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    protected $table = 'plans';
    protected $fillable = ['name', 'price','duration'];

  public function advantages(){
    return $this->hasMany(Advantage::class, 'plan_id', 'id');
  } 
}
