<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['title', 'group_id', 'url', 'parent_id', 'order', 'target', 'icon'];

    public function group()
    {
        return $this->belongsTo(MenuGroup::class, 'group_id');
    }    
}
