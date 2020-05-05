 @extends('layouts.admin')

 @section('content')
 
 <div class="content-header row">
     <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
         <h3 class="content-header-title mb-0 d-inline-block">Manage Template</h3>
         <div class="row breadcrumbs-top d-inline-block">
             <div class="breadcrumb-wrapper col-12">
                 <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="#">Home</a>
                     </li>
                     <li class="breadcrumb-item"><a href="#">Templates</a>
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

                                 <a class="btn btn-primary btn-sm" href="{{url('template/create') }}"><i class="ft-plus white"></i> Add Template</a>
                                  <a class="btn btn-primary btn-sm" href="{{url('template/assign') }}"><i class="ft-plus white"></i> Assign Template</a>
                             </div>
                         </div>
                     </div>
                     <div class="card-content">
                         <div class="card-body">
                             <!-- Task List table -->
                             <div class="table-responsive">
                                 <table id="users-contacts"  class="table table-white-space  ">
                                     <thead>
                                         <tr>
                                             <th></th>
                                             <th>Template</th>
                                             <th> Description</th>
                                             <th>Template Image</th>
                                             <th>Actions</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         @if(count($templates)>0)
                                         @foreach($templates as $temp)
                                         <tr>
                                             <td><input type="checkbox" class="input-chk"></td>
                                             <td>
                                                 <div class="media">
                                                     <div class="media-left pr-1"></div>
                                                     <div class="media-body media-middle">
                                                         <a href="#" class="media-heading">{{$temp->tName}}</a>
                                                     </div>
                                                 </div>
                                             </td>
                                             <td class="text-center">
                                                 <a href="#">{{$temp->tDescription}}</a>
                                             </td>
                                             <td class="text-center">

                                                 <img style="width:50%" src="{{asset('images/template')}}/{{$temp->tImage}}" >

                                             </td>

                                             <td>
                                                 <span class="dropdown">
                                                     <button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-primary dropdown-toggle dropdown-menu-right"><i class="ft-settings"></i></button>
                                                     <span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">
                                                         <a href="{{url('/template/template_list/edit')}}/{{$temp->tId}}" class="dropdown-item"><i class="ft-edit-2"></i> Edit</a>
                                                         <a href="{{ url('/template/template_list/delete') }}/{{$temp->tId}}" class="dropdown-item"><i class="ft-trash-2"></i> Delete</a>
                                                         <a href="{{ url('/template/template_list/activate') }}/{{$temp->tId}}" class="dropdown-item"><i class="ft-trash-2"></i> Activate</a>
                                                         <a href="{{ url('/template/template_list/deactivate') }}/{{$temp->tId}}" class="dropdown-item"><i class="ft-trash-2"></i> Deactivate</a>
                                                     </span>
                                                 </span>
                                             </td>
                                         </tr>
                                         @endforeach
                                         @endif
                                     </tbody>
                                    
                                 </table>
                                
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </section>
     </div>
 </div>

 @endsection
