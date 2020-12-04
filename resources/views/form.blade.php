@extends('layout')

@section('content')

<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>Contri</b>Bee</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Submit Form</p>
      <form id="myForm" >
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Select Full Name" name="full_name" id="full_name">
          
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Select Email Address" name="email" id="email">
        </div>

         <div class="input-group mb-3">
          <select name="country_id" id="country" class="form-control" placeholder="Select Country" >
            @foreach($countries as $country)
            <option value="{{ $country->id }}">{{ $country->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-4">
            <button class="btn btn-primary btn-block" id="btn-save">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
@endsection

@section('scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 <script>
  jQuery(document).ready(function($){

    // CREATE
    $("#btn-save").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        var formData = {
          full_name: $('#full_name').val(),
          email: $('#email').val(),
          country_id: $('#country').val(),
        };
        console.log(formData)
        var state = jQuery('#btn-save').val();
        var type = "POST";
        var ajaxurl = "{{ route('store') }}";
        $.ajax({
            type: type,
            url: ajaxurl,
            data: {
                full_name: document.getElementById("full_name").value,
                email: document.getElementById("email").value,
                country_id: document.getElementById("country").value,
            },
          success: function (data) {
                jQuery('#myForm').trigger("reset");
                swal("Greetings from " + data.country + "!");
            },
            error: function (data) {
                console.log(data);
            }
        });
    });
});

 </script>
@endsection
