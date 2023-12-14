<h1>Seat booked!</h1>

@foreach($seatBookings as $seatBooking)
    <p>Date: {{$seatBooking->showTime->date_bs}}</p>
    <p>Time: {{$seatBooking->showTime->time}}</p>
    <p>Name: {{$user->name}}</p>
    <p>Branch: {{$seatBooking->hall->branch->name}}</p>
    <p>Hall: {{$seatBooking->hall->hall_name}}</p>
    <p>Seats:
        @foreach($seatBooking->seats as $seat)
            {{$seat->seat_name}}
        @endforeach
    </p>


@endforeach
<div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
    <div class="card-header">Header</div>
    <div class="card-body">
        <h5 class="card-title">Dark card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    </div>
</div>
