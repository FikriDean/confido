<form action="/admin/payments/{{ $payment->id }}" method="POST">
    @csrf
    @method('PUT')

    <label>order_id: {{ $payment->order_id }}</label>

    <br><br>

    <label>Done payment?</label>

    @if ($payment->status == true)
        <input type="checkbox" id="status" name="status" checked>
    @else
        <input type="checkbox" id="status" name="status">
    @endif



    <br><br>

    <input type="submit" value="Submit">
</form>