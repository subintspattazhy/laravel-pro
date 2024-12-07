<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Students extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'father_name',
        'mother_name',
        'district',
        'place',
        'abroad_place',
        'dob',
        'join_date',
        'current_class_room_id',
        'teacher_id',
        'phone',
        'whatsapp',
        'active',
    ];

    protected $dates = ['deteled_at'];

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function classRoom()
    {
        return $this->belongsTo(ClassRoom::class, 'current_class_room_id');
    }
}
