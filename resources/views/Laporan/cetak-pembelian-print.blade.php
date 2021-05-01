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
            <h1 class="m-0"> Cetak Pembelian</h1>
          </div>
          <!-- /.col -->
          <!-- Button trigger modal -->
          {{-- <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                 Tambah Data
          </button> --}}
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
                <h3>Laporan Pembelian</h3>
                <h6>Nusa Indo Teknologi</h6>
            </div>
        </div>
   <div class="card-body">
     <table class="table table-bordered">
        <a class="btn btn-info shadow" style="width:50px; margin-top:20px; margin-left:25px;" href=" /cetak-pembelian-print "><i class="fas fa-print"></i></a>

      <tr class="bg-gradient-blue text-center text-bold text-white">
        <th>ID Pembelian</th>
        <th>ID Supplier</th>
        <th>ID Keuangan</th>
        <th>Tanggal Pembelian</th>
        <th>Nama Pembelian</th>
        
      </tr>
      @foreach ($dtPembelian as $item)
          <tr class="bg-gradient-white text-center text-bold">
            <td class="bg-light">{{ $item->id }}</td>
            <td class="bg-light">{{ $item->id_supplier }}</td>
            <td class="bg-light">{{ $item->id_keuangan }}</td>
            <td class="bg-light">{{ $item->tgl_pembelian }}</td>
            <td class="bg-light">{{ $item->nama_pembelian }}</td>
            <td>
              {{-- <a href="{{url("pembelian/edit/$item->id")}}" class="btn btn-primary"><i class="fa fa-edit" aria-hidden="true"></i></a>
          </td>
          <td>
              <a href="{{url("pembelian/delete/$item->id")}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
          </td> --}}
          </tr>
      @endforeach    
     </table>
   </div>
   
</body>
</html>
