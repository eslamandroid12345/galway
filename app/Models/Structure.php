<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Structure extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;
    public function getDataAttribute (){
            $locale=app()->getLocale();
            return json_decode($this->content)?->$locale;
    }
}
