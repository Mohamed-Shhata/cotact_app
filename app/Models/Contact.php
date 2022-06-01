<?php

namespace App\Models;


use App\Models\User;
use App\Models\Scopes\FilterScope;
use App\Models\Scopes\searchScope;
use Illuminate\Database\Eloquent\Model;
use App\Models\Scopes\ContactSearchScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name', 'last_name', 'email', 'address', 'phone', 'company_id', 'user_id'
    ];
    public $filterColumns=['company_id'];

    
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function scopeLatestLast($query){
        return $query->orderBy('first_name', 'asc');
    }
    protected static function booted(){
        static::addGlobalScope(new FilterScope);
        // static::addGlobalScope(new searchScope);
        static::addGlobalScope(new ContactSearchScope);

    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}

