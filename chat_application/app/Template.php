<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    //
     protected $table = 'tbl_templates';
    protected $primaryKey = 'tId';
    const CREATED_AT = 'createdDate';
    const UPDATED_AT = 'modifiedDate';
   
}
