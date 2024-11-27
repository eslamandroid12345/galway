<?php

namespace App\Models;

use App\Http\Traits\LanguageToggle;
use App\Http\Traits\StrLimit;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Support\Str;

class CenterNew extends Model
{
    use HasFactory, LanguageToggle,StrLimit;

    protected $guarded = [];


    public function firstImage(): Attribute
    {
        return Attribute::make(get: function () {
            return $this->images()?->first()?->path;
        });
    }
    public function createdAtTime(): Attribute
    {
        return Attribute::make(get: function () {
            return Carbon::parse($this->created_at)->translatedFormat('j F Y');
        });
    }


    public function imageUrl(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->image?->path != null ? url( $this->image?->path) : null);
    }


    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }
    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

}
