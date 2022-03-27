@include('header', ['options' => $options])
<section class="hero-wrap hero-wrap-2" style="background-image: url({{asset('/public/images/bg_2.jpg')}});" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text align-items-end justify-content-start">
			<div class="col-md-9 ftco-animate pb-5">
				<p class="breadcrumbs"><span class="mr-2"><a href="{{route('home')}}">Accueil <i class="fa fa-chevron-right"></i></a></span> <span>References <i class="fa fa-chevron-right"></i></span></p>
				<h1 class="mb-3 bread">References</h1>
			</div>
		</div>
	</div>
	</div>
</section>
<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center mb-5 pb-3">
			<div class="col-md-7 text-center heading-section ftco-animate">
				<span class="subheading">Nos références</span>
				<h2 class="mb-4">Dernières références</h2>
			</div>
		</div>
		<div class="row">
			        @foreach($references as $reference)
                    <div class="col-lg-3">
                        <span>
                            <img style="height: 70% !important" class="w-100 h-50 shadow p-1 mb-1 bg-body rounded" src="{{ URL::asset($reference->image) }}" alt="">
                        </span>
                    </div>
                    @endforeach

			<div class="d-flex justify-content-center text-center w-100">
				{{ $references->links() }}
			</div>
		</div>
	</div>
</section>
@include('footer', ['options' => $options])
