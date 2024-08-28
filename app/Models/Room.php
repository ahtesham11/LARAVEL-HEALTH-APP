<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'rooms'; // Ensure this matches your table name
    protected $fillable = ['id', 'room_number','room_type','capacity'];
}
