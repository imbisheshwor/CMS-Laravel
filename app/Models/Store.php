<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
Use App\Models\Entity;

class Store extends Model
{
    use HasFactory;
    protected $fillable = [
        'key',
        'value',
        'custom_post_type_id',
        'entity_id',
    ];

    public function entity()
    {
        return $this->hasOne(Entity::class,'id','entity_id');
    }
}
