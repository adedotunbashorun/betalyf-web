@extends('admin.partials.app')
@section('title',$page_name)
@section('extra_style')
@endsection

@section('content')
    <div class="row">
        @include('admin.disputes.cards')
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ $page_name }}                
                    <button class="btn btn-info m-b-10 m-l-5 pull pull-right" data-toggle="modal" data-target="#new-dispute" title="Add"><i class="i"></i> Report Outbreak</button>
                    </h4>
                    {{-- <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6> --}}
                    <div class="table-responsive m-t-40">
                        @if(count($disputes) < 1)
                            <div class="danger-alert">
                                <i class="fa fa-warning"></i> <em>There are no outbreak report available currently. Click on the button above to report an outbreak.</em>
                            </div>
                        @else 
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered beneficiary" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Member</th>
                                    <th>Title</th>
                                    <th>Message</th>
                                    <th>Status</th>
                                    <th>Created</th>
                                    <th>Last Updated</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($index=0)
                                @foreach($disputes as $dispute)
                                    <tr>
                                        <td></td>
                                        <td>{{ $dispute->user->Profile->name }}</td>
                                        <td>{{ $dispute->title }}</td>
                                        <td>{{ strip_tags(word_counter($dispute->message, 8,'...')) }}</td>
                                        <td><span class="badge badge-{{ dispute_status($dispute->status,'class') }}">{{ dispute_status($dispute->status,'name') }}</span></td>
                                        <td>{{ $dispute->created_at }}</td>
                                        <td>{{ $dispute->updated_at }}</td>
                                        <td><a href="{{ URL::route('viewDispute', $dispute->slug) }}"><i class="icon-note"></i> View </a></td>
                                    </tr>
                                @php($index++)
                                @endforeach
                            </tbody>
                        </table>
                        @endif                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('modals')
    @include('admin.disputes.modals._create_dispute')
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
    <script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script> 
    <script>
        tinymce.init({
            selector: '#editor1',
            height: 300,
            theme: 'modern',
            plugins: 'print preview fullpage searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount spellchecker imagetools contextmenu colorpicker textpattern help',
            toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
            image_advtab: true,
            templates: [
              { title: 'Test template 1', content: 'Test 1' },
              { title: 'Test template 2', content: 'Test 2' }
            ],
            content_css: [
              '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
              '//www.tinymce.com/css/codepen.min.css'
            ]
        });
    </script>
    <script>
        var SEND = "{{ URL::route('disputeAdd') }}";
        var TOKEN = "{{ csrf_token() }}";
        var GET_DETAILS = "{{ URL::route('getDispute') }}";
    </script>
    <script src="{{ asset('js/pages/disputes.js') }}"></script>
@endsection
