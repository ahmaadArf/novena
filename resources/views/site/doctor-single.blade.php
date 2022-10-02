
@extends('site.master')
@section('title','Service | '.env('APP_NAME'))
@section('content')
@include('site.page',['name'=>'Doctor Details','content'=> $doctor->name  ])

<section class="section doctor-single">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-6">
				<div class="doctor-img-block">
					<img src="{{ asset('image/doctors/'.$doctor->image) }}" alt="" class="img-fluid w-100">

					<div class="info-block mt-4">
						<h4 class="mb-0">{{ $doctor->name }} </h4>
						<p>Orthopedic Surgary</p>

						<ul class="list-inline mt-4 doctor-social-links">
							<li class="list-inline-item"><a href="{{ $doctor->facebook }}"><i class="icofont-facebook"></i></a></li>
							<li class="list-inline-item"><a href="{{ $doctor->twitter}}"><i class="icofont-twitter"></i></a></li>
							<li class="list-inline-item"><a href="{{ $doctor->skype }}"><i class="icofont-skype"></i></a></li>
						</ul>
					</div>
				</div>
			</div>

			<div class="col-lg-8 col-md-6">
				<div class="doctor-details mt-4 mt-lg-0">
					<h2 class="text-md">Introducing to myself</h2>
					<div class="divider my-4"></div>
					<p>
                      {{ $doctor->description }}
                    </p>
					<a href="{{ route('site.appoinment') }}" class="btn btn-main-2 btn-round-full mt-3">Make an Appoinment<i
							class="icofont-simple-right ml-2  "></i></a>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="section doctor-qualification gray-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="section-title">
					<h3>My Educational Qualifications</h3>
					<div class="divider my-4"></div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-6 mb-4 mb-lg-0">
                @foreach ($doctor->qualifications as $qualification )
                <div class="edu-block mb-5">
					<span class="h6 text-muted">Year({{ $qualification->year }}) </span>
					<h4 class="mb-3 title-color">{{ $qualification->name }} at {{ $qualification->place }}</h4>
					<p>{{$qualification->content}}</p>
				</div>
                @endforeach
			</div>


		</div>
	</div>
</section>


<section class="section doctor-skills">
	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<h3>My skills</h3>
				<div class="divider my-4"></div>
				<p>{{ $doctor->skills }}</p>
			</div>
			<div class="col-lg-4">
				<div class="skill-list">
					<h5 class="mb-4">Expertise area</h5>
					<ul class="list-unstyled department-service">
                        @foreach ($doctor->features as $feature )
						<li><i class="icofont-check mr-2"></i>{{ $feature->content }}</li>

                        @endforeach

					</ul>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="sidebar-widget  gray-bg p-4">
					<h5 class="mb-4">Make Appoinment</h5>

					<ul class="list-unstyled lh-35">
                        @include('site.parts.schedule')
					</ul>

					<div class="sidebar-contatct-info mt-4">
						<p class="mb-0">Need Urgent Help?</p>
						<h3 class="text-color-2">+23-4565-65768</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@stop
