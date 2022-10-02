@extends('site.master')
@section('title','Appoinment | '.env('APP_NAME'))
@section('content')
@include('site.page',['name'=>'Book your Seat','content'=>'Appoinment'])

<section class="appoinment section">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
          <div class="mt-3">
            <div class="feature-icon mb-3">
              <i class="icofont-support text-lg"></i>
            </div>
             <span class="h3">Call for an Emergency Service!</span>
              <h2 class="text-color mt-3">+84 789 1256 </h2>
          </div>
      </div>

      <div class="col-lg-8">
        @include('site.parts.appoinment')
      </div>
    </div>
  </div>
</section>

@stop

@section('script')

<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

<script>

    $('#exampleFormControlSelect1').on('change', function() {
        var id = $(this).val();
        $.ajax({
            type: 'post',
            url: '{{ route("site.appoinment_data") }}',
            data: {
                id: id,
                _token: '{{ csrf_token() }}'
            },
            success: function(res) {
                $('#exampleFormControlSelect2 option').remove();
                res.forEach(function(el) {
                        var op = '<option value="'+el.id+'">'+el.name+'</option>'

                    $('#exampleFormControlSelect2').append(op);
                })
            }
        })
    })
</script>
@stop
