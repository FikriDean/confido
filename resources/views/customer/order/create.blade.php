@extends('layouts.main')

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

@section('container')
    <main>
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72"
                height="57">
            <h2>Ticket Order</h2>
            <p class="lead">Please fill this form to order your ticket.</p>
        </div>

        <div class="row g-5">
            {{-- <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary">Your cart</span>
        </h4>
        <ul class="list-group mb-3">
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Third item</h6>
              <small class="text-muted">Brief description</small>
            </div>
            <span class="text-muted">$5</span>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <span>Total (USD)</span>
            <strong>$20</strong>
          </li>
        </ul>
      </div> --}}
            <div class="col-md-2 col-sm-12"></div>
            <div class="col-md-8 col-sm-12">
                <h4 class="mb-3">Billing address</h4>
                <form class="needs-validation mb-4" action="/orders" method="POST">
                    @csrf

                    <div class="row g-3">
                        <div class="col-12">
                            <label for="pickup" class="form-label">Pickup</label>

                            <select name="from_route" class="form-select" id="pickup" required>
                                <option selected value="">--Choose Pickup--</option>

                                @foreach ($routeFrom as $rf)
                                    <option value="{{ $rf }}">
                                        {{ ucfirst($rf) }}
                                    </option>
                                @endforeach
                            </select>

                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="destination" class="form-label">Destination</label>

                            <select name="to_route" class="form-select" id="destination" required>
                                <option selected value="">--Choose Destination--</option>
                                @foreach ($routeTo as $rt)
                                    <option value="{{ $rt }}">
                                        {{ ucfirst($rt) }}
                                    </option>
                                @endforeach
                            </select>

                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="airline" class="form-label">Airline</label>

                            <select name="airline_id" class="form-select" id="airline" required>
                                <option selected value="">--Choose Airline--</option>
                                @foreach ($airlines as $airline)
                                    <option value="{{ $airline->id }}">
                                        {{ ucfirst($airline->name) }}
                                    </option>
                                @endforeach
                            </select>

                            {{-- @if (session()->has('price_check'))
                <div class="alert alert-success alert-dismissible fade show col-lg-12" role="alert">
                  {{ session('success') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif --}}

                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>

                        </div>

                        <div class="col-12 d-flex flex-column">
                            <label for="class">Airline Class</label>

                            <select name="type_id" class="form-select" id="airline_class" required>
                                <option selected value="">--Choose Airline Class--</option>
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}">
                                        {{ ucfirst($type->name) }}
                                    </option>
                                @endforeach
                            </select>

                            <h4 class="mb-3">Price: <span id="price_return"></span></h4>

                            <a id="checkPriceButton">check</a>

                            <a id="test">tset</a>
                        </div>



                        <div class="col-12 d-flex flex-column">
                            <label for="">Round Trip</label>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="round_trip" id="round_trip"
                                    value=false>
                                <label class="form-check-label" for="round_trip">No</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="round_trip" id="round_trip" value=true>
                                <label class="form-check-label" for="round_trip">Yes</label>
                            </div>
                        </div>

                        <div class="col-12 d-flex flex-column">
                            <label for="amount">Number of Tickets:</label>
                            <input type="number" id="amount" name="amount" step="1" min="1"
                                max="5">
                        </div>

                        <div class="col-12 d-flex flex-column">
                            <label for="class">Date - Flight Away</label>

                            <input type="date" class="form-control" id="go_date" name="go_date">

                        </div>

                        <div class="col-12 d-flex flex-column">
                            <label for="class">Date - Flight Home</label>

                            <input type="date" class="form-control" id="return_date" name="return_date">

                        </div>

                    </div>

                    <h4 class="my-3">Payment</h4>

                    <select name="method_id" id="method_id">
                        <option selected>Choose Payment Method: </option>
                        @foreach ($methods as $method)
                            <option value="{{ $method->id }}">{{ $method->method }}</option>
                        @endforeach
                    </select>

                    <div class="row gy-3">
                        <div class="col-md-6">
                            <label for="name_account" class="form-label">Name Account</label>
                            <input type="text" class="form-control" name="name_account" id="name_account"
                                placeholder="" required>
                            <small class="text-muted">Full name as displayed on card</small>
                            <div class="invalid-feedback">
                                Name on card is required
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="from_account" class="form-label">Account Number</label>
                            <input type="text" class="form-control" name="from_account" id="from_account"
                                placeholder="" required>
                            <div class="invalid-feedback">
                                Card number is required
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">

                    <button class="w-100 btn btn-primary btn-lg" type="submit">Purchase Tickets</button>
                </form>
            </div>
        </div>
    </main>
@endsection

<script>
    window.onload = init;

    function init() {
        const checkPriceButton = document.getElementById("checkPriceButton");
        const pickup = document.getElementById("pickup");
        const destination = document.getElementById("destination");
        const airline = document.getElementById("airline");
        const airline_class = document.getElementById("airline_class");
        const price_return = document.getElementById("price_return");
        const test = document.getElementById('test');

        checkPriceButton.addEventListener('click', function() {
            fetch(
                    `/checkprice?airline_id=${airline.value}&type_id=${airline_class.value}&from_route=${pickup.value}&to_route=${destination.value}`
                )
                .then(response => {
                    return response.json();
                })
                .then(res => {
                    test.innerHTML = res.price;
                })
                .catch(res => {
                    test.innerHTML = "Price cannot be loaded";
                })
        })
    }
</script>
