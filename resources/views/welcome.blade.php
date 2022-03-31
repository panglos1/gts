@include('header', ['options' => @$options])

<section class="hero-wrap js-fullheight" style="background-image: url({{asset('/images/bg_1.jpg')}});" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text js-fullheight align-items-center" data-scrollax-parent="true">
			<div class="col-lg-6 ftco-animate">
				<div class="mt-5">
					<h1 class="mb-4" style="width: 1000px;">{!! @$options['site_about'] !!}</h1>
					<p><a href="{{route('services')}}" class="btn btn-primary">Nos Services</a> <a href="#" class="btn btn-white" data-toggle="modal" data-target="#exampleModalCenter">Demandez un devis</a></p>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="ftco-section ftco-no-pt ftco-no-pb ftco-services-2">
	<div class="container">
		<div class="row no-gutters d-flex">
			<div class="col-lg-4 d-flex align-self-stretch ftco-animate">
				<div class="media block-6 services d-flex" style="width:100%">
					<div class="icon justify-content-center align-items-center d-flex"><span class="flaticon-engineer-1"></span></div>
					<div class="media-body pl-4">
						<h3 class="heading mb-3">{{@$options['site_section_head_1']}}</h3>
                        <div class="text-justify" style="word-break:break-all">
						    <p>{!! @substr(@$options['site_section_description_1'], 0, 60) !!}... <a href="#" class="d-block p-2" data-target="#siteDesc1" data-toggle="modal">Lire suite</a></p>
                        </div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 d-flex align-self-stretch ftco-animate">
				<div class="media block-6 services services-2 d-flex" style="width:100%">
					<div class="icon justify-content-center align-items-center d-flex"><span class="flaticon-worker-1"></span></div>
					<div class="media-body pl-4">
						<h3 class="heading mb-3">{{@$options['site_section_head_2']}}</h3>
                            <div class="text-justify" style="word-break:break-all">
                                <p>{!! @substr(@$options['site_section_description_2'], 0, 60) !!}... <a class="d-block p-2 text-white" href="#" data-target="#siteDesc2" data-toggle="modal">Lire suite</a></p>
                            </div>
                        </div>
				</div>
			</div>
			<div class="col-lg-4 d-flex align-self-stretch ftco-animate">
				<div class="media block-6 services d-flex" style="width:100%">
					<div class="icon justify-content-center align-items-center d-flex"><span class="flaticon-engineer"></span></div>
					<div class="media-body pl-4">
						<h3 class="heading mb-3">{{@$options['site_section_head_3']}}</h3>
                            <div class="text-justify" style="word-break:break-all">
						        <p>{!! @substr(@$options['site_section_description_3'], 0, 60) !!}... <a href="#" class="d-block p-2" data-target="#siteDesc3" data-toggle="modal">Lire suite</a></p>
                            </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@if($apropos)
<section class="ftco-section" id="about-section" style="padding-bottom: 3rem">
    <div class="container">
        <div class="row">
            <div class="col-md-12 d-block align-items-stretch">
                <img class="img-fluid embed-responsive" style="width: 90%;height:500px;margin:0 auto; background-size:contain;position: relative;" src="{{ URL::asset($apropos->image) }}" alt="">
                <div style="position:absolute;top:35%;right:40px;font-size:70px;padding:5px 3px;background-color:#fc5e28;color:#fff" class="icon d-flex align-items-center justify-content-center"><span class="flaticon-crane"></span></div>
                </div>
            </div>
            <div class="col-md-12 py-1 pl-md-5">
                <div class="row justify-content-center mb-4 pt-md-4">
                    <div class="col-md-12 heading-section ftco-animate">
                        <span class="subheading">{{$apropos->sub_title1}} </span>
                        <h2 class="mb-4">{{$apropos->title}}</h2>
                        <div class="d-flex about">
                            <h3>{{$apropos->sub_title2}}</h3>
                        </div>
                        <span class="text-justify"> {!!$apropos->description!!} </span>

                    </div>
                </div>
            </div>
        </div>
    </div>
	</section>
@endif

@if($references)
	<section class="ftco-intro" style="padding-top: 1rem">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12 text-center">
					<div class="img"  style="background-image: url(images/bg_2.jpg);">
						<div class="overlay"></div>
						<h2>Nos références</h2>
						<div class="row">
							@foreach($references as $key => $reference)
							<div class="col-md-3 col-sm-6 col-xs-12">
								<div class="services-wrap">
									<img src='{{URL::asset($reference->image)}}' width="150" height="100">
								</div>
							</div>
							@endforeach
						</div>
						<div class="text-center">
							<a href="{{route('references')}}" class="btn-custom">Savoir+</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endif
