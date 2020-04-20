 @extends('layouts.Users')

 @section('content')

 <div class="content-header row">
     <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
         <h3 class="content-header-title mb-0 d-inline-block">Create Group</h3>
         <div class="row breadcrumbs-top d-inline-block">
             <div class="breadcrumb-wrapper col-12">
                 <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="index.html">Home</a>
                     </li>
                     <li class="breadcrumb-item"><a href="#">Create Group</a>
                     </li>

                 </ol>
             </div>
         </div>
     </div>

 </div>
 <div class="content-body">
     <!-- Basic form layout section start -->
     <section id="basic-form-layouts">
         <div class="row match-height">
             <div class="col-md-2"></div>
             <div class="col-md-8">
                 <div class="card">
                     <div class="card-header">
                         <h4 class="card-title" id="basic-layout-colored-form-control">User Profile</h4>
                         <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>

                     </div>
                     <div class="card-content collapse show">



                         <div class="card-body">

                             {{ Form::open(['action' => 'GroupController@store','method'=>'POST','enctype'=>'multipart/form-data']) }}
                             <div class="form-body">
                                 <h4 class="form-section"><i class="fa fa-eye"></i> Add Group</h4>
                                 <div class="row">
                                     <div class="col-md-12">
                                         <div class="form-group">
                                             {{ Form::label('group','Group Name')}}
                                             {{ Form::text('gname','',['class'=>'form-control border-primary','placeholder'=>'Group Name'])}}
                                         </div>
                                     </div>
                                     <div class="col-md-12">
                                         <div class="form-group">
                                             {{ Form::label('gdesc','Group Description')}}
                                             {{ Form::textArea('gdescription','',['class'=>'form-control border-primary','placeholder'=>'Description'])}}
                                         </div>
                                     </div>
                                     <div class="col-md-12">
                                         <div class="form-group">
                                             {{Form::file('gimage')}}
                                         </div>
                                     </div>
                                 </div>

                                 <div class="form-actions right">
                                     <button type="button" class="btn btn-warning mr-1">
                                         <i class="ft-x"></i> Cancel
                                     </button>
                                     <button type="submit" class="btn btn-primary">
                                         <i class="fa fa-check-square-o"></i> Save
                                     </button>
                                 </div>

                                 {{ Form::close() }}


                             </div>
                         </div>
                     </div>
                 </div>
             </div>

     </section>
     <!-- // Basic form layout section end -->
 </div>


 @endsection
