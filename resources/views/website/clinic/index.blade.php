@extends('website.partials.app')
@section('title',$page)
@section('extra_style')
<style>
#map{
    	height: 500px;
    	width: 100%;
    	margin: 0 auto;
    }
</style>
@endsection
@section('content')
<section id="banner">
    
    <div class="map" id="map">
    <div class="geo-location">
        <i class="fa fa-map-marker"></i>
    </div></div>
</section>
<section id="call-to-action-2">
    <div class="container">
        <div class="row">
            <div class="form-group col-md-3">
                <select class="form-control" id="state_id">
                    <option value="">-- Select State --</option>
                    @forelse($states as $state)
                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                    @empty
                    @endforelse
                </select>                                
            </div>
            <div id="locals" class="col-md-3">
                    
            </div>
        </div>
    </div>
</section>
<section id="content">
    <section class="section-padding">
        <div class="container">
            <div class="row showcase-section">
                <div class="col-md-6">
                    <img src="{{ asset('web/img/works/9.jpg')}}" alt="showcase image">
                </div>
                <div class="col-md-6">
                    <div class="about-text">
                        <h3>Lorem Ipsum Dolor sit</h3>
                        <p>Sed ut perspiciaatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Vivamus
                            suscipit tortor eget felis porttitor volutpat. Cras ultricies ligula sed magna dictum porta. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar.</p>
                        <p>Sed ut perspiciaatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo..</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container">

        <div class="about">
        </div>

    </div>
</section>

@endsection
@section('javascript')	
	<script type="text/javascript">
		var TOKEN = "{{csrf_token()}}";
		var MAPLOCATION = "{{URL::route('map')}}";
        var LOCAL_GOVT = "{{ URL::route('clinic.locals') }}";
	</script>
    <script src="{{ asset('js/map.js')}}"></script>
        <script async="" defer="" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCBc4iJrpRfuQtM1ueLl4V1Us5WCpCNVcc&libraries=places"></script>
        
        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
	
@endsection