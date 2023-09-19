<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function getDOBAttribute($value)
    {
        return date("d-m-Y", strtotime($value));
    }
}
