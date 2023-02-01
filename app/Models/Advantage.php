<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advantage extends Model
{
    use HasFactory;
  protected $table = 'advantages';
  protected $fillable = ['advantage', 'plan_id'];

  public function plan(){
    return $this->belongsTo(Plan::class, 'plan_id', 'id');
  } 
}