<section class="ftco-section" style="padding-bottom: 4rem">
	<div class="container">
		@if(session()->has('success'))
			<div class="alert alert-success">Le message a été envoyes avec succès</div>
		@endif
		@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
		<div class="row justify-content-center mb-5 pb-3">
			<div class="col-md-7 text-center heading-section ftco-animate">
				<span class="subheading">NOS GLOBALES INSTALLATIONS </span>
				<h2 class="mb-4">Nos Derniers Projets</h2>
			</div>
		</div>
		<div class="row">
			@foreach($projects as $project)
			<div class="col-md-4">
				<div class="project">
                    @php $images = ""; $img1 = ""; @endphp
					@foreach($project->images as $key => $img)
                        @php $images .= URL::asset($img) . '&&' @endphp
                        @if($key == 0)
                            @php $img1 = $img; @endphp
                        @endif
					@endforeach
                    <div class="img d-flex align-items-center" data-toggle="modal" data-target="#exampleModal" data-whatever="{{$images}}" style=" cursor:pointer; background-image: url({{URL::asset($img1)}});">
                        <div class="icon d-flex align-items-center justify-content-center mb-5"><span class="fa fa-plus"></span></div>
                    </div>
					<div class="text">
						<span class="subheading">Projet</span>
						<h3>{{$project->title}}</h3>
						<p><span class="fa fa-map-marker mr-1"></span> {{$project->address}}</p>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #000000;font-size: 30px;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="background-color: #999999;"></div>
        </div>
    </div>
</div>

<section class="ftco-section bg-half-light" style="padding-top: 1rem">
	<div class="container">
		<div class="row justify-content-center mb-5 pb-2">
			<div class="col-md-8 text-center heading-section ftco-animate">
				<span class="subheading">Nos Services</span>
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
						<p>{!! Str::limit($service->description, 60) !!}</p>
						<a href="{{route('service', ['id' => $service->ID])}}" class="btn-custom">Savoir+</a>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>

<section class="ftco-section ftco-no-pt ftco-no-pb testimony-section img">
		<div class="overlay"></div>
		<div class="container">
			<div class="row ftco-animate justify-content-center">
				<div class="col-md-6 p-4 pl-md-0 py-md-5 pr-md-5 aside-stretch d-flex align-items-center">
					<div class="heading-section heading-section-white">
						<span class="subheading" style="color:#fff;">LIRE LES TÉMOIGNAGES</span>
						<h2 class="mb-4" style="font-size: 50px;">
C'est toujours une joie d'entendre que le travail que nous faisons a des critiques positives</h2>
					</div>
				</div>
				<div class="col-md-6 pl-md-5 py-4 py-md-5 aside-stretch-right">
					<div class="carousel-testimony owl-carousel ftco-owl">
					@foreach($temoignages as $temoignage)
						<div class="item">
							<div class="testimony-wrap py-4 pb-5 d-flex justify-content-between align-items-end">
								<div class="user-img" style="background-image: url({{URL::asset($temoignage->image)}})">
									<span class="quote d-flex align-items-center justify-content-center">
										<i class="fa fa-quote-left"></i>
									</span>
								</div>
								<div class="text">
									<p class="mb-4">{{$temoignage->content}}</p>
									<p class="name">{{$temoignage->nom}}</p>
									<span class="position">{{$temoignage->fonction}}</span>
								</div>
							</div>
						</div>
					@endforeach
					</div>
				</div>
			</div>
		</div>
	</section>
<section class="ftco-section bg-light">
	<div class="container">
		<div class="row d-flex">
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
		</div>
	</div>
</section>
<div class="modal fade" id="siteDesc1" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="siteDesc1" aria-hidden="true">
  <div class="modal-dialog">
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		  <span aria-hidden="true" style="font-size: 30px;color: #fbfbfb; background-color: red;padding: 2px 12px;">&times;</span>
		</button>
	  </div>
	  <div class="modal-body text-justify mt-4" style="word-break:break-all">
	  	{!! @$options['site_section_description_1'] !!}
	  </div>
	</div>
  </div>
</div>
<div class="modal fade" id="siteDesc2" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="siteDesc2" aria-hidden="true">
  <div class="modal-dialog">
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		  <span aria-hidden="true" style="font-size: 30px;color: #fbfbfb; background-color: red;padding: 2px 12px;">&times;</span>
		</button>
	  </div>
	  <div class="modal-body text-justify mt-4" style="word-break:break-all;">
	  	{!! @$options['site_section_description_2'] !!}
	  </div>
	</div>
  </div>
</div>
<div class="modal fade" id="siteDesc3" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="siteDesc3" aria-hidden="true">
  <div class="modal-dialog">
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		  <span aria-hidden="true" style="font-size: 30px;color: #fbfbfb; background-color: red;padding: 2px 12px;">&times;</span>
		</button>
	  </div>
	  <div class="modal-body text-justify mt-4" style="word-break:break-all">
	  	{!! @$options['site_section_description_3'] !!}
	  </div>
	</div>
  </div>
</div>
<script>
    $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var recipient = button.data('whatever')
        var modal = $(this)
        modal.find('.modal-body').empty();
        images = recipient.split('&&');
        for(var i=0;i<images.length;i++){
            if(images[i] != "") {
                var img = document.createElement('img');
                img.src = images[i];
                img.width = "80";
                img.height = "80";
                img.style.padding = "0 0px 5px 5px";
                img.style.float = "left";
                img.style.cursor = "pointer";
                var a = document.createElement('a');
                a.href = images[i];
                a.setAttribute('data-lightbox', 0);
                a.append(img);
                modal.find('.modal-body').append(a);
            }
        }
    })
</script>
@include('footer', ['options' => @$options])
