<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalendarEntry extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'category_id',
        'start', //YYYY-MM-DDTHH:SS:MM
        'end',
        'user_id',

    ];

    protected $hidden = ['updated_at'];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
