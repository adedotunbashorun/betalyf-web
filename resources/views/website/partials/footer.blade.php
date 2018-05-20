
			<div id="footer" style="padding: 20px;">
				<center><p>&copy;Betalyf 2018. All Rights Reserved.</p></center>
			</div>
		</div>
	</body>
	<script src="{{ asset('bootstrap/js/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
    <script>
    	$(document).ready(function() {
    		$("#arrow").click(function() {
			    $('html, body').animate({
			        scrollTop: $("#about").offset().top
			    }, 3000);
			});
    	});
    </script>
    @yield('javascript')
</html>