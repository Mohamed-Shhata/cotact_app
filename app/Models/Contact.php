<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name', 'last_name', 'email', 'address', 'phone', 'company_id'
    ];

    
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function scopeLatestLast($query){
        return $query->orderBy('first_name', 'asc');
    }
    public function scopeFilter($query){
        if(request()->has('company_id') && request()->input('company_id') != ''){
            $query->where('company_id', request('company_id'));
        }
        if(request()->has('search') && request()->input('search') != ''){
            $query->where('first_name', 'like', '%'.request('search').'%');
        }
        return $query;
    }
}

