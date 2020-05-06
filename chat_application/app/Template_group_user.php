<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Template_group_user extends Model
{
    //
     protected $table = 'tbl_temp_group_user';
    protected $primaryKey = 'tguId';
    const CREATED_AT = 'createdDate';
    const UPDATED_AT = 'modifiedDate';
    const ID = 'tguId';
}
