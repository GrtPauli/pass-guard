<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Password extends Model
{
    use HasFactory;

    protected $fillable = [
        'platform_name',
        'platform_url',
        'platform_password',
        'user_id'
    ];

    // Relationship to user
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
