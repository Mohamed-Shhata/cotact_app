<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;


class searchScope implements Scope
{
    protected $searchColumns=['first_name','last_name','email'];
   
    public function apply(Builder $builder, Model $model)
    {
        
        if(request()->has('search') && request()->input('search') != ''){
            if($search=request('search')){
                $builder->where(function($query) use ($search){
                    // \dd($query);
                    foreach($this->searchColumns as $index => $column){
                        $arr = explode('.', $column);
                        // dd($arr);

                        $method =$index == 0 ? 'where' : 'orWhere';
                        // dd($index);
                        if(count($arr) == 2){
                            $method .= 'Has';
                            $query->$method($arr[0], function($q) use ($arr, $column){
                                
                                $q->where($arr[1], 'like', '%'.request('search').'%');
                            });
                        }else{
                            $query->$method($column, 'like', '%'.request('search').'%');
                        }
                    }
                });
            }
               
                    
                    // ->orWhereHas('company', function($query){
                    //     $query->where('name', 'like', '%'.request('search').'%');
                    // });                    
            
        }
        //or
        // if($search=request('search')){
        //     $builder->where(function($query) use ($search){
        //         $query->where('first_name', 'like', '%'.$search.'%')
        //             ->orWhere('last_name', 'like', '%'.$search.'%')
        //             ->orWhere('email', 'like', '%'.$search.'%')
        //             // ->orWhere('address', 'like', '%'.$search.'%')
        //             // ->orWhere('phone', 'like', '%'.$search.'%')
        //             ->orWhereHas('company', function($query) use ($search){
        //                 $query->where('name', 'like', '%'.$search.'%');
        //             });
        //     });
        // }
            
        
    }

}
