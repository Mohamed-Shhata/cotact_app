<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    protected $table = 'companys';
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'address', 'website', 'user_id'
    ];
    
    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
