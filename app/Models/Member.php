<?php

namespace App\Models;

use App\Http\Traits\LanguageToggle;
use App\Http\Traits\StrLimit;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Member extends Model
{
    use HasFactory, LanguageToggle,StrLimit;

    protected $guarded = [];

    public function membership(): Attribute
    {
        return Attribute::make(get: function () {
            if (app()->getLocale() == 'en') {
                return $this->about?->t('title') . ' member';
            } else {
                return 'عضو ' . $this->about?->t('title');
            }
        });
    }
    public function imageUrl(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->image?->path != null ? url($this->image?->path) : null);
    }
    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function about()
    {
        return $this->belongsTo(About::class);
    }
}
