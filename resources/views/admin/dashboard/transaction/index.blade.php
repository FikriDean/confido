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
																												<h1>Riwayat Transaksi</h1>
																								</div>
																								<div class="col-sm-6">
																												<ol class="breadcrumb float-sm-right">
																																<li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
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
																																																				<td>{{ $transaction->order->order_code }}</td>
																																																				<td>{{ $transaction->order->user->name }}</td>
																																																				<td>{{ $transaction->method->method }}</td>
																																																				<td>{{ $transaction->name_account }}</td>
																																																				<td>{{ $transaction->from_account }}</td>
																																																				<td>{{ $transaction->total }}</td>
																																																				<td>
																																																								@if ($transaction->image)
																																																												<img width="100px" src="{{ asset($transaction->image) }}"
																																																																alt="">
																																																								@else
																																																												Belum diupload
																																																								@endif
																																																				</td>
																																																				<td>
																																																								@if ($transaction->status == true)
																																																												Telah disetujui
																																																								@else
																																																												Belum/tidak disetujui
																																																								@endif
																																																				</td>
																																																				<td>

																																																								<button class="btn btn-primary btn-xs" type="button"
																																																												data-toggle="modal"
																																																												data-target="#modal-transaction-{{ $transaction->id }}">Update
																																																												Status
																																																								</button>

																																																								<form action="/admin/transactions/{{ $transaction->id }}"
																																																												method="POST">
																																																												@csrf
																																																												@method('DELETE')
																																																												<button class="btn btn-danger btn-xs"
																																																																type="submit">Hapus</button>
																																																								</form>

																																																								<button class="btn btn-warning btn-xs" type="button"
																																																												data-toggle="modal" data-target="#modal-lg">Lapor

																																																								</button>
																																																				</td>



																																																				<div class="modal fade" id="modal-transaction-{{ $transaction->id }}">
																																																								<div class="modal-dialog modal-lg">
																																																												<div class="modal-content">
																																																																<form action="/admin/transactions/{{ $transaction->id }}"
																																																																				method="POST">

																																																																				@csrf
																																																																				@method('PUT')
																																																																				<div class="modal-header">
																																																																								<h4 class="modal-title">Update Status Transaksi (id:
																																																																												{{ $transaction->id }})</h4>
																																																																								<button type="button" class="close"
																																																																												data-dismiss="modal" aria-label="Close">
																																																																												<span aria-hidden="true">&times;</span>
																																																																								</button>
																																																																				</div>

																																																																				<div class="modal-body">
																																																																								<div class="input-group w-50">

																																																																												<div class="input-group-text">

																																																																																@if ($transaction->status == true)
																																																																																				<input type="checkbox" id="status"
																																																																																								name="status" checked>
																																																																																@else
																																																																																				<input type="checkbox" id="status"
																																																																																								name="status">
																																																																																@endif

																																																																												</div>
																																																																												<label type="text"
																																																																																class="form-control">Konfirmasi/setujui
																																																																																transaksi dengan id {{ $transaction->id }}
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


																																																				<div class="modal fade" id="modal-lg">
																																																								<div class="modal-dialog modal-lg">
																																																												<div class="modal-content">
																																																																<div class="modal-header">
																																																																				<h4 class="modal-title">Lapor</h4>
																																																																				<button type="button" class="close"
																																																																								data-dismiss="modal" aria-label="Close">
																																																																								<span aria-hidden="true">&times;</span>
																																																																				</button>
																																																																</div>
																																																																<div class="modal-body">
																																																																				<div class="form-group row">
																																																																								<label for="inputExperience"
																																																																												class="col-sm-2 col-form-label">Keluhan</label>
																																																																								<div class="col-sm-10">
																																																																												<textarea class="form-control" id="inputExperience" placeholder="Keluhan"></textarea>
																																																																								</div>
																																																																				</div>
																																																																</div>
																																																																<div class="modal-footer justify-content-between">
																																																																				<button type="button"
																																																																								class="btn btn-primary">Submit</button>
																																																																</div>
																																																												</div>
																																																												<!-- /.modal-content -->
																																																								</div>
																																																								<!-- /.modal-dialog -->
																																																				</div>
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
