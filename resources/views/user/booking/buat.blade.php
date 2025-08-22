<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  @extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Booking Servis</h2>
   <form action="{{ route('user.booking.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="jenis_servis">Jenis Servis</label>
        <input type="text" name="jenis_servis" id="jenis_servis" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="tanggal_booking">Tanggal Booking</label>
        <input type="date" name="tanggal_booking" id="tanggal_booking" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="catatan">Catatan</label>
        <textarea name="catatan" id="catatan" class="form-control"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Kirim Booking</button>
</form>

</div>
@endsection

</body>
</html>