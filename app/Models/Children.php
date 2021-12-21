<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Children extends Model
{
    //
    protected $table = 'children';
    protected $cast = [
        'child_id' => 'array',
    ];
}
