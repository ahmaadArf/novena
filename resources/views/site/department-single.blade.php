@extends('site.master')
@section('title','Department | '.env('APP_NAME'))
@section('content')
@include('site.page',['name'=>'Department Details','content'=>'Single Department'])

<section class="section department-single">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="department-img">
					<img src="{{ asset('image/departments/'.$department->image) }}" alt="" class="img-fluid">
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-8">
				<div class="department-content mt-5">
					<h3 class="text-md">{{ $department->name }}</h3>
					<div class="divider my-4"></div>
					<p class="lead">{{ $department->description }}</p>


					<h3 class="mt-5 mb-4">Services features</h3>
					<div class="divider my-4"></div>
					<ul class="list-unstyled department-service">
                        @foreach ($department->features as $feature)
						<li><i class="icofont-check mr-2"></i>{{ $feature->content }}</li>

                        @endforeach

					</ul>

					<a href="{{ route('site.appoinment') }}" class="btn btn-main-2 btn-round-full">Make an Appoinment<i class="icofont-simple-right ml-2  "></i></a>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="sidebar-widget schedule-widget mt-5">
					<h5 class="mb-4">Time Schedule</h5>

					<ul class="list-unstyled">
                  @include('site.parts.schedule')
					</ul>

					<div class="sidebar-contatct-info mt-4">
						<p class="mb-0">Need Urgent Help?</p>
						<h3>+23-4565-65768</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@stop
