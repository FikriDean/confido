<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Confido | Invoice Print</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <h2 class="page-header">
          <img src="../dist/img/LogoConfido.png" alt="Confido Logo" width="220">
          <small class="float-right">Date: 2/10/2014</small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        <br>
        <br>
        <address>
          <strong>Confido</strong><br>
          Jl. Cabe V 91, Pd. Cabe Ilir<br>
          Kec. Pamulang, Kota Tangerang Selatan, Banten 15418<br>
          Phone: 	081384002161<br>
          Email: confidotiket@gmail.com
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        
        <br>
        <br>
        <address>
          <strong>John Doe</strong><br>
          795 Folsom Ave, Suite 600<br>
          San Francisco, CA 94107<br>
          Phone: (555) 539-1037<br>
          Email: john.doe@example.com
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <br>
        <br>
        <b>Invoice #007612</b><br>
        <b>Order ID:</b> 4F3S8J<br>
        <b>Bank :</b> ABC<br>
        <b>Payment date:</b> 2/22/2014<br>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
<br>
    <!-- Table row -->
    <div class="row">
      <div class="col-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Maskapai</th>
            <th>Kelas</th>
            <th>Rute</th>
            <th>Tanggal Pergi</th>
            <th>Seat</th>
            <th>Gate</th>
          </tr>
          </thead>
          <tbody>
          <tr>
            <td>1</td>
            <td>Garuda</td>
            <td>Ekonomi</td>
            <td>Jakarta - Bali</td>
            <td>11-11-2022</td>
            <td>14A</td>
            <td>1B</td>
          </tr>
          <tr>
            <td>2</td>
            <td>Garuda</td>
            <td>Ekonomi</td>
            <td>Jakarta - Bali</td>
            <td>11-11-2022</td>
            <td>14A</td>
            <td>1B</td>
          </tr>
          <tr>
            <td>2</td>
            <td>Garuda</td>
            <td>Ekonomi</td>
            <td>Jakarta - Bali</td>
            <td>15-11-2022</td>
            <td>15A</td>
            <td>2A</td>
          </tr>
          <tr>
            <td>3</td>
            <td>Garuda</td>
            <td>Ekonomi</td>
            <td>Jakarta - Bali</td>
            <td>15-11-2022</td>
            <td>15A</td>
            <td>2A</td>
          </tr>
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-6">
  
      </div>
      <!-- /.col -->
      <div class="col-6">
       
        <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:50%">Subtotal:</th>
              <td>Rp 1.022.800,00</td>
            </tr>
            <tr>
              <th>Pajak (11%)</th>
              <td>Rp 112.508,00</td>
            </tr>
            <tr>
              <th>Total:</th>
              <td>Rp 1.135.308,00</td>
            </tr>
          </table>
        </div>
		 <p class="lead">Your Payment Was Successful &nbsp; &nbsp;<i class="fas fa-check"></i> <br></p>

      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
<!-- Page specific script -->
<script>
  window.addEventListener("load", window.print());
</script>
</body>
</html>
