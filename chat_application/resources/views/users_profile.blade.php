@extends('layouts.admin')

@section('content')

<div class="content-body">
     <!-- Basic form layout section start -->
     <section id="basic-form-layouts">
         <div class="row match-height">
             <div class="col-md-2"></div>
             <div class="col-md-8">
                 <div class="card">
                     <div class="card-header">
                         <h4 class="card-title" id="basic-layout-colored-form-control">Edit Profile</h4>
                         <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>

                     </div>
                     <div class="card-content collapse show">



                         <div class="card-body">
                             {{ Form::open(['action' => ['UsersController@editProfile'],'class'=>'form','method'=>'POST','enctype'=>'multipart/form-data']) }}
                             @csrf
                             <div class="form-body">
                                 <h4 class="form-section"><i class="fa fa-eye"></i>Change Profile</h4>
                                 <div class="row">
                                     <div class="col-md-12">
                                         <div class="form-group">
                                             <label for="userinput1">Display  Name</label>
                                             <input type="text" id="userinput1" class="form-control border-primary" placeholder="Name" name="name">
                                              <input type="hidden" name="uid" value="{{session('user_id')}}">
                                         </div>
                                     </div>
                                     <div class="col-md-12">
                                         <div class="form-group">
                                             <label for="userinput2">Profile Picture</label>
                                             <input type="file" id="userinput2" class="form-control border-primary"  name="uimage">
                                         </div>
                                     </div>

                                     <div class="col-md-12">
                                         <div class="form-group">
                                             <label for="userinput3">Change Password</label>
                                             <input type="password" id="userinput3" class="form-control border-primary" placeholder="Password" name="password">
                                         </div>
                                     </div>
                                     <div class="col-md-12">
                                         <div class="form-group">
                                             <label for="userinput4">Confirm password</label>
                                             <input type="password" id="userinput4" class="form-control border-primary" placeholder="Confirm Password" name="confirm_password" data-validation-matches-match="password" data-validation-matches-message="Password & Confirm Password must be the same.">
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
                                 </form>

                             </div>
                         </div>
                     </div>
                 </div>
             </div>

     </section>
     <!-- // Basic form layout section end -->
 </div>


@endsection