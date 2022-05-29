<?php

namespace App\Models\Scopes;

use App\Models\Scopes\searchScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;

class ContactSearchScope extends searchScope
{
    protected $searchColumns=['first_name','last_name','email','company.name'];
}


