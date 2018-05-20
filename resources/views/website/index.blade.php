@extends('website.partials.app')
@section('title','Welcome')
@section('extra_style')
@endsection
@section('content')

<div class="jumbotron" style="background-color: unset;margin-top: 100px;">
	<center>
		<h1>
			<span  class="typewrite" data-period="2000" data-type='[ "BetaLyf Solution", "Scaling Up Routine Immunization"]'>
				<span class="wrap"></span>
            </span>
		</h1>
		<p>Deployments you've only dreamed about. Zero downtime. Zero fuss.</p>
		<p id="arrow" style="margin-top:250px;"><a href="#about"><i class="fa fa-arrow-down"></i></a></p>
	</center>
</div>
<div class="panel panel-body" style="margin-top: 140px;" id="about">
	<div class="row">
		<div class="col-md-6" style="padding: 20px;">
			<img src="{{ asset('images/needle111.png') }}" class="img-thumbnail" />
		</div>
		{{-- <div class="col-md-6" style="color: #BFC9CA;">
			<h1 style="color: #EC7063;">ABOUT</h1>
			<p style="font-size:18px;line-height: 2;text-align:justify;color:black;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
		</div> --}}
	</div>
</div>

@endsection
@section('javascript')	
	<script type="text/javascript">
	var TxtType = function(el, toRotate, period) {
        this.toRotate = toRotate;
        this.el = el;
        this.loopNum = 0;
        this.period = parseInt(period, 10) || 2000;
        this.txt = '';
        this.tick();
        this.isDeleting = false;
    };

    TxtType.prototype.tick = function() {
        var i = this.loopNum % this.toRotate.length;
        var fullTxt = this.toRotate[i];

        if (this.isDeleting) {
        this.txt = fullTxt.substring(0, this.txt.length - 1);
        } else {
        this.txt = fullTxt.substring(0, this.txt.length + 1);
        }

        this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

        var that = this;
        var delta = 200 - Math.random() * 100;

        if (this.isDeleting) { delta /= 2; }

        if (!this.isDeleting && this.txt === fullTxt) {
        delta = this.period;
        this.isDeleting = true;
        } else if (this.isDeleting && this.txt === '') {
        this.isDeleting = false;
        this.loopNum++;
        delta = 500;
        }

        setTimeout(function() {
        that.tick();
        }, delta);
    };

    window.onload = function() {
        var elements = document.getElementsByClassName('typewrite');
        for (var i=0; i<elements.length; i++) {
            var toRotate = elements[i].getAttribute('data-type');
            var period = elements[i].getAttribute('data-period');
            if (toRotate) {
              new TxtType(elements[i], JSON.parse(toRotate), period);
            }
        }
        // INJECT CSS
        var css = document.createElement("style");
        css.type = "text/css";
        css.innerHTML = ".typewrite > .wrap { border-right: 0.04em solid}";
        document.body.appendChild(css);
    };
	</script>
	
@endsection