<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    //
    protected $table = 'tbl_chat';
    protected $primaryKey = 'chatId';
    const CREATED_AT = 'createdDate';
    const UPDATED_AT = 'modifiedDate';   
    protected $nullable = [
       'senderId','receiverId', 'chatImage'
    ];  
}
