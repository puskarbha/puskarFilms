@extends('layouts.home')
@section('homeContent')
    <style>
        .seat--list {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            row-gap: 20px;
        }
    </style>

    <div class="container text-center">
        <h2>Branch: {{ $show->hall->branch->name }}</h2>
        <h6>Hall: {{ $show->hall->hall_name }}</h6>
        <h1>List of Seats</h1>


        <ul class="seat--list">
            @foreach($seats as $seat)
                @php
                    $isBooked = in_array($seat->id, $booked_seats->toArray());
                @endphp

                <li>
                    <button class="btn text-white {{ $isBooked ? 'btn-danger' : 'btn-success' }}"
                            {{ $isBooked ? 'disabled' : '' }}
                            onclick="toggleSeats(this, '{{ $seat->id }}')"
                    >
                        {{ $seat->seat_name }}
                    </button>
                </li>
            @endforeach
        </ul>

        <form action="/seat_bookings" method="post" class="text-center">
            @csrf
            <label for="show_time_id"></label>
            <input type="number" name="show_time_id" id="show_time_id" value="{{ $show->id }}" hidden>
            <div class="seat--form"></div>
            <button type="submit" class="btn bg_red rounded-0 border-0 w-25">Book</button>
        </form>
        {{$errors}}
    </div>

    <script type='text/javascript' defer>
        const limit = 5;
        var count = 0;

        function toggleSeats(button, seat_id) {
            const formContainer = document.querySelector('.seat--form');
            const existingInput = document.getElementById(seat_id);

            if (!existingInput) {
                if (count < limit) {
                    var seat_input = document.createElement("input");
                    seat_input.type = "text";
                    seat_input.name = "seats[]";
                    seat_input.value = seat_id;
                    seat_input.id = seat_id;
                    seat_input.className = "form-control";

                    formContainer.appendChild(seat_input);
                    count++;

                    button.classList.toggle('btn-success');
                    button.classList.toggle('btn-primary');
                } else {
                    alert("Not more than 5 seats allowed");
                }
            } else {
                // Remove the input field
                formContainer.removeChild(existingInput);
                count--;

                button.classList.toggle('btn-success');
                button.classList.toggle('btn-primary');
            }
        }
    </script>


@endsection
