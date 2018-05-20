@extends('user.partials.app')
@section('title',$page_name)
@section('extra_styles')
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
                    @if(empty($routines))
                        <div class="danger-alert">
                            <i class="fa fa-warning"></i> <em>There are no beneficiaries available currently. Click on the button above to add beneficiaries.</em>
                        </div>
                    @else 
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered beneficiary" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Child's Age </th>
                                <th>Vaccine </th>
                                <th>Disease It Protects Against</th>
                                <th>Vacination Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($counter=1)
                            @php($index=0)
                            @forelse($routines as $key => $routine)
                                <tr style="{{ ($routine->color != '') ? 'background-color:#eafaf1;' : '' }}">       
                                    <td>{{ $routine->age }}</td>
                                    <td>{{ $routine->vaccine }} </td>
                                    <td>{{ $routine->disease }}</td>
                                    <td>{{ $routine->date }}</td>
                                <tr>
                                @php($index=0)
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
    @include('user.child.modals._new_beneficiary')
    @include('user.child.modals._edit_beneficiary')
@endsection
@endsection
@section('extra_script')
    <script>
        var TOKEN = "{{csrf_token()}}";
        var UPDATE_URL = "{{URL::route('beneficiaries.update')}}";
        var GET_EDIT_INFO = "{{URL::route('beneficiaries.editInfo')}}";
        var ADD_BENEFICIARY = "{{URL::route('beneficiaries.store')}}";
        // 
    </script>
    <script src="{{ asset('js/pages/beneficiary.js') }}" type="text/javascript"></script>
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
