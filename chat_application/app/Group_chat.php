<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group_chat extends Model
{
    //
     protected $table = 'tbl_group_chat';
    protected $primaryKey = 'gcId';
    const CREATED_AT = 'createdDate';
    const UPDATED_AT = 'modifiedDate';
    
}
