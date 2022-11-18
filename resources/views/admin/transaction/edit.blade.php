<form action="/admin/transactions/{{ $transaction->id }}" method="POST">
    @csrf
    @method('PUT')

    <label>order_id: {{ $transaction->order->id }}</label>

    <br><br>

    <label>Done payment?</label>

    @if ($transaction->status == true)
        <input type="checkbox" id="status" name="status" checked>
    @else
        <input type="checkbox" id="status" name="status">
    @endif



    <br><br>

    <input type="submit" value="Submit">
</form>
