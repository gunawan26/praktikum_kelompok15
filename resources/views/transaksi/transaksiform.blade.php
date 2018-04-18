@extends('layouts.app')

@section('content')

    <div class="container">
      


          <form method="post" enctype="multipart/form-data" action="">
            @csrf
            

            <div class="form-group">
              <label class="col-form-label" for="inputDefault">tanggal pesan</label>
              <input type="date" class="form-control" placeholder="Default input" id="datepesan">
            </div>
           
            <div class="form-group">
              <label class="col-form-label" for="inputDefault">tanggal kembali</label>
              <input type="date" class="form-control" placeholder="Default input" id="datekembali">
            </div>
            <div>
              <div id="previewImage"></div>
            </div>
            

                  
          
            <label for="image-input">input gambae</label>
           <input type="file" name="image_post[]" id="image-input" multiple="" accept="image/*" >

            @if ($foto == null)
               
            @else
          
            @endif


          </form>

          






    </div>
    
    
@endsection

@section('custom_js')
{{-- <script type="text/javascript" src="{{ asset('js/jquery.fancybox.min.js') }}"></script> --}}
<script type="text/javascript" async>

  function previewImage(input){
    if(input){
      var i = 0;
      for(i ; i < input.files.length; i++){
        var reader = new FileReader();
        reader.onload = function(e){
          var image = "<img class='img-preview' src='"+ e.target.result +"' alt='your image' />";
          $('#previewImage').append(image);
        }
        reader.readAsDataURL(input.files[i]);
      }
    }
  }


  $("#image-input").change(function() {
    alert(location.hostname);
    $('#previewImage').html('');
    
    previewImage(this);
  
  });



</script>

@endsection

