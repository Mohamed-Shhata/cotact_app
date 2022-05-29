<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

use App\Models\Contact;
class FilterScope implements Scope
{
    
    public $filterColumns=[];
    // protected $filterColumns=['company_id'];
    public function apply(Builder $builder, Model $model)
    {   

        $columns = $model->filterColumns ?? $this->filterColumns;
       
        foreach( $columns as $column){
            
            if($value=request($column)){
                
                $builder->where($column, $value);
            }
            

            // $builder->where('company_id', request('company_id'));
        }

    }}
