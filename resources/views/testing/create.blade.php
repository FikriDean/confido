@extends('layouts.main')

@section('container')

  <main>
    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
      <h2>Ticket Order</h2>
      <p class="lead">Please fill this form to order your ticket.</p>
    </div>

    <div class="row g-5">
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Posts Testing</h4>
        <form class="needs-validation mb-4" action="/testings" method="POST">
          @csrf

          <div class="row gy-3">
            <div class="col-md-6">
              <label for="body" class="form-label">Insert Body</label>
              <input type="text" class="form-control" name="body" id="body" placeholder="" required>
            </div>
          </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Add to database</button>
        </form>
      </div>
    </div>
  </main>

@endsection