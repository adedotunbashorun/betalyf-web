@extends('user.partials.app')
@section('title',$page_name)
@section('extra_style')
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ $page_name }}        
                </h4>
                {{-- <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6> --}}
                <div class="table-responsive m-t-40">
                    @if(count($activitylogs) < 1)
                        <div class="danger-alert">
                            <i class="fa fa-warning"></i> <em>There are no logs available currently.</em>
                        </div>
                    @else 
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered beneficiary" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($counter=1)
                                @forelse($activitylogs as $log)
                                    <tr>
                                        <td>{{ $counter++}}</td>
                                        <td>{{ $log->User->name}} </td>                                                    
                                        <td>{{ $log->action}}</td>
                                        <td>{{ $log->created_at->diffForHumans()}}</td>
                                    </tr>
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
@endsection
@section('extra_script')    
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
@section('after_script')
@endsection
