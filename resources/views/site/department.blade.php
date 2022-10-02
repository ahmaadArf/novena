@extends('site.master')
@section('title','Department | '.env('APP_NAME'))
@section('content')
@include('site.page',['name'=>'All Department','content'=>'Care Department'])


<section class="section service-2">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-7 text-center">
				<div class="section-title">
					<h2>Award winning patient care</h2>
					<div class="divider mx-auto my-4"></div>
					<p>Lets know moreel necessitatibus dolor asperiores illum possimus sint voluptates incidunt molestias nostrum laudantium. Maiores porro cumque quaerat.</p>
				</div>
			</div>
		</div>

		<div class="row">
            @foreach ($departments as $department)
            <div class="col-lg-4 col-md-6 ">
				<div class="department-block mb-5">
					<img src="{{ asset('image/departments/'.$department->image) }}" alt="" class="img-fluid w-100">
					<div class="content">
						<h4 class="mt-4 mb-2 title-color">{{$department->name  }}</h4>
						<p class="mb-4">{{ $department->content }}</p>
						<a href="{{ route('site.department_single',$department->id) }}" class="read-more">Learn More  <i class="icofont-simple-right ml-2"></i></a>
					</div>
				</div>
			</div>
            @endforeach

		</div>
	</div>
</section>


@stop
