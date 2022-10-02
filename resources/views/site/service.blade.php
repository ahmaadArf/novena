@extends('site.master')
@section('title','Service | '.env('APP_NAME'))
@section('content')
@include('site.page',['name'=>'Our services','content'=>'What We Do'])


<section class="section service-2">
	<div class="container">
		<div class="row">
    @foreach ($services as $service)
    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="service-block mb-5">
            <img src="{{ asset('image/abouts/'.$service->image) }}" alt="" class="img-fluid">
            <div class="content">
                <h4 class="mt-4 mb-2 title-color">{{ $service->name }}</h4>
                <p class="mb-4">{{ $service->content }}</p>
            </div>
        </div>
    </div>
    @endforeach


		</div>
	</div>
</section>
@include('site.info')

@stop
