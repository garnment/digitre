<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WidgetModel extends Model
{
    protected $table = 'widgets';

    protected $fillable = [
        'enable'
    ];

    protected $hidden = [
        'id',
    ];

}
