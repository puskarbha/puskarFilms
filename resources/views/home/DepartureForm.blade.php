@extends('layouts.home')
@section('homeContent')

    <div class="container m-5 mx-auto">
        <form action="" method="Post">
            <div class="row">
                <div class="col-md-6">
                    <h5>Departure Mode</h5>
                    <label for="airDeparture">Air</label>
                    <input type="radio" name="departureMode" value="Air" id="airDeparture">
                    <label for="vehicleDeparture">Vehicle</label>
                    <input type="radio" name="departureMode" value="Vehicle" id="vehicleDeparture">
                </div>
                <div class="col-md-6">
                    <h5>Arrival Mode</h5>
                    <label for="airArrival">Air</label>
                    <input type="radio" name="arrivalMode" value="Air" id="airArrival">
                    <label for="vehicleArrival">Vehicle</label>
                    <input type="radio" name="arrivalMode" value="Vehicle" id="vehicleArrival">
                </div>
            </div>
            <div class="departureSection airDeparture d-none">
                <h1>Departure Through Air</h1>
                <div class="col-md-3">
                    <label for="AirDepartureDateTime">Departure Date</label>
                    <input type="datetime-local" name="AirDepartureDateTime" id="AirDepartureDateTime">
                </div>
                <div class="row mt-4 airArrival d-none">
                    <div class="col-md-3 ">
                        <h5> Arrival Through Air</h5>
                    </div>
                    <div class="col-md-3">
                        <label for="AirToAirDateTime">Arrival Date </label>
                        <input type="datetime-local" placeholder="arrival date" name="AirToAirDateTime"
                               id="AirToAirDateTime">
                    </div>
                    <div class="col-md-3">
                        <label for="AirToAirDays">Days</label>
                        <input type="number" placeholder="days" name="AirToAirDays" id="AirToAirDays">
                    </div>
                </div>

                <div class="row mt-4 vehicleArrival d-none">
                    <div class="col-md-3 ">
                        <h5> Arrival Through Vehicle</h5>
                    </div>
                    <div class="col-md-3">
                        <label for="AirToVehicleDateTime">Arrival Date </label>
                        <input type="datetime-local" placeholder="arrival date" name="AirToVehicleDateTime"
                               id="AirToVehicleDateTime">
                    </div>
                    <div class="col-md-3">
                        <label for="AirToVehicleDays">Days</label>
                        <input type="number" placeholder="days" name="AirToVehicleDays" id="AirToVehicleDays">
                    </div>
                </div>

            </div>
            <div class="departureSection vehicleDeparture d-none">
                <h1>Departure Through Vehicle</h1>
                <div class="col-md-3">
                    <label for="VehicleDepartureDateTime">Departure Date</label>
                    <input type="datetime-local" name="VehicleDepartureDateTime" id="VehicleDepartureDateTime">
                </div>
                <div class="row mt-4 airArrival  d-none">
                    <div class="col-md-3 ">
                        <h5> Arrival Through Air</h5>
                    </div>
                    <div class="col-md-3">
                        <label for="VehicleToAirDateTime">Arrival Date </label>
                        <input type="datetime-local" placeholder="arrival date" name="VehicleToAirDateTime"
                               id="VehicleToAirDateTime">
                    </div>
                    <div class="col-md-3">
                        <label for="VehicleToAirDays">Days</label>
                        <input type="number" placeholder="days" name="VehicleToAirDays" id="VehicleToAirDays">
                    </div>
                </div>

                <div class="row mt-4 vehicleArrival d-none">
                    <div class="col-md-3 ">
                        <h5> Arrival Through Vehicle</h5>
                    </div>
                    <div class="col-md-3">
                        <label for="VehicleToVehicleDateTime">Arrival Date </label>
                        <input type="datetime-local" placeholder="arrival date" name="VehicleToVehicleDateTime"
                               id="VehicleToVehicleDateTime">
                    </div>
                    <div class="col-md-3">
                        <label for="VehicleToVehicleDays">Days</label>
                        <input type="number" placeholder="days" name="VehicleToVehicleDays" id="VehicleToVehicleDays">
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            // Get NodeList of radio inputs with name 'departureMode'
            const departureRadioInputs = document.getElementsByName('departureMode');

            // Loop through each radio input and add the event listener
            departureRadioInputs.forEach(function (radioInput) {
                radioInput.addEventListener('change', function () {
                    console.log('Triggered');

                    if (document.getElementById('airDeparture').checked) {
                        document.getElementsByClassName('airDeparture')[0].classList.remove('d-none');
                        document.getElementsByClassName('airDeparture')[0].classList.add('d-block');
                        document.getElementsByClassName('vehicleDeparture')[0].classList.add('d-none');
                    }
                    if (document.getElementById('vehicleDeparture').checked) {
                        document.getElementsByClassName('vehicleDeparture')[0].classList.remove('d-none');
                        document.getElementsByClassName('vehicleDeparture')[0].classList.add('d-block');
                        document.getElementsByClassName('airDeparture')[0].classList.add('d-none');
                    }
                });
            });
            const arrivalRadioInputs = document.getElementsByName('arrivalMode');

            arrivalRadioInputs.forEach(function (radioInput) {
                radioInput.addEventListener('change', function () {
                    console.log('Triggered arrival radio');
                    const vehicleArrivalElements = document.getElementsByClassName('vehicleArrival');
                    const airArrivalElements = document.getElementsByClassName('airArrival');
                    if (document.getElementById('airArrival').checked) {
                        for (let i = 0; i < airArrivalElements.length; i++) {
                            airArrivalElements[i].classList.remove('d-none');

                        }
                        for (let i = 0; i < vehicleArrivalElements.length; i++) {
                            vehicleArrivalElements[i].classList.add('d-none');
                        }
                    }
                    if (document.getElementById('vehicleArrival').checked) {
                        for (let i = 0; i < vehicleArrivalElements.length; i++) {
                            vehicleArrivalElements[i].classList.remove('d-none');


                        }
                        for (let i = 0; i < airArrivalElements.length; i++) {

                            airArrivalElements[i].classList.add('d-none');
                        }
                    }
                });
            });
            // Function to calculate the difference in days using Carbon
            function calculateDateDifference(startDateString, endDateString) {
                const startDate = new Date(startDateString);
                const endDate = new Date(endDateString);

                const timeDifference = endDate.getTime() - startDate.getTime();

                const daysDifference = timeDifference / (1000 * 3600 * 24);

                return Math.floor(daysDifference);
            }

            function validateDate(departureDate, arrivalDate) {
                return new Date(departureDate) < new Date(arrivalDate);
            }

            document.getElementById('AirToAirDateTime').addEventListener('change', function () {
                const ArrivalDateValue = this.value;
                const DepartureDateValue = document.getElementById('AirDepartureDateTime').value;
                if (validateDate(DepartureDateValue, ArrivalDateValue)) {
                    const daysDifference = calculateDateDifference(DepartureDateValue, ArrivalDateValue);
                    console.log('The c1 day diff is: ' + daysDifference);
                    document.getElementById('AirToAirDays').value = daysDifference;
                } else {
                    alert("Arrival Date must be grater than Departure Date.");
                    this.value = '';
                }
            });

            document.getElementById('AirToVehicleDateTime').addEventListener('change', function () {
                const ArrivalDateValue = this.value;
                const DepartureDateValue = document.getElementById('AirDepartureDateTime').value;
                if (validateDate(DepartureDateValue, ArrivalDateValue)) {
                    const daysDifference = calculateDateDifference(DepartureDateValue, ArrivalDateValue);
                    console.log('The c1 day diff is: ' + daysDifference);
                    document.getElementById('AirToVehicleDays').value = daysDifference;
                } else {
                    alert("Arrival Date must be grater than Departure Date.");
                    this.value = '';
                }
            });

            document.getElementById('VehicleToAirDateTime').addEventListener('change', function () {
                const ArrivalDateValue = this.value;
                const DepartureDateValue = document.getElementById('VehicleDepartureDateTime').value;
                if (validateDate(DepartureDateValue, ArrivalDateValue)) {
                    const daysDifference = calculateDateDifference(DepartureDateValue, ArrivalDateValue);
                    console.log('The c1 day diff is: ' + daysDifference);
                    document.getElementById('VehicleToAirDays').value = daysDifference;
                } else {
                    alert("Arrival Date must be grater than Departure Date.");
                    this.value = '';
                }
            });

            document.getElementById('VehicleToVehicleDateTime').addEventListener('change', function () {
                const ArrivalDateValue = this.value;
                const DepartureDateValue = document.getElementById('VehicleDepartureDateTime').value;
                if (validateDate(DepartureDateValue, ArrivalDateValue)) {
                    const daysDifference = calculateDateDifference(DepartureDateValue, ArrivalDateValue);
                    console.log('The c1 day diff is: ' + daysDifference);
                    document.getElementById('VehicleToVehicleDays').value = daysDifference;
                } else {
                    alert("Arrival Date must be grater than Departure Date.");
                    this.value = '';
                }
            });
        });
    </script>
@endsection

