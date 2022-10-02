<div class="appoinment-wrap mt-5 mt-lg-0 pl-lg-5">
    <h2 class="mb-2 title-color">Book an appoinment</h2>
    <p class="mb-4">Mollitia dicta commodi est recusandae iste, natus eum asperiores corrupti qui velit . Iste dolorum atque similique praesentium soluta.</p>
       <form id="#" class="appoinment-form" method="POST" action="{{ route('site.appoinment_data_form') }}">
        @csrf
        <div class="row">
                 <div class="col-lg-6">
                    <div class="form-group">
                        <select class="form-control @error('department_id')is-invalid @enderror" id="exampleFormControlSelect1" name="department_id">
                          <option value="">Choose Department</option>
                        @foreach ($departments  as $department )
                        <option value="{{  $department->id }}">{{ $department->name }}</option>
                        @endforeach
                        </select>
                        @error('department_id')
                        <div  class="invalid-feedback">{{ $message }}</div>

                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <select class="form-control @error('doctor_id')is-invalid @enderror" id="exampleFormControlSelect2"  name="doctor_id">

                        </select>
                        @error('doctor_id')
                        <div  class="invalid-feedback">{{ $message }}</div>

                        @enderror
                    </div>
                </div>

                 <div class="col-lg-6">
                    <div class="form-group">
                        <input name="date" type="date" class="form-control @error('date')is-invalid @enderror" placeholder="dd/mm/yyyy">
                        @error('date')
                        <div  class="invalid-feedback">{{ $message }}</div>

                        @enderror
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <input name="time"  type="time" class="form-control @error('time')is-invalid @enderror" placeholder="Time">
                        @error('time')
                        <div  class="invalid-feedback">{{ $message }}</div>

                        @enderror
                    </div>
                </div>
                 <div class="col-lg-6">
                    <div class="form-group">
                        <input name="name" id="name" type="text" class="form-control @error('name')is-invalid @enderror" placeholder="Full Name">
                        @error('name')
                        <div  class="invalid-feedback">{{ $message }}</div>

                        @enderror
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <input name="phone" id="phone" type="Number" class="form-control @error('phone')is-invalid @enderror" placeholder="Phone Number">
                        @error('phone')
                        <div  class="invalid-feedback">{{ $message }}</div>

                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group-2 mb-4">
                <textarea name="message" id="message" class="form-control @error('message')is-invalid @enderror" rows="6" placeholder="Your Message"></textarea>
                @error('message')
                <div  class="invalid-feedback">{{ $message }}</div>

                @enderror
            </div>

            <button class="btn btn-main btn-round-full">Make Appoinment<i class="icofont-simple-right ml-2"></i></button>
        </form>
    </div>
</div>
