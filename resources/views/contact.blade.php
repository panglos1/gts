@include('header', ['options' => @$options])
<section class="hero-wrap js-fullheight" style="background-image: url({{asset('/public/images/bg_1.jpg')}});" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text js-fullheight align-items-center" data-scrollax-parent="true">
			<div class="col-lg-6 ftco-animate">
				<div class="mt-5">
					<h1 class="mb-4" style="max-width: 300px;">{{@$options['site_header']}}</h1>
					<p><a href="{{route('services')}}" class="btn btn-primary">Nos Services</a> <a href="#" class="btn btn-white" data-toggle="modal" data-target="#exampleModalCenter">Demandez un devis</a></p>
				</div>
			</div>
		</div>
	</div>
</section>



	<section class="ftco-section contact-section ftco-no-pb" id="contact-section">
		<div class="container">
			<div class="row justify-content-center mb-5 pb-3">
				<div class="col-md-7 heading-section text-center ftco-animate">
					<span class="subheading">Contactez-nous</span>
				</div>
			</div>

			<div class="row block-9">
				<div class="col-md-8">
					<form action="{{ route('contact_us') }}" class="p-4 p-md-5 contact-form" method="POST">
   				        @csrf
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" class="form-control" name="name" placeholder="Votre Nom">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" class="form-control" name="email" placeholder="Votre Email">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" class="form-control" name="sujet" placeholder="Sujet">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<select name="service_id" id="" class="form-control" required="required">
										<option value="">Selectionnez un service</option>
										@foreach($services_plucked as $service)
										<option value="{{$service->ID}}">{{$service->title}}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<textarea name="message" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="submit" value="Envoyer" class="btn btn-primary py-3 px-5">
								</div>
							</div>
						</div>
					</form>

				</div>

				<div class="col-md-4 d-flex pl-md-5">
					<div class="row">
						<div class="dbox w-100 d-flex ftco-animate">
							<div class="icon d-flex align-items-center justify-content-center">
								<span class="fa fa-map-marker"></span>
							</div>
							<div class="text">
								<p><span>Address:</span> {{@$options['site_address']}}</p>
							</div>
						</div>
						@if( !@empty(@$options['site_phone']) )
						<div class="dbox w-100 d-flex ftco-animate">
							<div class="icon d-flex align-items-center justify-content-center">
								<span class="fa fa-phone"></span>
							</div>
							<div class="text">
								<p><span>Téléphone Portable:</span> <a href="tel://{{@$options['site_phone']}}">{{@$options['site_phone']}}</a></p>
							</div>
						</div>
						@endif
						@if( !@empty(@$options['site_phone_2']) )
						<div class="dbox w-100 d-flex ftco-animate">
							<div class="icon d-flex align-items-center justify-content-center">
								<span class="fa fa-phone"></span>
							</div>
							<div class="text">
								<p><span>Téléphone Helpdesk:</span> <a href="tel://{{@$options['site_phone_2']}}">{{@$options['site_phone_2']}}</a></p>
							</div>
						</div>
						@endif
						@if( !@empty(@$options['site_email']) )
						<div class="dbox w-100 d-flex ftco-animate">
							<div class="icon d-flex align-items-center justify-content-center">
								<span class="fa fa-paper-plane"></span>
							</div>
							<div class="text">
								<p><span>Mail Professionnel:</span> <a href="mailto:{{@$options['site_email']}}">{{@$options['site_email']}}</a></p>
							</div>
						</div>
						@endif
						@if( !@empty(@$options['site_email_2']) )
						<div class="dbox w-100 d-flex ftco-animate">
							<div class="icon d-flex align-items-center justify-content-center">
								<span class="fa fa-paper-plane"></span>
							</div>
							<div class="text">
								<p><span>Helpdesk Mail:</span> <a href="mailto:{{@$options['site_email_2']}}">{{@$options['site_email_2']}}</a></p>
							</div>
						</div>
						@endif
					</div>
				</div>
				<div class="col-md-12">
					<div id="map" class="map"></div>
				</div>
			</div>
		</div>
	</section>
@include('footer', ['options' => @$options])
