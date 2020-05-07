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

    public static function insert($request){
        if($request->hasFile('timage')){
   
            $fileNameToStore=(new self)->uploadTemplate($request->file('timage'));
           }
           $template = new Template;
           $template->tName = $request->input('tname');
           $template->tDescription = $request->input('tdescription');
           $template->tImage = $fileNameToStore;
           $template->createdBy = $request->input('created_by');
           $template->createdDate = date('Y-m-d');
           $template->modifiedDate = now();
           $template->isDelete = 0;
           $template->isActive = 1;           
           $template->save();

    }


    protected function uploadTemplate($image){
              $filenameWithExt = $image->getClientOriginalName();
   
               $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
               $extension = $image->getClientOriginalExtension();
               $fileNameToStore = $filename.'_'.time().'.'.$extension;
               $path = $image->move(public_path('images/template'),$fileNameToStore);
    
                  return $fileNameToStore;
            }
   
}
