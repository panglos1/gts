@include('header')
<section class="hero-wrap hero-wrap-2" style="background-image: url({{asset('images/bg_2.jpg')}});" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text align-items-end justify-content-start">
			<div class="col-md-9 ftco-animate pb-5">
				<p class="breadcrumbs"><span class="mr-2"><a href="{{route('home')}}">Home <i class="fa fa-chevron-right"></i></a></span> <span>Our Blog <i class="fa fa-chevron-right"></i></span></p>
				<h1 class="mb-3 bread">Our Blog</h1>
			</div>
		</div>
	</div>
	</div>
</section>
<section class="ftco-section bg-half-light">
	<div class="container">
		<div class="row justify-content-center mb-5 pb-3">
			<div class="col-md-7 text-center heading-section ftco-animate">
				<span class="subheading">Our Global Work Industries</span>
				<h2 class="mb-4">Latest Projects</h2>
			</div>
		</div>
		<div class="row">
			@foreach($posts as $post)
			<div class="col-lg-4 ftco-animate">
				<div class="blog-entry">
					<a href="#" class="block-20" style="background-image: url({{URL::asset($post->image)}});">
					</a>
					<div class="text d-block">
						<div class="meta">
							<p>
								<a href="#"><span class="fa fa-calendar mr-2"></span>{{gmdate( "D d, Y",$post->date)}}</a>
							</p>
						</div>
						<h3 class="heading"><a href="{{route('post', ['id' => $post->ID])}}">{{$post->title}}</a></h3>
						<p><a href="{{route('post', ['id' => $post->ID])}}" class="btn btn-secondary py-2 px-3">Savoir +</a></p>
					</div>
				</div>
			</div>
			@endforeach
			<div class="d-flex justify-content-center text-center w-100">
				{!! $posts->links() !!}
			</div>
		</div>
	</div>
</section>
@include('footer')