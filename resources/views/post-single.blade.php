@include('header', ['options' => $options])
<section class="hero-wrap hero-wrap-2" style="background-image: url({{URL::asset($post->image)}});" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text align-items-end justify-content-start">
			<div class="col-md-9 ftco-animate pb-5">
				<p class="breadcrumbs"><span class="mr-2"><a href="{{route('home')}}">Home <i class="fa fa-chevron-right"></i></a></span> <span>{{$post->title}} <i class="fa fa-chevron-right"></i></span></p>
				<h1 class="mb-3 bread">{{$post->title}}</h1>
			</div>
		</div>
	</div>
	</div>
</section>
<section class="ftco-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 ftco-animate">
      	{{$post->content}}
      </div> <!-- .col-md-8 -->
      <div class="col-lg-4 sidebar ftco-animate" style="word-wrap: break-word;">
        <div class="sidebar-box ftco-animate">
         <h3 class="heading-sidebar">Services</h3>
         <ul class="categories">
			@foreach($services as $p)
				<li><a href="{{route('service', ['id' => $p->ID])}}">{{$p->title}}</a></li>
			@endforeach
        </ul>
      </div>

      <div class="sidebar-box ftco-animate">
        <h3 class="heading-sidebar">Recent Blog</h3>
		@foreach($posts as $p)
        <div class="block-21 mb-4 d-flex">
          <a class="blog-img mr-4" style="background-image: url({{URL::asset($p->image)}});"></a>
          <div class="text">
            <h3 class="heading"><a href="{{route('post', ['id' => $p->ID])}}">{{$p->title}}</a></h3>
            <div class="meta">
              <div><a href="{{route('post', ['id' => $p->ID])}}"><span class="icon-calendar"></span> {{gmdate( "D d, Y",$p->date)}}</a></div>
            </div>
          </div>
        </div>
		@endforeach
      </div>
    </div>

  </div>
</div>
</section> <!-- .section -->
@include('footer', ['options' => $options])