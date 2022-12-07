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
																												<h1>Riwayat Pesanan</h1>
																								</div>
																								<div class="col-sm-6">
																												<ol class="breadcrumb float-sm-right">
																																<li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
																																<li class="breadcrumb-item active">Riwayat Pesanan</li>
																												</ol>
																								</div>
																				</div>
																</div><!-- /.container-fluid -->
												</section>

												<!-- Main content -->
												<section class="content">
																<div class="container-fluid">
																				<div class="row">
																								<div class="col-12">
																												@if (session('hapus'))
																																<div class="alert alert-success" role="alert">
																																				{{ session('hapus') }}
																																</div>
																												@endif

																												<div class="card">
																																<div class="card-header">
																																				<h3 class="card-title">Data Riwayat Pesanan</h3>

																																</div>

																																<!-- /.card-header -->
																																<div class="card-body">
																																				<table id="example1" class="table table-bordered table-striped">
																																								<thead>
																																												<tr>
																																												<tr>
																																																<th>ID Booking</th>
																																																<th>Nama</th>
																																																<th>Maskapai</th>
																																																<th>Jenis</th>
																																																<th>Rute</th>
																																																<th>Jumlah</th>
																																																<th>Pulang-Pergi</th>
																																																<th>Tanggal</th>
																																																<th>Action</th>
																																												</tr>
																																												</tr>
																																								</thead>
																																								<tbody>
																																												@foreach ($orders as $order)
																																																<tr>
																																																				<td>{{ $order->order_code }}</td>
																																																				<td>{{ $order->user->name }}</td>
																																																				<td>{{ $order->ticket->airline->name }}</td>
																																																				<td>{{ $order->ticket->type->name }}</td>
																																																				<td>{{ $order->ticket->track->from_route }} -
																																																								{{ $order->ticket->track->to_route }}</td>
																																																				<td>{{ $order->amount }}</td>
																																																				<td>
																																																								@if ($order->round_trip)
																																																												Ya
																																																								@else
																																																												Tidak
																																																								@endif

																																																				</td>
																																																				<td>{{ $order->updated_at }}</td>
																																																				<td class="d-flex justify-content-around">
																																																								<form action="/admin/orders/{{ $order->id }}" method="POST">
																																																												@csrf
																																																												@method('DELETE')
																																																												<button class="btn btn-danger btn-xs"
																																																																type="submit">Hapus</button>
																																																								</form>
																																																								<a href="/print?order={{ $order->order_code }}" target="_blank">
																																																												<button class="btn btn-success btn-xs"
																																																																type="button">Cetak</button>
																																																								</a>
																																																				</td>
																																																</tr>
																																												@endforeach
																																				</table>
																																</div>
																																<!-- /.card-body -->
																												</div>
																												<!-- /.card -->
																								</div>
																								<!-- /.col -->
																				</div>
																				<!-- /.row -->
																</div>
																<!-- /.container-fluid -->
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
