<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIA Laporan Pemasukan</title>

    <!-- Bootstrap & CSS-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
    <style>
        table {
        font-family: arial, sans-serif;
        font-size: 12dp;
        border-collapse: collapse;
        width: 100%;
        }
        td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
        }
    </style>

  <!-- Navbar -->
  
  <!-- /.content-wrapper -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <script>
		window.print();
	</script>
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Pemasukkan</h1>
          </div>
          <!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              
            </ol>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="container ml-3 " >
        <div class="row">
            <div class="col-12 text-center">
                <h3>Laporan Pemasukan</h3>
                <h6>Nusa Indo Teknologi</h6>
            </div>
        </div>
   <div class="card-body">
    <a class="float-right btn btn-outline-dark" href="/cetak-pemasukan-print " ></a>
     <table class="table table-bordered">
      <tr class="bg-gradient-purple text-center text-bold">
        <th>No</th>
        <th>Tanggal</th>
        <th>Jenis Pemasukkan</th>
        <th>Detail Pemasukkan</th>
        <th>Jumlah Pemasukan</th>
      </tr>
      @php 
      $i=0;
      @endphp
      {{-- $total = 0; --}}
      @foreach ($dtPemasukan as $item)
          <tr class="bg-gradient-white text-center text-bold">
            <td class="bg-light">{{ ++$i }}</td>
            <td class="bg-light">{{ $item->tgl_pemasukan }}</td>
            <td class="bg-light">{{ $item->jenis_pemasukan }}</td>
            <td class="bg-light">{{ $item->detail_pemasukan }}</td>
            <td class="bg-light">Rp. {{ number_format($item->jumlah_pemasukan) }}</td>
            <td>
              {{-- <a href="{{url("pemasukan/edit/$item->id")}}" class="btn btn-primary"><i class="fa fa-edit" aria-hidden="true"></i></a>
          </td>
          <td>
              <a href="{{url("pemasukan/delete/$item->id")}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
          </td> --}}
          </tr>
      @endforeach  
      <tr>
        <td colspan="4" align="center"><strong>Total Harga :</strong></td>
        <td align="center"><strong>Rp. {{ number_format($jumlah) }}</strong></td>
        <td>
        </td>
    </tr>  
     </table>
    
   </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  
</body>
</html>