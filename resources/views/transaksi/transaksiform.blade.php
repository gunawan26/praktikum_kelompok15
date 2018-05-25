@extends('layouts.layouttransaksi')
@section('custom-css')
    
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endsection
@section('content')

    <div class="container">
      @if (Session::has('error'))
      <div class="alert alert-dismissible alert-danger">
          {{ session::get('error') }}
      </div>
  @endif
      <div class="row justify-content-center"> 
<div class="col-md-8">
            <div class="card">
                <div class="card-header" style="text-align: center;background-color:#28a745"><h4 style="color: #fff">Transaksi</h4></div>
<div class="card-body">
  <p class="font-weight-bold">Nama mobil</p>
  <p>{{$kendaraan->nama_kendaraan}}</p>
  <p class="font-weight-bold">Harga</p>
  <p>Rp.{{$kendaraan->harga_sewa}} / hari</p>
          <form method="post" enctype="multipart/form-data" action="{{route('transaksi.store',$kendaraan->id)}}">
            @csrf

            <div class="form-group">
              <label class="col-form-label" for="inputDefault">tanggal pesan</label>
              <input type="date" class="form-control" placeholder="Default input" id="datepesan" name="tgl_pesan">
            </div>
           
            <div class="form-group">
              <label class="col-form-label" for="inputDefault">tanggal kembali</label>
              <input type="date" class="form-control" placeholder="Default input" id="datekembali" name="tgl_rencanakembali">
            </div>
            <div>
              <div id="previewImage"></div>
            </div>
            
<p class="font-weight-bold">Total harga :</p>
  
                  
          
            
            @if ($foto == null)
            <label for="image-input">input gambar</label>
            <input type="file" name="foto_ktp" id="image-input" multiple="" accept="image/*" >
 
            @else
          
            @endif
            <button class="btn btn-success btn-block" type="submit">Sewa</button>

          </form>

          






    </div>
  </div>
  </div> </div> 
    
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
  
  $(function() {
  $('input[name="tgl_pesan"]').daterangepicker({
    opens: 'left'
  }, function(start, end, label) {
    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
  });
});



</script>

@endsection

