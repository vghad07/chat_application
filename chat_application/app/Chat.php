<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
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
    
    
    public function Sender($sid){
        $gu = DB::select('select * from tbl_chat where senderId = '.$sid);
        //$gu = DB::select('SELECT gId,uId FROM tbl_group_user')->where('gId',$gid)->whereIn('uId',$uid)->toSql();
        if(count($gu)>0){
            return $gu;
        }
        
    }
    public function Receiver($rid){
        $gu = DB::select('select * from tbl_chat where receiverId = '.$rid);
        //$gu = DB::select('SELECT gId,uId FROM tbl_group_user')->where('gId',$gid)->whereIn('uId',$uid)->toSql();
        if(count($gu)>0){
            return $gu;
        }
        
    }
}
