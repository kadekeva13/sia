<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIA Laporan Buku Besar</title>

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
  

      {{-- <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> --}}

  
  <!-- /.content-wrapper -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <script>
		window.print();
	</script>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <a class="btn btn-info shadow" style="width:50px; margin-top:20px; margin-left:25px;" href=" /cetak-bukubesar-print "><i class="fas fa-print"></i></a>

      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Buku Besar</h1>
          </div>
          <!-- /.col -->
          {{-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <a href="{{route('create-bukubesar')}}" class="btn btn-primary">Tambah Data <i class="fa fa-plus-square" aria-hidden="true"></i></a>
            </ol>
          </div> --}}
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
   <div class="card-body">
     <table class="table table-bordered">
      <tr class="bg-gradient-cyan text-center text-bold">
        <th>No</th>
        <th>ID Keuangan</th>
        <th>ID Laporan</th>
        <th>Jenis Akun</th>
        <th>Keterangan</th>
        <th>Debit</th>
        <th>Kredit</th>
    
      </tr>
      @php 
      $i=0;
      @endphp
      @foreach ($dtBubes as $item)
          <tr class="bg-gradient-white text-center text-bold">
            <td class="bg-light">{{ ++$i }}</td>
            <td class="bg-light">{{ $item->id_keuangan }}</td>
            <td class="bg-light">{{ $item->id_laporan }}</td>
            <td class="bg-light">{{ $item->nama }}</td>
            <td class="bg-light">{{ $item->keterangan }}</td>
            <td class="bg-light">{{ $item->debit }}</td>
            <td class="bg-light">{{ $item->kredit }}</td>
            {{-- <td>
              <a href="{{url("bukubesar/edit/$item->id")}}" class="btn btn-primary"><i class="fa fa-edit" aria-hidden="true"></i></a>
          </td>
          <td>
              <a href="{{url("bukubesar/delete/$item->id")}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
          </td> --}}
          </tr>
      @endforeach
      <tr>
        <td colspan="5" align="center"><strong>Total Harga :</strong></td>
        <td align="center"><strong>Rp. {{ number_format($jumlah) }}</strong></td>
        <td align="center"><strong>Rp. {{ number_format($jumlah1) }}</strong></td>
    </tr> 
     {{-- <tr>
      <td colspan="5" align="center"><strong>Total Harga :</strong></td>
      
      <td>
      </td>
  </tr>      --}}
     </table>
     {{-- {{$dtCustomer->links()}} --}}
   </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  
</body>
</html>
