<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    //
    protected $table = 'tbl_groups';
    protected $primaryKey = 'gId';
    const CREATED_AT = 'createdDate';
    const UPDATED_AT = 'modifiedDate';
    const ID = 'gId';
       
}
