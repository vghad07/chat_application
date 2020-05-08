 @extends('layouts.admin')

 @section('content')
 
 <div class="content-header row">
     <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
         <h3 class="content-header-title mb-0 d-inline-block">Manage Users</h3>
         <div class="row breadcrumbs-top d-inline-block">
             <div class="breadcrumb-wrapper col-12">
                 <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a>
                     </li>
                     <li class="breadcrumb-item"><a href="{{url('users/user_list')}}">Users</a>
                     </li>

                 </ol>
             </div>
         </div>
     </div>

 </div>
 <div class="content-detached">
     <div class="content-body">
         <section class="row">
             <div class="col-12">
                 <div class="card">
                     <div class="card-head">
                         <div class="card-header">
                             <h4 class="card-title">All Users</h4>
                             <a class="heading-elements-toggle"><i class="ft-ellipsis-h font-medium-3"></i></a>
                             <div class="heading-elements">

                                 <a class="btn btn-primary btn-sm" href="{{url('users/create') }}"><i class="ft-plus white"></i> Add User</a>
                                

                             </div>
                         </div>
                     </div>
                     <div class="card-content">
                         <div class="card-body">
                             <!-- Task List table -->
                             <div class="table-responsive">
                                 <table id="users-contacts" class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle">
                                     <thead>
                                         <tr>
                                             <th></th>
                                             <th>Name</th>
                                             <th>Email</th>
                                             <th>Actions</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         @if(count($users)>0)
                                         @foreach($users as $user)
                                         <tr>
                                             <td><input type="checkbox" class="input-chk"></td>
                                             <td>
                                                 <div class="media">
                                                     <div class="media-left pr-1"><span class="avatar avatar-sm avatar-online rounded-circle">@if($user->uImage)<img src="{{ asset('images')}}/{{$user->uImage}}">@endif<i></i></span></div>
                                                     <div class="media-body media-middle">
                                                         <a href="#" class="media-heading">{{$user->name}}</a>
                                                     </div>
                                                 </div>
                                             </td>
                                             <td class="text-center">
                                                 <a href="#">{{$user->email}}</a>
                                             </td>


                                             <td>
                                                 <span class="dropdown">
                                                     <button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-primary dropdown-toggle dropdown-menu-right"><i class="ft-settings"></i></button>
                                                     <span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">
                                                         <a href="{{url('/users/user_list')}}/{{$user->id}}/edit" class="dropdown-item"><i class="ft-edit-2"></i> Edit</a>
                                                         <a href="{{ url('/users/user_list') }}/{{$user->id}}/delete" class="dropdown-item"><i class="ft-trash-2"></i> Delete</a>
                                                         <a href="{{ url('/users/user_list') }}/{{$user->id}}/activate" class="dropdown-item"><i class="ft-plus-circle primary"></i> Activate</a>
                                                         <a href="{{ url('/users/user_list') }}/{{$user->id}}/deactivate" class="dropdown-item"><i class="ft-plus-circle info"></i> Deactivate</a>

                                                     </span>
                                                 </span>
                                             </td>
                                         </tr>
                                         @endforeach
                                         @else
                                         <div>No users are Available</div>
                                         @endif

                                     </tbody>
                                     <tfoot>
                                         <tr>
                                             <th></th>
                                             <th>Name</th>
                                             <th>Email</th>
                                             <th>Actions</th>
                                         </tr>
                                     </tfoot>
                                 </table>
                                 {{$users->links()}}
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </section>
     </div>
 </div>

 @endsection
