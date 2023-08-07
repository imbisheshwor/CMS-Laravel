<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Entity;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CustomPostType extends Model
{
    use HasFactory;

    protected $fillable =  [
        'name',
        'slug',
    ];

    public function entities() : HasMany
    {
        return $this->hasMany(Entity::class,'custom_post_type_id','id');//,'custom_post_type_id','id');
    }
}
