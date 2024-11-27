<?php

namespace App\Models;

use App\Http\Traits\LanguageToggle;
use App\Http\Traits\StrLimit;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class CenterPublication extends Model
{
    use HasFactory,LanguageToggle,StrLimit;
    protected $guarded=[];
    public function finalUrl(): Attribute
    {
        return Attribute::make(get: function () {
            if ($this->view_link != null)
                return url($this->view_link);
            return null;
        });
    }
    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }
    public function imageUrl(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->image?->path != null ? url($this->image?->path) : null);
    }

}
