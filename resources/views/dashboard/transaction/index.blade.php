@extends('layouts.front')

@section('front')
				<div class="wrapper">
								<!-- Navbar -->
								<x-front-dashboard-navbar></x-front-dashboard-navbar>
								<!-- /.Navbar -->

								<!-- Main Sidebar Container -->
								<aside class="main-sidebar sidebar-dark-primary elevation-4">
												<!-- Brand Logo -->
												<a href="/dashboard" class="brand-link">
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
																												<h1>Riwayat Transaksi</h1>
																								</div>
																								<div class="col-sm-6">
																												<ol class="breadcrumb float-sm-right">
																																<li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
																																<li class="breadcrumb-item active">Riwayat Transaksi</li>
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
																												@if (session('success'))
																																<div class="alert alert-success">
																																				{{ session('success') }}
																																</div>
																												@endif

																												<div class="card">
																																<div class="card-header">
																																				<h3 class="card-title">DATA RIWAYAT TRANSAKSI</h3>
																																</div>
																																<!-- /.card-header -->
																																<div class="card-body">
																																				<table id="example1" class="table table-bordered table-striped">
																																								<thead>
																																												<tr>
																																																<th>ID Booking</th>
																																																<th>Nama</th>
																																																<th>Metode Pembayaran</th>
																																																<th>Nama Akun Rekening</th>
																																																<th>Nomor Rekening</th>
																																																<th>Total Pembayaran</th>
																																																<th>Bukti Pembayaran</th>
																																																<th>Status</th>
																																																<th>Action</th>
																																												</tr>
																																								</thead>
																																								<tbody>
																																												@foreach ($transactions as $transaction)
																																																<tr>
																																																				<td>
																																																								@isset($transaction->order->order_code)
																																																												{{ $transaction->order->order_code }}
																																																								@else
																																																												ID Booking tidak dapat ditemukan (kemungkinan dikarenakan
																																																												dihapusnya order)
																																																								@endisset
																																																				</td>
																																																				<td>
																																																								@isset($transaction->order->user->name)
																																																												{{ $transaction->order->user->name }}
																																																								@endisset
																																																				</td>
																																																				<td>
																																																								@isset($transaction->method->method)
																																																												{{ $transaction->method->method }}
																																																								@endisset
																																																				</td>
																																																				<td>
																																																								@isset($transaction->name_account)
																																																												{{ $transaction->name_account }}
																																																								@endisset
																																																				</td>
																																																				<td>
																																																								@isset($transaction->from_account)
																																																												{{ $transaction->from_account }}
																																																								@endisset
																																																				</td>
																																																				<td>
																																																								@isset($transaction->total)
																																																												{{ $transaction->total }}
																																																								@endisset
																																																				</td>
																																																				<td>
																																																								@isset($transaction->image)
																																																												<img width="100px" src="{{ asset($transaction->image) }}"
																																																																alt="">
																																																								@else
																																																												Belum diunggah
																																																								@endisset
																																																				</td>
																																																				<td>
																																																								@if ($transaction->status == true)
																																																												Telah disetujui
																																																								@else
																																																												Belum/tidak disetujui
																																																								@endif
																																																				</td>
																																																				<td>
																																																								@can('isAdmin')
																																																												<button class="btn btn-primary btn-xs" type="button"
																																																																data-toggle="modal"
																																																																data-target="#modal-transaction-{{ $transaction->id }}">Perbaharui
																																																																Status
																																																												</button>
																																																												<div class="modal fade"
																																																																id="modal-transaction-{{ $transaction->id }}">
																																																																<div class="modal-dialog modal-xl">
																																																																				<div class="modal-content">
																																																																								<form action="/transactions/{{ $transaction->id }}"
																																																																												method="POST">

																																																																												@csrf
																																																																												@method('PUT')
																																																																												<div class="modal-header">
																																																																																<h4 class="modal-title">Update Status Transaksi
																																																																																				dengan
																																																																																				<strong>Booking ID
																																																																																								{{ $transaction->order->order_code }}</strong>
																																																																																</h4>
																																																																																<button type="button" class="close"
																																																																																				data-dismiss="modal" aria-label="Close">
																																																																																				<span aria-hidden="true">&times;</span>
																																																																																</button>
																																																																												</div>

																																																																												<div class="modal-body">
																																																																																<h6>Pesanan</h6>
																																																																																<table
																																																																																				class="table table-bordered table-striped">
																																																																																				<thead>
																																																																																								<tr>
																																																																																												<th>Nama</th>
																																																																																												<th>Metode Pembayaran</th>
																																																																																												<th>Nama Akun Rekening</th>
																																																																																												<th>Nomor Rekening</th>
																																																																																												<th>Total Pembayaran</th>
																																																																																												<th>Bukti Pembayaran</th>
																																																																																												<th>Status</th>
																																																																																								</tr>
																																																																																				</thead>
																																																																																				<tbody>
																																																																																								<td>
																																																																																												@isset($transaction->order->user->name)
																																																																																																{{ $transaction->order->user->name }}
																																																																																												@endisset
																																																																																								</td>
																																																																																								<td>
																																																																																												@isset($transaction->method->method)
																																																																																																{{ $transaction->method->method }}
																																																																																												@endisset
																																																																																								</td>
																																																																																								<td>
																																																																																												@isset($transaction->name_account)
																																																																																																{{ $transaction->name_account }}
																																																																																												@endisset
																																																																																								</td>
																																																																																								<td>
																																																																																												@isset($transaction->from_account)
																																																																																																{{ $transaction->from_account }}
																																																																																												@endisset
																																																																																								</td>
																																																																																								<td>
																																																																																												@isset($transaction->total)
																																																																																																{{ $transaction->total }}
																																																																																												@endisset
																																																																																								</td>
																																																																																								<td>
																																																																																												@isset($transaction->image)
																																																																																																<img width="100px"
																																																																																																				src="{{ asset($transaction->image) }}"
																																																																																																				alt="">
																																																																																												@else
																																																																																																Belum diunggah
																																																																																												@endisset
																																																																																								</td>
																																																																																								<td>
																																																																																												@if ($transaction->status == true)
																																																																																																Telah disetujui
																																																																																												@else
																																																																																																Belum/tidak disetujui
																																																																																												@endif
																																																																																								</td>
																																																																																				</tbody>
																																																																																</table>
																																																																																<h6>Transaksi</h6>
																																																																																<table id="example1"
																																																																																				class="table table-bordered table-striped">
																																																																																				<thead>

																																																																																								<tr>
																																																																																												<th>Maskapai</th>
																																																																																												<th>Jenis</th>
																																																																																												<th>Rute</th>
																																																																																												<th>Jumlah</th>
																																																																																												<th>Pulang-Pergi</th>
																																																																																												<th>Tanggal</th>
																																																																																								</tr>

																																																																																				</thead>
																																																																																				<tbody>
																																																																																								<tr>
																																																																																												<td>
																																																																																																@isset($transaction->order->ticket->airline->name)
																																																																																																				{{ $transaction->order->ticket->airline->name }}
																																																																																																@else
																																																																																																				Tidak dapat ditampilkan
																																																																																																@endisset

																																																																																												</td>
																																																																																												<td>
																																																																																																@isset($transaction->order->ticket->type->name)
																																																																																																				{{ $transaction->order->ticket->type->name }}
																																																																																																@else
																																																																																																				Tidak dapat ditampilkan
																																																																																																@endisset

																																																																																												</td>
																																																																																												<td>
																																																																																																@isset($transaction->order->ticket->track->from_route)
																																																																																																				@isset($transaction->order->ticket->track->to_route)
																																																																																																								{{ $transaction->order->ticket->track->from_route }}
																																																																																																								-
																																																																																																								{{ $transaction->order->ticket->track->to_route }}
																																																																																																				@endisset
																																																																																																@else
																																																																																																				Tidak dapat ditampilkan
																																																																																																@endisset

																																																																																												</td>
																																																																																												<td>
																																																																																																@isset($transaction->order->amount)
																																																																																																				{{ $transaction->order->amount }}
																																																																																																@else
																																																																																																				Tidak dapat ditampilkan
																																																																																																@endisset

																																																																																												</td>
																																																																																												<td>
																																																																																																@isset($transaction->order->round_trip)
																																																																																																				@if ($transaction->order->round_trip == true)
																																																																																																								Ya
																																																																																																				@else
																																																																																																								Tidak
																																																																																																				@endif
																																																																																																@else
																																																																																																				Tidak
																																																																																																@endisset

																																																																																												</td>
																																																																																												<td>
																																																																																																@isset($transaction->order->updated_at)
																																																																																																				{{ $transaction->order->updated_at }}
																																																																																																@else
																																																																																																				Tidak dapat ditampilkan
																																																																																																@endisset
																																																																																												</td>


																																																																																</table>
																																																																																<h6>Penumpang</h6>
																																																																																<table id="example1"
																																																																																				class="table table-bordered table-striped">
																																																																																				<thead>

																																																																																								<tr>
																																																																																												<th>No</th>
																																																																																												<th>Nama</th>
																																																																																												<th>KTP</th>
																																																																																												<th>Jenis Kelamin</th>
																																																																																								</tr>

																																																																																				</thead>
																																																																																				<tbody>
																																																																																								<tr>
																																																																																												@foreach ($transaction->order->passengers as $passenger)
																																																																																																<td>{{ $loop->iteration }}</td>
																																																																																																<td>
																																																																																																				@isset($passenger->name)
																																																																																																								{{ $passenger->name }}
																																																																																																				@else
																																																																																																								Tidak dapat ditampilkan
																																																																																																				@endisset
																																																																																																</td>
																																																																																																<td>
																																																																																																				@isset($passenger->id_number)
																																																																																																								{{ $passenger->id_number }}
																																																																																																				@else
																																																																																																								Tidak dapat ditampilkan
																																																																																																				@endisset
																																																																																																</td>
																																																																																																<td>
																																																																																																				@isset($passenger->gender)
																																																																																																								@if ($passenger->gender == true)
																																																																																																												Laki-laki
																																																																																																								@else
																																																																																																												Perempuan
																																																																																																								@endif
																																																																																																				@else
																																																																																																								Tidak dapat ditampilkan
																																																																																																				@endisset
																																																																																																</td>
																																																																																												@endforeach
																																																																																</table>

																																																																																<div class="input-group w-50">

																																																																																				<div class="input-group-text">

																																																																																								@if ($transaction->status == true)
																																																																																												<input type="checkbox"
																																																																																																id="status" name="status"
																																																																																																checked>
																																																																																								@else
																																																																																												<input type="checkbox"
																																																																																																id="status" name="status">
																																																																																								@endif

																																																																																				</div>
																																																																																				<label type="text"
																																																																																								class="form-control">Konfirmasi/setujui
																																																																																								transaksi dengan Booking ID
																																																																																								{{ $transaction->order->order_code }}
																																																																																								?</label>
																																																																																</div>
																																																																												</div>

																																																																												<div class="modal-footer justify-content-between">
																																																																																<button type="submit" class="btn btn-primary"
																																																																																				value="submit">Submit</button>
																																																																												</div>
																																																																								</form>
																																																																				</div>
																																																																				<!-- /.modal-content -->
																																																																</div>
																																																																<!-- /.modal-dialog -->
																																																												</div>
																																																								@else
																																																												<button class="btn btn-primary btn-xs" type="button"
																																																																data-toggle="modal"
																																																																data-target="#modal-upload-{{ $transaction->id }}">Unggah
																																																																Bukti Pembayaran
																																																												</button>

																																																												<div class="modal fade" id="modal-upload-{{ $transaction->id }}">
																																																																<div class="modal-dialog modal-lg">
																																																																				<div class="modal-content">
																																																																								<div class="modal-header">
																																																																												<h4 class="modal-title">Unggah Bukti Pembayaran
																																																																												</h4>
																																																																												<button type="button" class="close"
																																																																																data-dismiss="modal" aria-label="Close">
																																																																																<span aria-hidden="true">&times;</span>
																																																																												</button>
																																																																								</div>
																																																																								<form action="/transactions/{{ $transaction->id }}"
																																																																												method="POST" enctype="multipart/form-data">
																																																																												@csrf
																																																																												@method('PUT')
																																																																												<div class="modal-body">
																																																																																@isset($transaction->image)
																																																																																				<div class="form-group row">
																																																																																								<img src="{{ asset($transaction->image) }}"
																																																																																												alt="{{ $transaction->image }}"
																																																																																												style="width: 100px; height: 100px"
																																																																																												class="rounded border">
																																																																																				</div>
																																																																																@endisset

																																																																																<div class="form-group row">
																																																																																				<div class="col-sm-12">
																																																																																								<div class="form-group row">
																																																																																												<div class="col-sm-12">
																																																																																																<div class="form-group">
																																																																																																				<label for="formFile"
																																																																																																								class="form-label">Unggah
																																																																																																								foto bukti
																																																																																																								pembayaran</label>
																																																																																																				<div class="input-group">
																																																																																																								<div
																																																																																																												class="custom-file">
																																																																																																												<input
																																																																																																																type="file"
																																																																																																																class="custom-file-input"
																																																																																																																id="exampleInputFile">
																																																																																																												<label
																																																																																																																class="custom-file-label"
																																																																																																																for="exampleInputFile">Choose
																																																																																																																file</label>
																																																																																																								</div>
																																																																																																				</div>
																																																																																																</div>
																																																																																												</div>
																																																																																								</div>
																																																																																				</div>
																																																																																</div>
																																																																												</div>
																																																																												<div class="modal-footer justify-content-between">
																																																																																<button type="submit"
																																																																																				class="btn btn-primary">Save</button>
																																																																												</div>
																																																																								</form>
																																																																				</div>
																																																																				<!-- /.modal-content -->
																																																																</div>
																																																																<!-- /.modal-dialog -->
																																																												</div>
																																																								@endcan
																																																				</td>
																																																</tr>
																																												@endforeach
																																								</tbody>
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