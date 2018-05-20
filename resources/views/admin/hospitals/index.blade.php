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
                <button class="btn btn-info m-b-10 m-l-5 pull pull-right" data-toggle="modal" data-target="#new-hospital" title="Add"><i class="i"></i> Add Hospital</button>
                </h4>
                <div class="table-responsive m-t-40">
                    @if(count($hospitals) < 1)
                        <div class="danger-alert">
                            <i class="fa fa-warning"></i> <em>There are no hospital available currently. Click on the button above to add hospital.</em>
                        </div>
                    @else 
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered hospital" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Hospital Category</th>
                                <th>Hospital Name</th>
                                <th>email</th>
                                <th>Telephone</th>
                                <th>State</th>
                                <th>Local Govt</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($counter=1)
                            @php($index=0)
                            @forelse($hospitals as $hospital)
                                <tr>
                                    <td>{{ $counter++}}</td>
                                    <td>{{ $hospital->Category->name}} </td>
                                    <td>{{ $hospital->HospitalProfile->name }}</td>
                                    <td>{{ $hospital->HospitalProfile->email }}</td>
                                    <td>{{ $hospital->HospitalProfile->phone }}</td>
                                    <td>{{ $hospital->State->name }}</td>                                  
                                    <td>{{ $hospital->Local->local_name }}</td>
                                    <td>{{ $hospital->created_at->diffForHumans()}}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown">Action
                                                    <span class="caret"></span></button>
                                            <ul class="dropdown-menu">
                                                <input type="hidden" id="hospital_id{{$index}}" value="{{$hospital->id}}">
                                                <li><a href="javascript:;" id="edit{{$index}}"><i class="icon-note"></i>Edit</a></li>
                                                <li><a href="javascript:;" data-href="{{ URL::route('hospitals.destroy',$hospital->id)}}" id="btn_hospital_delete{{$index}}"><i class="fa fa-trash"></i>Delete</a></li>
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
    @include('admin.hospitals.modals._new_hospital')
    @include('admin.hospitals.modals._edit_hospital')
@endsection
@endsection
@section('extra_script')
    <script>
        var TOKEN = "{{csrf_token()}}";
        var UPDATE_URL = "{{URL::route('hospitals.update')}}";
        var GET_EDIT_INFO = "{{URL::route('hospitals.editInfo')}}";
        var ADD_HOSPITAL = "{{URL::route('hospitals.store')}}";
        var LOCAL_GOVT = "{{ URL::route('hospitals.locals') }}";
    </script>
    <script src="{{ asset('js/pages/hospitals.js') }}" type="text/javascript"></script>
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
