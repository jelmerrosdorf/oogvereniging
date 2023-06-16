<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsToMany(User::class, 'event_user');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'title',
        'datetime_start',
        'datetime_end',
        'location',
        'price',
        'price_member',
        'description',
        'public',
        'tag_province',
        'tag_subject'
    ];
}
