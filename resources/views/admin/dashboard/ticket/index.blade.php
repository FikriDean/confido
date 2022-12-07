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
																												<h1>Harga</h1>
																								</div>
																								<div class="col-sm-6">
																												<ol class="breadcrumb float-sm-right">
																																<li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
																																<li class="breadcrumb-item active">Harga</li>
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
																																				@if (session('sameTicket'))
																																								<div class="alert alert-danger">
																																												{{ session('sameTicket') }}
																																								</div>
																																				@endif
																																				<div class="row mb-2">
																																								<div class="col-sm-6">
																																												<h3 class="card-title">Data harga</h3>
																																								</div>
																																								<div class="col-sm-6">
																																												<button class="btn btn-warning btn-sm float-sm-right" type="button"
																																																data-toggle="modal" data-target="#modal-lgharga"
																																																id="button-tambah-harga">Tambah Tiket
																																												</button>

																																												<div class="modal fade" id="modal-lgharga">
																																																<div class="modal-dialog modal-lg">
																																																				<div class="modal-content">
																																																								<div class="modal-header">
																																																												<h4 class="modal-title">Form Tambah Tiket</h4>
																																																												<button type="button" class="close" data-dismiss="modal"
																																																																aria-label="Close">
																																																																<span aria-hidden="true">&times;</span>
																																																												</button>
																																																								</div>

																																																								<form action="/admin/tickets" method="POST">
																																																												@csrf
																																																												@method('POST')

																																																												<div class="modal-body">
																																																																<div class="form-group row">
																																																																				<label for="airline_id"
																																																																								class="col-sm-2 col-form-label">Maskapai</label>
																																																																				<select name="airline_id" id="airline_id"
																																																																								class="form-control col-sm-10" required>
																																																																								<option selected value="" disabled>Pilih
																																																																												Maskapai
																																																																								</option>
																																																																								@foreach ($airlines as $airline)
																																																																												@if (old('airline_id') == $airline->id)
																																																																																<option value="{{ $airline->id }}"
																																																																																				selected>
																																																																																				{{ $airline->name }}</option>
																																																																												@else
																																																																																<option value="{{ $airline->id }}">
																																																																																				{{ $airline->name }}</option>
																																																																												@endif
																																																																								@endforeach
																																																																				</select>

																																																																</div>

																																																																<div class="form-group row">
																																																																				<label for="type_id"
																																																																								class="col-sm-2 col-form-label">Jenis:</label>
																																																																				<select name="type_id" id="type_id"
																																																																								class="form-control col-sm-10" required>
																																																																								<option selected value="" disabled>Pilih Jenis
																																																																								</option>
																																																																								@foreach ($types as $type)
																																																																												<option value="{{ $type->id }}">
																																																																																{{ $type->name }}
																																																																												</option>
																																																																								@endforeach
																																																																				</select>
																																																																</div>

																																																																<div class="form-group row">
																																																																				<label for="track_id"
																																																																								class="col-sm-2 col-form-label">Rute</label>
																																																																				<select name="track_id" id="track_id"
																																																																								class="form-control col-sm-10"0
																																																																								onchange="getSelectValue(this.value);" required>
																																																																								<option selected value="" disabled>Pilih Rute
																																																																								</option>
																																																																								@foreach ($tracks as $track)
																																																																												<option value="{{ $track->id }}">
																																																																																{{ $track->from_route }} -
																																																																																{{ $track->to_route }}
																																																																												</option>
																																																																								@endforeach
																																																																				</select>
																																																																</div>

																																																																<script type="text/javascript">
																																																																				function getSelectValue(pergi) {
																																																																								if (pergi != '') {
																																																																												$("#pulang option[value='" + pergi + "']").hide();
																																																																												$("#pulang option[value!='" + pergi + "']").show();
																																																																								}
																																																																				}

																																																																				function getSecondValue(pulang) {
																																																																								if (pulang != '') {
																																																																												$("#pergi option[value='" + pulang + "']").hide();
																																																																												$("#pergi option[value!='" + pulang + "']").show();
																																																																								}
																																																																				}
																																																																</script>

																																																																<div class="form-group row">
																																																																				<label for="inputName2"
																																																																								class="col-sm-2 col-form-label">Harga:</label>
																																																																				<input type="number" class="form-control col-sm-10"
																																																																								placeholder="Harga Baru" name='price'
																																																																								id='hargaadd' min="0">
																																																																				<label for="inputName2"
																																																																								class="col-sm-2 col-form-label">(Optional)</label>
																																																																</div>

																																																																@if (session('sameTicket'))
																																																																				<div class="alert alert-danger">
																																																																								{{ session('sameTicket') }}
																																																																				</div>
																																																																@endif
																																																												</div>


																																																												<div class="modal-footer">

																																																																<input type="submit" class="btn btn-success" name="submit"
																																																																				value="Submit" />

																																																												</div>
																																																								</form>
																																																				</div>

																																																</div>
																																												</div>
																																								</div>
																																				</div>
																																</div>
																																<!-- /.card-header -->
																																<div class="card-body">
																																				<table id="example1" class="table table-bordered table-striped">
																																								<thead>
																																												<tr>
																																																<th>Maskapai</th>
																																																<th>Pergi dari</th>
																																																<th>Tujuan ke</th>
																																																<th>Jenis</th>
																																																<th>Jumlah Harga</th>
																																																<th>Ubah Harga</th>
																																												</tr>
																																								</thead>
																																								<tbody>
																																												@foreach ($tickets as $ticket)
																																																<tr>
																																																				<td>{{ $ticket->airline->name }}</td>
																																																				<td>{{ $ticket->track->from_route }}</td>
																																																				<td>{{ $ticket->track->to_route }}</td>
																																																				<td>{{ $ticket->type->name }}</td>
																																																				<td>

																																																								@isset($ticket->price->price)
																																																												Rp {{ $ticket->price->price }}
																																																								@else
																																																												Not set yet
																																																								@endisset
																																																				</td>
																																																				<td>
																																																								<a button class='btn btn-success btn-xs' title='Ubah Harga'
																																																												data-toggle="modal" data-target="#modal-{{ $ticket->id }}"><i
																																																																class='fa fa-reply'></i></button></a>
																																																				</td>
																																																</tr>
																																																<div class="modal fade" id="modal-{{ $ticket->id }}">
																																																				<div class="modal-dialog modal-lg">
																																																								<div class="modal-content">
																																																												<div class="modal-header">
																																																																<h4 class="modal-title">Form Ubah Harga</h4>
																																																																<button type="button" class="close"
																																																																				data-dismiss="modal" aria-label="Close">
																																																																				<span aria-hidden="true">&times;</span>
																																																																</button>
																																																												</div>

																																																												<div class="modal-body">
																																																																<form action="/admin/prices/{{ $ticket->price->id }}"
																																																																				method="POST">
																																																																				@method('PUT')
																																																																				@csrf
																																																																				<div class="form-group row">
																																																																								<label for="inputName2"
																																																																												class="col-sm-2 col-form-label">Harga
																																																																												Lama:</label>

																																																																								<label for="inputName2"
																																																																												class="col-sm-2 col-form-label">
																																																																												@if ($ticket->price->price)
																																																																																{{ $ticket->price->price }}
																																																																												@else
																																																																																Not Set Yet
																																																																												@endif
																																																																								</label>
																																																																				</div>


																																																																				<div class="form-group row">
																																																																								<label for="inputName2"
																																																																												class="col-sm-2 col-form-label">Harga
																																																																												Baru:</label>
																																																																								<input type="number"
																																																																												class="col-sm-3 form-control col-sm-10"
																																																																												placeholder="Harga Baru" name='price'
																																																																												id='hargaadd' required>
																																																																				</div>

																																																																				<input type="submit" class="btn btn-success" />

																																																																</form>
																																																												</div>
																																																								</div>
																																																				</div>
																																																</div>
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
@endsection
