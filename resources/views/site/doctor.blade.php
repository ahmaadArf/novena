@extends('site.master')
@section('title','Service | '.env('APP_NAME'))
@section('content')
@include('site.page',['name'=>'All Doctors','content'=>'pecalized doctors'])

<!-- portfolio -->
<section class="section doctors">
  <div class="container">
  	  <div class="row justify-content-center">
             <div class="col-lg-6 text-center">
                <div class="section-title">
                    <h2>Doctors</h2>
                    <div class="divider mx-auto my-4"></div>
                    <p>We provide a wide range of creative services adipisicing elit. Autem maxime rem modi eaque, voluptate. Beatae officiis neque </p>
                </div>
            </div>
        </div>

      <div class="col-12 text-center  mb-5">
	        <div class="btn-group btn-group-toggle " data-toggle="buttons">
	          <label class="btn active ">
	            <input type="radio" name="shuffle-filter" value="all" checked="checked" />All Department
	          </label>
              @foreach ($departments as $department )
              <label class="btn ">
	            <input type="radio" name="shuffle-filter" value="{{ $department->name }}" />{{ $department->name }}
	          </label>
              @endforeach


	        </div>
      </div>

     <div class="row shuffle-wrapper portfolio-gallery">
        @foreach ($departments as $department )
        @foreach ($department->doctors as $doctor )
        <div class="col-lg-3 col-sm-6 col-md-6 mb-4 shuffle-item" data-groups="[&quot;{{ $department->name }}&quot;]">
            <div class="position-relative doctor-inner-box">
              <div class="doctor-profile">
                 <div class="doctor-img">
                         <img src="{{ asset('image/doctors/'.$doctor->image) }}" alt="doctor-image" class="img-fluid w-100">
                 </div>
              </div>
              <div class="content mt-3">
                  <h4 class="mb-0"><a href="{{ route('site.doctor_single',$doctor->id) }}">{{ $doctor->name }}</a></h4>
                  <p>{{$department->name  }}</p>
              </div>
            </div>
        </div>
        @endforeach

     @endforeach

    </div>
</section>
<!-- /portfolio -->
@include('site.info')

@stop
