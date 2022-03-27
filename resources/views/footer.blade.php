<footer class="ftco-footer">
	<div class="container mb-5 pb-4">
		<div class="row">
			<div class="col-lg col-md-6">
				<div class="ftco-footer-widget">
					<h2 class="ftco-heading-2 d-flex align-items-center">À propos</h2>
					<p>{{@$options['site_about']}}</p>
					<ul class="ftco-footer-social list-unstyled mt-4">
						<li><a href="{{@$options['site_twitter']}}"><span class="fa fa-twitter"></span></a></li>
						<li><a href="{{@$options['site_facebook']}}"><span class="fa fa-facebook"></span></a></li>
						<li><a href="{{@$options['site_instagram']}}"><span class="fa fa-instagram"></span></a></li>
					</ul>
				</div>
			</div>

			<div class="col-lg-4 col-md-6">
				<div class="ftco-footer-widget">
					<h2 class="ftco-heading-2">Liens</h2>
					<div class="d-flex">
						<ul class="list-unstyled mr-md-4">
							<li><a href="{{route('home')}}"><span class="fa fa-chevron-right mr-2"></span>Accueil</a></li>
							<li><a href="{{route('services')}}"><span class="fa fa-chevron-right mr-2"></span>Services</a></li>
							<li><a href="{{route('projects')}}"><span class="fa fa-chevron-right mr-2"></span>Projets</a></li>
						</ul>
					</div>
				</div>
			</div>

			<div class="col-lg col-md-6">
				<div class="ftco-footer-widget">
					<h2 class="ftco-heading-2">Services</h2>
					<ul class="list-unstyled">
						@foreach($services_plucked as $service)
						<li><a href="{{route('service', ['id' => $service->ID])}}"><span class="fa fa-chevron-right mr-2"></span>{{$service->title}}</a></li>
						@endforeach
					</ul>
				</div>
			</div>

			<div class="col-lg col-md-6">
				<div class="ftco-footer-widget">
					<h2 class="ftco-heading-2">Vous avez des Questions</h2>
					<div class="block-23 mb-3">
						<ul>
							<li><span class="fa fa-map-marker mr-3"></span><span class="text">{{@$options['site_address']}}</span></li>
							<li><a href="#"><span class="fa fa-phone mr-3"></span><span class="text">{{@$options['site_phone']}}</span></a></li>
							<li><a href="#"><span class="fa fa-paper-plane mr-3"></span><span class="text">{{@$options['site_email']}}</span></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid bg-primary">
		<div class="container">
			<div class="row">
				<div class="col-md-6 aside-stretch py-3">

					<p class="mb-0">
						Copyright &copy;<script>document.write(new Date().getFullYear());</script> Tous les droits sont réservés
						</p>
					</div>
				</div>
			</div>
		</div>
	</footer>

	<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close d-flex align-items-center justify-content-center" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true" class="fa fa-close"></span>
					</button>
				</div>
				<div class="modal-body p-4 p-md-5">
					<form action="{{route('demande')}}" method="POST" class="appointment-form ftco-animate">
						<h3>Demandez un devis</h3>
						<div class="">
							@csrf
							<div class="form-group">
								<input name="last_name" type="text" class="form-control" placeholder="Nom" required="required">
							</div>
							<div class="form-group">
								<input name="first_name" type="text" class="form-control" placeholder="Prénom" required="required">
							</div>
							<div class="form-group">
								<input name="phone" type="text" class="form-control" placeholder="Tél" required="required">
							</div>
						</div>
						<div class="">
							<div class="form-group">
								<div class="form-field">
									<div class="select-wrap">
										<div class="icon"><span class="fa fa-chevron-down"></span></div>
										<select name="service_id" id="" class="form-control" required="required">
											<option value="">Selectionnez un service</option>
											@foreach($services_plucked as $service)
											<option value="{{$service->ID}}">{{$service->title}}</option>
											@endforeach
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="">
							<div class="form-group">
								<textarea name="message" id="" cols="30" rows="4" class="form-control" placeholder="Message"></textarea>
							</div>
							<div class="form-group">
								<input type="submit" value="Envoyer" class="btn btn-primary py-3 px-4">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- loader -->
	<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

	<script src="{{asset('public/js/popper.min.js')}}"></script>
	<script src="{{asset('public/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('public/js/jquery.easing.1.3.js')}}"></script>
	<script src="{{asset('public/js/jquery.waypoints.min.js')}}"></script>
	<script src="{{asset('public/js/jquery.stellar.min.js')}}"></script>
	<script src="{{asset('public/js/owl.carousel.min.js')}}"></script>
	<script src="{{asset('public/js/jquery.magnific-popup.min.js')}}"></script>
	<script src="{{asset('public/js/jquery.animateNumber.min.js')}}"></script>
	<script src="{{asset('public/js/bootstrap-datepicker.js')}}"></script>
	<script src="{{asset('public/js/jquery.timepicker.min.js')}}"></script>
	<script src="{{asset('public/js/scrollax.min.js')}}"></script>

	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
	<script src="js/google-map.js"></script>

	<script src="{{asset('public/js/main.js')}}"></script>
    <script src="{{asset('public/js/lightbox-plus-jquery.min.js')}}"></script>
</body>
</html>
