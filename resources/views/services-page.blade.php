@include('header', ['options' => $options])
<section class="hero-wrap hero-wrap-2" style="background-image: url({{asset('images/bg_2.jpg')}});" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-end justify-content-start">
      <div class="col-md-9 ftco-animate pb-5">
       <p class="breadcrumbs"><span class="mr-2"><a href="{{route('home')}}">Accueil <i class="fa fa-chevron-right"></i></a></span> <span>Services <i class="fa fa-chevron-right"></i></span></p>
       <h1 class="mb-3 bread">Services</h1>
     </div>
   </div>
 </div>
</section>
<section class="ftco-section bg-half-light">
	<div class="container">
		<div class="row justify-content-center mb-5 pb-2">
			<div class="col-md-8 text-center heading-section ftco-animate">
				<span class="subheading"> Nos services</span>
				<h2 class="mb-4">Nous offrons des services</h2>
			</div>
		</div>
		<div class="row">
			@foreach($services as $service)
			<div class="col-md-4">
				<div class="services-wrap ftco-animate">
					<div class="img" style="background-image: url({{URL::asset($service->image)}});"></div>
					<div class="text">
						<div class="icon"><span class="flaticon-architect"></span></div>
						<h2>{{$service->title}}</h2>
						<span>{!! Str::limit($service->description) !!}</span>
						<a href="{{route('service', ['id' => $service->ID])}}" class="btn-custom">Savoir+</a>
					</div>
				</div>
			</div>
			@endforeach
			<div class="d-flex justify-content-center text-center w-100">
				{!! $services->links() !!}
			</div>
		</div>
	</div>
</section>
@include('footer', ['options' => $options])
