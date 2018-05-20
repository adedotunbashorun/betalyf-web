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
                <button class="btn btn-info m-b-10 m-l-5 pull pull-right" data-toggle="modal" data-target="#new-role" title="Add"><i class="i"></i> Add role</button>
                </h4>
                <div class="table-responsive m-t-40">
                    @if(count($roles) < 1)
                        <div class="danger-alert">
                            <i class="fa fa-warning"></i> <em>There are no role available currently. Click on the button above to add role.</em>
                        </div>
                    @else 
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered roles" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th>Permissions</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($counter=1)
                            @php($index=0)
                            @forelse($roles as $role)
                                <tr>
                                    <td>{{ $counter++}}</td>
                                    <td>{{ $role->name}} </td>
                                    <td>
                                        @foreach ($role->permissions()->pluck('name') as $permission)
                                            <span class="label label-info label-many">{{ $permission }}</span>
                                        @endforeach
                                    </td>
                                    <td>{{ $role->created_at->diffForHumans()}}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown">Action
                                                    <span class="caret"></span></button>
                                            <ul class="dropdown-menu">
                                                <input type="hidden" id="role_id{{$index}}" value="{{$role->id}}">
                                                <li><a href="javascript:;" id="edit{{$index}}"><i class="icon-note"></i>Edit</a></li>
                                                <li><a href="javascript:;" data-href="{{ URL::route('roles.destroy',$role->id)}}" id="btn_role_delete{{$index}}"><i class="fa fa-trash"></i>Delete</a></li>
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
    @include('admin.roles.modals._new_roles')
    @include('admin.roles.modals._edit_roles')
@endsection
@endsection
@section('extra_script')
    <script>
        var TOKEN = "{{csrf_token()}}";
        var UPDATE_URL = "{{URL::route('roles.update')}}";
        var GET_EDIT_INFO = "{{URL::route('roles.editInfo')}}";
        var ADD_ROLE = "{{URL::route('roles.store')}}";
    </script>
    <script src="{{ asset('js/pages/role.js') }}" type="text/javascript"></script>
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
