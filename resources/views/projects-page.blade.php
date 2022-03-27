@include('header', ['options' => $options])
<section class="hero-wrap hero-wrap-2" style="background-image: url({{asset('/public/images/bg_2.jpg')}});" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text align-items-end justify-content-start">
			<div class="col-md-9 ftco-animate pb-5">
				<p class="breadcrumbs"><span class="mr-2"><a href="{{route('home')}}">Accueil <i class="fa fa-chevron-right"></i></a></span> <span>Projets <i class="fa fa-chevron-right"></i></span></p>
				<h1 class="mb-3 bread">Projets</h1>
			</div>
		</div>
	</div>
	</div>
</section>
<section class="ftco-section bg-half-light">
	<div class="container">
		<div class="row justify-content-center mb-5 pb-3">
			<div class="col-md-7 text-center heading-section ftco-animate">
				<span class="subheading">Nos industries de travail mondiales</span>
				<h2 class="mb-4">Dernier projets</h2>
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
						<span class="subheading">Projets</span>
						<h3>{{$project->title}}</h3>
						<p><span class="fa fa-map-marker mr-1"></span> {{$project->address}}</p>
					</div>
				</div>
			</div>
			@endforeach
			<div class="d-flex justify-content-center text-center w-100">
				{!! $projects->links() !!}
			</div>
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
@include('footer', ['options' => $options])
