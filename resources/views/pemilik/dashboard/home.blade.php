@extends('layouts.dashboardlayout')
@section('content')

   
        <!-- navbar-->

        <!-- Counts Section -->
<section class="dashboard-counts section-padding">
  <div class="container-fluid">
    <div class="row">
      <div class="col-xl-2 col-md-4 col-6">
        <div class="wrapper count-title d-flex">
          <div class="icon"><i class="icon-user"></i>
          </div>
          <div class="name"><strong class="text-uppercase">Klien Baru</strong><span>belum di approve</span>
          <div class="count-number">{{$jumlahTrans}}</div>
          </div>
        </div>
      </div>
      <!-- Count item widget-->
      <div class="col-xl-3 col-md-4 col-6">
        <div class="wrapper count-title d-flex">
          <div class="icon"><i class="icon-padnote"></i></div>
          <div class="name"><strong class="text-uppercase">Total Transaksi Masuk</strong><span>sejak 2018</span>
            <div class="count-number ">{{$totalTrans}}</div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-4 col-6">
          <div class="wrapper count-title d-flex">
            <div class="icon"><i class="icon-check"></i></div>
            <div class="name"><strong class="text-uppercase">Total Transaksi Berhasil</strong><span>sejak 2018</span>
              <div class="count-number text-success">{{$transSukses}}</div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-4 col-6">
            <div class="wrapper count-title d-flex">
              <div class="icon"><i class="icon-close text-danger"></i></div>
              <div class="name"><strong class="text-uppercase">Total Transaksi Gagal</strong><span>sejak 2018</span>
                <div class="count-number text-danger">{{$transGagal}}</div>
              </div>
            </div>
        </div>
    </div>
  </div>
</section>
        <section>
          <div class="container-fluid">
            <header> 
              <hr>
              <h1 class="h3 display">Informasi Pesanan Masuk</h1>
              <hr>
            </header>
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Data Kendaraan</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th class="text-center">
                              No.
                            </th>
                            <th class="">
                              Nama Kendaraan
                            </th>
                            <th class="">
                              Plat
                            </th>
                            <th class="text-center">
                              Tanggal Transaksi
                            </th>
                            <th class="text-center">
                              Tanggal Pesan
                            </th>
                            <th class="text-center">
                             Tanggal Kembali
                            </th>
                            <th class="text-center">
                                Total
                            </th>
                            <th class="text-center">
                              Aksi
                            </th>
                          </tr> 
                        </thead>
                        <tbody>
                          @foreach ($transaksis as $transaksi)
                          <tr class="">
                            @php
                              $pesan = strtotime($transaksi->tgl_pesan);
                              $kembali = strtotime($transaksi->tgl_rencanakembali);
                              $diff =$kembali - $pesan;
                              $total_biaya = (intval($diff)/(60*60*24))*$transaksi->harga_sewa;
                            @endphp
           

                              
                              <td class="text-center">1</td>
                              <td>{{$transaksi->nama_kendaraan}}</td>
                              <td>{{$transaksi->plat_nomor}}</td>
                              <td class="text-center">{{$transaksi->tgl_transaksi}}</td>
                              <td class="text-center">{{$transaksi->tgl_pesan}}</td>
                              <td class="text-center">{{$transaksi->tgl_rencanakembali}}</td>
                              <td class="text-center">Rp. {{$total_biaya}}</td>
                              <td align="center">  
                                <button type="button" class="btn btn-outline-success">Approve</button>
                                <button type="button" class="btn btn-outline-warning">Batal</button>
                              </td>
                            </tr>    
                          @endforeach
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
@endsection