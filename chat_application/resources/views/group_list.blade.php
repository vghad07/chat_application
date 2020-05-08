 @extends('layouts.admin')

 @section('content')
 
 <div class="content-header row">
     <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
         <h3 class="content-header-title mb-0 d-inline-block">Manage Groups</h3>
         <div class="row breadcrumbs-top d-inline-block">
             <div class="breadcrumb-wrapper col-12">
                 <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a>
                     </li>
                     <li class="breadcrumb-item"><a href="#">Groups</a>
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
                             <h4 class="card-title">All Group Users</h4>
                             <a class="heading-elements-toggle"><i class="ft-ellipsis-h font-medium-3"></i></a>
                             <div class="heading-elements">

                                 <a class="btn btn-primary btn-sm" href="{{url('group/create') }}"><i class="ft-plus white"></i> Add Group</a>
                                  <a class="btn btn-primary btn-sm" href="{{url('group/usergroup') }}"><i class="ft-plus white"></i> Assign Group</a>
                                 

                             </div>
                         </div>
                     </div>
                     <div class="card-content">
                         <div class="card-body">
                             <!-- Task List table -->
                             <div class="table-responsive">
                                 <table id="users-contacts" class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle">
                                     <thead class="thead-dark">
                                         <tr>
                                             <th></th>
                                             <th>Group Name</th>
                                             <th>Group Description</th>
                                             <th>Group Image</th>
                                             <th>Actions</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         @if(count($groups)>0)
                                         @foreach($groups as $group)
                                         <tr>
                                             <td><input type="checkbox" class="input-chk"></td>
                                             <td>
                                                 <div class="media">
                                                     <div class="media-left pr-1"><span class="avatar avatar-sm avatar-online rounded-circle">@if($group->gImage)<img src="{{ asset('images')}}/{{$group->gImage}}" >@endif<i></i></span></div>
                                                     <div class="media-body media-middle">
                                                         <a href="#" class="media-heading">{{$group->gName}}</a>
                                                     </div>
                                                 </div>
                                             </td>
                                             <td class="text-center">
                                                 <a href="#">{{$group->gDescription}}</a>
                                             </td>
                                             <td class="text-center">

                                                 <img style="width:50%" src="{{asset('images')}}/{{$group->gImage}}" >

                                             </td>

                                             <td>
                                                 <span class="dropdown">
                                                     <button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-primary dropdown-toggle dropdown-menu-right"><i class="ft-settings"></i></button>
                                                     <span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">
                                                         <a href="{{url('/group/group_list/edit')}}/{{$group->gId}}" class="dropdown-item"><i class="ft-edit-2"></i> Edit</a>
                                                         <a href="{{ url('/group/group_list/delete') }}/{{$group->gId}}" class="dropdown-item"><i class="ft-trash-2"></i> Delete</a>

                                                     </span>
                                                 </span>
                                             </td>
                                         </tr>
                                         @endforeach
                                         @endif
                                     </tbody>
                                     
                                 </table>
                                 {{$groups->links()}}
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </section>
     </div>
 </div>

 @endsection
