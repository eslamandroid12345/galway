<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function createdAtDiff():Attribute{
        return Attribute::make(get: fn()=> Carbon::parse($this->created_at)->diffForHumans());
    }
}
