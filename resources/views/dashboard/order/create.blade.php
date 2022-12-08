@php
				$routeFrom = [];
				$routeTo = [];
				
				foreach ($routes as $route) {
				    array_push($routeFrom, $route->from_route);
				    array_push($routeTo, $route->to_route);
				}
				
				$routeFrom = array_unique($routeFrom);
				$routeTo = array_unique($routeTo);
				
@endphp

@extends('layouts.front')

@section('front')
				<div class="wrapper">
								<!-- Navbar -->
								<x-front-dashboard-navbar></x-front-dashboard-navbar>
								<!-- /.Navbar -->

								<!-- Main Sidebar Container -->
								<aside class="main-sidebar sidebar-dark-primary elevation-4">
												<!-- Brand Logo -->
												<a href="{admin/dashboard}" class="brand-link">
																<img src="{{ asset('dist/img/ConfidoLogo.png') }}" alt="Confido Logo"
																				class="brand-image img-circle elevation-3" style="opacity: .8">
																<span class="brand-text font-weight-light">Confido</span>
												</a>

												<!-- Sidebar Menu -->
												<x-front-sidemenu></x-front-sidemenu>
												<!-- /.sidebar Menu -->
								</aside>

								<!-- Content Wrapper. Contains page content -->
								<div class="content-wrapper">
												<!-- Content Header (Page header) -->
												<section class="content-header">
																<div class="container-fluid">
																				<div class="row mb-2">
																								<div class="col-sm-6">
																												<h1>Pesanan</h1>
																								</div>
																								<div class="col-sm-6">
																												<ol class="breadcrumb float-sm-right">
																																<li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
																																<li class="breadcrumb-item active">Pesanan</li>
																												</ol>
																								</div>
																				</div>
																</div><!-- /.container-fluid -->
												</section>

												<!-- Main content -->
												<section class="content">
																<div class="container-fluid">
																				<div class="row">
																								<!-- left column -->
																								<div class="col-md-12">
																												@if (session('success'))
																																<div class="alert alert-success">
																																				{{ session('success') }}
																																</div>
																												@endif
																												<!-- Pesanan elements disabled -->
																												<div class="card card-warning">
																																<div class="card-header">
																																				<h3 class="card-title">Form Pesanan</h3>
																																</div>
																																<!-- /.card-header -->
																																<form action="/orders" method="POST">
																																				@csrf
																																				@method('POST')
																																				<div class="card-body">
																																								<h4>Data Tiket</h4>

																																								<div class="form-group row">
																																												<label for="inputEmail3" class="col-sm-2 col-form-label">Rute :</label>
																																												<div class="col-sm-5">
																																																<select class="form-control" id="keberangkatan"
																																																				onchange="getSelectValue(this.value);" name="from_route" required>
																																																				<option value="" disabled selected>-- Pilih Keberangkatan --
																																																				</option>
																																																				@foreach ($routeFrom as $rf)
																																																								<option value="{{ $rf }}">
																																																												{{ ucfirst($rf) }}
																																																								</option>
																																																				@endforeach
																																																</select>
																																												</div>
																																												<div class="col-sm-5">
																																																<select class="form-control" id="tujuan"
																																																				onchange="getSecondValue(this.value);" name="to_route" required>
																																																				<option value="" disabled selected>-- Pilih Tujuan --</option>
																																																				@foreach ($routeTo as $rt)
																																																								<option value="{{ $rt }}">
																																																												{{ ucfirst($rt) }}
																																																								</option>
																																																				@endforeach
																																																</select>
																																												</div>
																																								</div>
																																								<script type="text/javascript">
																																												function getSelectValue(keberangkatan) {
																																																if (keberangkatan != '') {
																																																				$("#tujuan option[value='" + keberangkatan + "']").hide();
																																																				$("#tujuan option[value!='" + keberangkatan + "']").show();
																																																}
																																												}

																																												function getSecondValue(tujuan) {
																																																if (tujuan != '') {
																																																				$("#keberangkatan option[value='" + tujuan + "']").hide();
																																																				$("#keberangkatan option[value!='" + tujuan + "']").show();
																																																}
																																												}
																																								</script>
																																								<div class="form-group row">
																																												<label for="airline_id" class="col-sm-2 col-form-label">Maskapai :</label>
																																												<div class="col-sm-5">
																																																<select class="form-control" id="airline" name="airline_id" required>
																																																				<option disabled selected>-- Pilih Maskapai --</option>
																																																				@foreach ($airlines as $airline)
																																																								<option value="{{ $airline->id }}">
																																																												{{ $airline->name }}
																																																								</option>
																																																				@endforeach
																																																</select>
																																												</div>
																																												<div class="col-sm-5">
																																																<div class="form-group">
																																																				<select name="type_id" class="form-control" id="airline_class" required>
																																																								<option selected value="">-- Pilih Jenis Maskapai --</option>
																																																								@foreach ($types as $type)
																																																												<option value="{{ $type->id }}">
																																																																{{ ucfirst($type->name) }}
																																																												</option>
																																																								@endforeach
																																																				</select>
																																																</div>
																																												</div>
																																								</div>
																																								<div class="form-group row">
																																												<div class="col-lg-2 col-sm-12 align-items-start mb-2">
																																																<button type="button" class="btn btn-primary" id="checkTicketButton">Cek
																																																				Harga
																																																				Tiket</button>
																																												</div>
																																												<div class="col-lg-4 col-sm-12">
																																																<div class="form-group">
																																																				<div class="form-control">
																																																								<p id="tickets_shelf"></p>
																																																				</div>
																																																</div>
																																												</div>
																																												<div class="col-lg-4 col-sm-12">
																																																<div class="badge bg-success">
																																																				Dalam Bentuk Rupiah
																																																</div>
																																												</div>
																																								</div>
																																								<div class="form-group row">
																																												<label for="inputEmail3" class="col-sm-2 col-form-label">Jenis :</label>

																																												<div class="col-sm-2">
																																																<div class="form-group">
																																																				<div class="form-check">
																																																								<input class="form-check-input" id="pergi-check" type="radio"
																																																												name="round_trip" checked value="false">
																																																								<label class="form-check-label">Sekali Jalan</label>
																																																				</div>
																																																</div>
																																												</div>

																																												<div class="col-sm-2">
																																																<div class="form-group">
																																																				<div class="form-check">
																																																								<input class="form-check-input" id="pergi-pulang-check"
																																																												type="radio" name="round_trip" value="true">
																																																								<label class=" form-check-label">Pulang-Pergi</label>
																																																				</div>
																																																</div>
																																												</div>

																																												<label for="inputEmail3" class="col-sm-1 col-form-label">Jumlah :</label>
																																												<div class="col-sm-2">
																																																<select class="form-control" id="jumlah-penumpang" name="amount">
																																																				<option value=1 id="option-penumpang-1">1</option>
																																																				<option value=2 id="option-penumpang-2">2</option>
																																																				<option value=3 id="option-penumpang-3">3</option>
																																																				<option value=4 id="option-penumpang-4">4</option>
																																																				<option value=5 id="option-penumpang-5">5</option>
																																																</select>
																																												</div>
																																								</div>

																																								<div class="form-group row">
																																												<label for="inputEmail3" class="col-sm-2 col-form-label">Pergi :</label>

																																												<div class="col-sm-4">
																																																<div class="form-group">
																																																				<input type="date" class="form-control" id="tanggalpergi"
																																																								min="<?php echo date('Y-m-d'); ?>" placeholder="hh/bb/tttt" name="go_date"
																																																								required>
																																																</div>
																																												</div>

																																												<label for="inputEmail3" class="col-sm-1 col-form-label pulang-toogle">Pulang
																																																:</label>
																																												<div class="col-sm-4">
																																																<div class="form-group">
																																																				<input type="date" class="form-control pulang-toogle"
																																																								id="tanggalpulang" min="<?php echo date('Y-m-d'); ?>"
																																																								placeholder="hh/bb/tttt" name="return_date">
																																																</div>
																																												</div>

																																								</div>

																																								<h4>Data Penumpang :</h4>

																																								<div class="form-group row" id="penumpang-1">
																																												<label for="inputEmail3" class="col-sm-2 col-form-label">Penumpang 1:</label>
																																												<div class="col-sm-2">
																																																<div class="form-group">
																																																				<input type="text" class="form-control" id="inputEmail3"
																																																								placeholder="Nama" name="nama_penumpang_1" required>
																																																</div>
																																												</div>
																																												<label for="inputEmail3" class="col-sm-1 col-form-label">KTP :</label>
																																												<div class="col-sm-2">
																																																<div class="form-group">
																																																				<input type="text" class="form-control" id="inputEmail3"
																																																								placeholder="KTP" name="nik_penumpang_1" required>
																																																</div>
																																												</div>
																																												<label for="inputEmail3" class="col-sm-2 col-form-label">Jenis
																																																Kelamin:</label>
																																												<div class="col-sm-2">
																																																<div class="form-group">
																																																				<select class="form-control" name="jenis_penumpang_1" required>
																																																								<option disabled selected>-- Kelamin --</option>
																																																								<option value="true">Laki-Laki</option>
																																																								<option value="false">Perempuan</option>
																																																				</select>
																																																</div>
																																												</div>
																																								</div>

																																								<div class="form-group row" id="penumpang-2">
																																												<label for="inputEmail3" class="col-sm-2 col-form-label">Penumpang 2:</label>
																																												<div class="col-sm-2">
																																																<div class="form-group">
																																																				<input type="tet" class="form-control" id="inputEmail3"
																																																								placeholder="Nama" name="nama_penumpang_2">
																																																</div>
																																												</div>
																																												<label for="inputEmail3" class="col-sm-1 col-form-label">KTP :</label>
																																												<div class="col-sm-2">
																																																<div class="form-group">
																																																				<input type="text" class="form-control" id="inputEmail3"
																																																								placeholder="KTP" name="nik_penumpang_2">
																																																</div>
																																												</div>
																																												<label for="inputEmail3" class="col-sm-2 col-form-label">Jenis
																																																Kelamin:</label>
																																												<div class="col-sm-2">
																																																<div class="form-group">
																																																				<select class="form-control" name="jenis_penumpang_2">
																																																								<option disabled selected>-- Kelamin --</option>
																																																								<option value="true">Laki-Laki</option>
																																																								<option value="false">Perempuan</option>
																																																				</select>
																																																</div>
																																												</div>
																																								</div>

																																								<div class="form-group row" id="penumpang-3">
																																												<label for="inputEmail3" class="col-sm-2 col-form-label">Penumpang 3:</label>
																																												<div class="col-sm-2">
																																																<div class="form-group">
																																																				<input type="tet" class="form-control" id="inputEmail3"
																																																								placeholder="Nama" name="nama_penumpang_3">
																																																</div>
																																												</div>
																																												<label for="inputEmail3" class="col-sm-1 col-form-label">KTP :</label>
																																												<div class="col-sm-2">
																																																<div class="form-group">
																																																				<input type="text" class="form-control" id="inputEmail3"
																																																								placeholder="KTP" name="nik_penumpang_3">
																																																</div>
																																												</div>
																																												<label for="inputEmail3" class="col-sm-2 col-form-label">Jenis
																																																Kelamin:</label>
																																												<div class="col-sm-2">
																																																<div class="form-group">
																																																				<select class="form-control" name="jenis_penumpang_3">
																																																								<option disabled selected>-- Kelamin --</option>
																																																								<option value="true">Laki-Laki</option>
																																																								<option value="false">Perempuan</option>
																																																				</select>
																																																</div>
																																												</div>
																																								</div>

																																								<div class="form-group row" id="penumpang-4">
																																												<label for="inputEmail3" class="col-sm-2 col-form-label">Penumpang 4:</label>
																																												<div class="col-sm-2">
																																																<div class="form-group">
																																																				<input type="tet" class="form-control" id="inputEmail3"
																																																								placeholder="Nama" name="nama_penumpang_4">
																																																</div>
																																												</div>
																																												<label for="inputEmail3" class="col-sm-1 col-form-label">KTP :</label>
																																												<div class="col-sm-2">
																																																<div class="form-group">
																																																				<input type="text" class="form-control" id="inputEmail3"
																																																								placeholder="KTP" name="nik_penumpang_4">
																																																</div>
																																												</div>
																																												<label for="inputEmail3" class="col-sm-2 col-form-label">Jenis
																																																Kelamin:</label>
																																												<div class="col-sm-2">
																																																<div class="form-group">
																																																				<select class="form-control" name="jenis_penumpang_4">
																																																								<option disabled selected>-- Kelamin --</option>
																																																								<option value="true">Laki-Laki</option>
																																																								<option value="false">Perempuan</option>
																																																				</select>
																																																</div>
																																												</div>
																																								</div>

																																								<div class="form-group row" id="penumpang-5">
																																												<label for="inputEmail3" class="col-sm-2 col-form-label">Penumpang 5:</label>
																																												<div class="col-sm-2">
																																																<div class="form-group">
																																																				<input type="tet" class="form-control" id="inputEmail3"
																																																								placeholder="Nama" name="nama_penumpang_5">
																																																</div>
																																												</div>
																																												<label for="inputEmail3" class="col-sm-1 col-form-label">KTP :</label>
																																												<div class="col-sm-2">
																																																<div class="form-group">
																																																				<input type="text" class="form-control" id="inputEmail3"
																																																								placeholder="KTP" name="nik_penumpang_5">
																																																</div>
																																												</div>
																																												<label for="inputEmail3" class="col-sm-2 col-form-label">Jenis
																																																Kelamin:</label>
																																												<div class="col-sm-2">
																																																<div class="form-group">
																																																				<select class="form-control" name="jenis_penumpang_5">
																																																								<option disabled selected>-- Kelamin --</option>
																																																								<option value="true">Laki-Laki</option>
																																																								<option value="false">Perempuan</option>
																																																				</select>
																																																</div>
																																												</div>
																																								</div>

																																								<h4>Data Pembayaran</h4>

																																								<div class="form-group row">
																																												<label for="inputEmail3" class="col-sm-2 col-form-label">Metode
																																																Pembayaran:</label>
																																												<div class="col-lg-3 col-sm-12">
																																																<div class="form-group">
																																																				<select class="form-control" id="method_id" name="method_id">
																																																								<option disabled selected>-- Pilih Metode Pembayaran --</option>
																																																								@foreach ($methods as $method)
																																																												<option value="{{ $method->id }}">{{ $method->method }}
																																																												</option>
																																																								@endforeach
																																																				</select>
																																																</div>
																																												</div>

																																												<label for="inputEmail3" class="col-sm-1 col-form-label">Atas Nama:</label>
																																												<div class="col-lg-2 col-sm-12">
																																																<div class="form-group">
																																																				<input type="text" class="form-control" name="name_account"
																																																								id="name_account" placeholder="" required>
																																																				<small class="text-muted">Nama lengkap pada rekening</small>
																																																</div>
																																												</div>

																																												<label for="inputEmail3" class="col-sm-1 col-form-label">Nomor:</label>
																																												<div class="col-lg-2 col-sm-12">
																																																<div class="form-group">
																																																				<input type="text" class="form-control" name="from_account"
																																																								id="name_account" placeholder="" required>
																																																				<small class="text-muted">Nomor lengkap pada rekening</small>
																																																</div>
																																												</div>
																																								</div>

																																								<div class="form-group row">
																																												<button type="submit" class="btn btn-primary">Submit</button>
																																								</div>
																																				</div>
																																</form>
																																<!-- /.card-body -->
																												</div>
																								</div>

																				</div>
																				<!-- /.row -->
																</div><!-- /.container-fluid -->
												</section>
												<!-- /.content -->
								</div>
								<!-- /.content-wrapper -->
								<footer class="main-footer">
												<strong>Confido &copy; 2022.</strong>
												All rights reserved.
												<div class="float-right d-none d-sm-inline-block">
												</div>
								</footer>

								<!-- Control Sidebar -->
								<aside class="control-sidebar control-sidebar-dark">
												<!-- Control sidebar content goes here -->
								</aside>
								<!-- /.control-sidebar -->
				</div>
				<!-- ./wrapper -->
@endsection

<script>
				window.onload = init;

				function init() {
								const checkPriceButton = document.getElementById("checkPriceButton");
								const pickup = document.getElementById("keberangkatan");
								const destination = document.getElementById("tujuan");
								const airline = document.getElementById("airline");
								const airline_class = document.getElementById("airline_class");
								const checkTicketButton = document.getElementById('checkTicketButton');
								const ticketsShelf = document.getElementById('tickets_shelf');

								checkTicketButton.addEventListener('click', function() {
												fetch(
																				`/checkprice?airline_id=${airline.value}&type_id=${airline_class.value}&from_route=${pickup.value}&to_route=${destination.value}`
																)
																.then(response => {
																				return response.json();
																})
																.then(res => {
																				ticketsShelf.innerHTML = res.price;
																})
																.catch(res => {
																				ticketsShelf.innerHTML = "Harga tiket tidak dapat ditampilkan";
																})
								});
				}
</script>
