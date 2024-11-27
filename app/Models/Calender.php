<?php

namespace App\Models;

use App\Http\Traits\LanguageToggle;
use App\Http\Traits\StrLimit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calender extends Model
{
    use HasFactory, LanguageToggle, StrLimit;

    protected $guarded = [];
}
