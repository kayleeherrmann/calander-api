<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $hidden = ['created_at', 'updated_at', 'user_id'];
    protected $fillable = ['label', 'color', 'user_id'];

    public function calendarEntries()
    {
        return $this->hasMany(CalendarEntry::class);
    }
}
