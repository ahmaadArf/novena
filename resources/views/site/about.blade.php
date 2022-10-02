@extends('site.master')
@section('title','About | '.env('APP_NAME'))
@section('content')
@include('site.page',['name'=>'About Us','content'=>'About Us'])

<section class="section about-page">
	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<h2 class="title-color">Personal care for your healthy living</h2>
			</div>
			<div class="col-lg-8">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt, quod laborum alias. Vitae dolorum, officia sit! Saepe ullam facere at, consequatur incidunt, quae esse, quis ut reprehenderit dignissimos, libero delectus.</p>
				<img src="{{ asset('siteasset/images/about/sign.png') }}" alt="" class="img-fluid">
			</div>
		</div>
	</div>
</section>

<section class="fetaure-page ">
	<div class="container">
		<div class="row">
            @foreach ($abouts as $about)
            <div class="col-lg-3 col-md-6">
				<div class="about-block-item mb-5 mb-lg-0">
					<img src="{{ asset('image/abouts/'.$about->image) }}" alt="" class="img-fluid w-100">
					<h4 class="mt-3">{{ $about->name }}</h4>
					<p>{{ $about->content }}</p>
				</div>
			</div>
            @endforeach


	</div>
</section>
<section class="section awards">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-4">
				<h2 class="title-color">Our Doctors achievements </h2>
				<div class="divider mt-4 mb-5 mb-lg-0"></div>
			</div>
			<div class="col-lg-8">
				<div class="row">
                    @foreach ($qualifications as$qualification )
                    <div class="col-lg-4 col-md-6 col-sm-6">
						<div class="award-img">
							<img src="{{ asset('image/qualifications/'.$qualification->image) }}" alt="" class="img-fluid">
						</div>
					</div>
                    @endforeach


				</div>
			</div>
		</div>
	</div>
</section>

<section class="section team">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-6">
				<div class="section-title text-center">
					<h2 class="mb-4">Meet Our Specialist</h2>
					<div class="divider mx-auto my-4"></div>
					<p>Today’s users expect effortless experiences. Don’t let essential people and processes stay stuck in the past. Speed it up, skip the hassles</p>
				</div>
			</div>
		</div>

		<div class="row">
            @foreach ($doctors as $doctor)
            <div class="col-lg-3 col-md-6 col-sm-6">
				<div class="team-block mb-5 mb-lg-0">
					<img src="{{ asset('image/doctors/'.$doctor->image) }}" alt="" class="img-fluid w-100">

					<div class="content">
						<h4 class="mt-4 mb-0"><a href="{{ route('site.doctor_single',$doctor->id) }}">{{ $doctor->name }}</a></h4>
						<p>Internist, Emergency Physician</p>
					</div>
				</div>
			</div>
            @endforeach



		</div>
	</div>
</section>

<section class="section testimonial">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 offset-lg-6">
				<div class="section-title">
					<h2 class="mb-4">What they say about us</h2>
					<div class="divider  my-4"></div>
				</div>
			</div>
		</div>
		<div class="row align-items-center">
			<div class="col-lg-6 testimonial-wrap offset-lg-6">
                @foreach ($testimonials as $testimonial)
                <div class="testimonial-block">
					<div class="client-info ">
						<h4>{{ $testimonial->smallDec }} !</h4>
						<span>{{ $testimonial->name }}</span>
					</div>
					<p>
                        {{ $testimonial->comment }}
					</p>
					<i class="icofont-quote-right"></i>

				</div>

                @endforeach

			</div>
		</div>
	</div>
</section>
@stop
