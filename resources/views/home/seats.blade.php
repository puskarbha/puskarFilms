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
        <h2>Branch: {{ $show->branch->name }}</h2>
        <h6>Hall: {{ $show->hall }}</h6>
        <h1>List of Seats</h1>

        {{$errors}}

        <ul class="seat--list">
            @foreach($seats as $seat)
                @php
                    $isBooked = in_array($seat->seat_name, $booked_seats->toArray());
                @endphp

                <li>
                    <button class="btn text-white {{ $isBooked ? 'btn-danger' : 'btn-success' }}"
                            {{ $isBooked ? 'disabled' : '' }}
                            onclick="toggleSeats(this, '{{ $seat->seat_name }}')"
                    >
                        {{ $seat->seat_name }}
                    </button>
                </li>
            @endforeach
        </ul>

        <form action="{{ route('seat_bookings.store') }}" method="POST" class="text-center">
            <input type="number" name="show_time_id" value="{{ $show->id }}" hidden>
            <div class="seat--form"></div>
            @csrf
            <button type="submit" class="btn bg_red rounded-0 border-0 w-25">Book</button>
        </form>
    </div>

    <script type='text/javascript' defer>
        const limit = 5;
        var count = 0;

        function toggleSeats(button, seat_no) {
            const formContainer = document.querySelector('.seat--form');
            const existingInput = document.getElementById(seat_no);

            if (!existingInput) {
                if (count < limit) {
                    var seat_input = document.createElement("input");
                    seat_input.type = "text";
                    seat_input.name = "seat[]";
                    seat_input.value = seat_no;
                    seat_input.id = seat_no;
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
