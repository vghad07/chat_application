<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Group_users extends Model
{
    //
     protected $table = 'tbl_group_user';
    protected $primaryKey = 'guId';
    const CREATED_AT = 'createdDate';
    const UPDATED_AT = 'modifiedDate';
    const ID = 'guId';
    public function isUserExists($uid,$gid){
        $gu = DB::select('select * from tbl_group_user where gId = '.$gid.' And uId = :uid', ['uid' => $uid]);
        //$gu = DB::select('SELECT gId,uId FROM tbl_group_user')->where('gId',$gid)->whereIn('uId',$uid)->toSql();
        if(count($gu)>0){
            return true;
        }
        else{
            return false;
        }
    }
}
