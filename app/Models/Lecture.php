<?php

namespace App\Models;

use App\Http\Traits\LanguageToggle;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    use HasFactory, LanguageToggle;

    protected $guarded = [];

    public function finalUrl(): Attribute
    {
        return Attribute::make(get: function () {
            if ($this->type == 'scientific_paper' && $this->url != null)
                return url($this->url);
            return $this->url;
        });
    }


    public function children()
    {
        return $this->hasMany(Lecture::class, 'parent_id');
    }
}
