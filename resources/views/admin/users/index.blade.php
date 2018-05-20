@extends('admin.partials.app')
@section('title',$page_name)
@section('extra_styles')
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ $page_name }}               
                <button class="btn btn-info m-b-10 m-l-5 pull pull-right" data-toggle="modal" data-target="#new-user" title="Add"><i class="i"></i> Add user</button>
                </h4>
                <div class="table-responsive m-t-40">
                    @if(count($users) < 1)
                        <div class="danger-alert">
                            <i class="fa fa-warning"></i> <em>There are no user available currently. Click on the button above to add user.</em>
                        </div>
                    @else 
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered users" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Telephone</th>
                                <th>Status</th>
                                <th>Roles</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($counter=1)
                            @php($index=0)
                            @forelse($users as $user)
                                <tr>
                                    <td>{{ $counter++}}</td>
                                    <td>{{ $user->name}} </td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->profile->telephone }}</td>
                                    <td>
                                        <span class="badge badge-{{ member_status($user->is_active,'class') }}">{{ member_status($user->is_active,'name') }}</span>
                                    </td>
                                    <td>
                                        @foreach ($user->roles()->pluck('name') as $role)
                                            <span class="label label-info label-many">{{ $role }}</span>
                                        @endforeach
                                    </td>
                                    <td>{{ $user->created_at->diffForHumans()}}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown">Action
                                                    <span class="caret"></span></button>
                                            <ul class="dropdown-menu">
                                                <input type="hidden" id="user_id{{$index}}" value="{{$user->id}}">
                                                <li><a href="javascript:;" id="edit{{$index}}"><i class="icon-note"></i>Edit</a></li>
                                                @if($user->is_active == 0)
                                                    <li>
                                                        <a href="javascript:;" data-href="{{ URL::route('users.activate',$user->slug) }}" id="activate{{$index}}"><i class="icon-note"></i>Activate</a>
                                                    </li>
                                                @else
                                                    <li>
                                                        <a href="javascript:;" data-href="{{ URL::route('users.activate',$user->slug) }}" id="deactivate{{$index}}"><i class="icon-note"></i>De-Activate</a>
                                                    </li>
                                                @endif
                                                <li><a href="javascript:;" data-href="{{ URL::route('users.destroy',$user->id)}}" id="btn_user_delete{{$index}}"><i class="fa fa-trash"></i>Delete</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                @php($index++)
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@section('modals')
    @include('admin.users.modals._new_users')
    @include('admin.users.modals._edit_users')
@endsection
@endsection
@section('extra_script')
    <script>
        var TOKEN = "{{csrf_token()}}";
        var UPDATE_URL = "{{URL::route('users.update')}}";
        var GET_EDIT_INFO = "{{URL::route('users.editInfo')}}";
        var REGISTER_URL = "{{URL::route('users.store')}}";
        var RESET = "{{URL::route('reset.store')}}";
    </script>
    <script src="{{ asset('js/pages/registration.js') }}" type="text/javascript"></script>
@endsection
@section('after_script')
    <script src="{{ asset('admin/js/lib/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('admin/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('admin/js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js') }}"></script>
    <script src="{{ asset('admin/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('admin/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js') }}"></script>
    <script src="{{ asset('admin/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('admin/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('admin/js/lib/datatables/datatables-init.js') }}"></script>
@endsection
