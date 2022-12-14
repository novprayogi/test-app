<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $table = 'members';
    public $incrementing = false;
    protected $fillable = [
        'id',
        'group_id',
        'nama',
        'alamat',
        'hp',
        'email',
        'profile',
    ];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
