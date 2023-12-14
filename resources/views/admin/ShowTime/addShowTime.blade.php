@extends('layouts.admin')
@section('adminContent')
    <div class=" pt-4">
        <form method="POST" action="{{ route('show_times.store') }}">
            @csrf
            <h2 class="text-center mb-4">Schedule Details</h2>
            <a href="#" class="btn btn-primary mt-2 mx-5" onclick="addShow()">
                Add Show
                <i class="fa-solid fa-circle-plus" style="color: #99c1f1;"></i>
            </a>
            <div class="addShow--form container-fluid px-4">
                <div class="row show-detail">
                    <div class="col-md-4 mt-3">
                        <label for="movieName_1" class="form-label">Movie Name</label>
                        <div class="input-group">
                            <select name="movie_id[]" id="movieName" class="form-select" required>
                                <option disabled selected>- Select Movie -</option>
                                @foreach($movies as $movie)
                                    <option value="{{ $movie->id }}">{{ $movie->name }}</option>
                                @endforeach
                            </select>
                            <label class="input-group-text" for="movieName">
                                <i class="fas fa-film"></i>
                            </label>
                        </div>
                    </div>

                    <div class="col-md-4 mt-3">
                        <label for="branchName_1" class="form-label">Branch Name</label>
                        <div class="input-group">
                            <select name="branch[]" class="form-select branch">
                                <option selected disabled>- Select Branch -</option>
                                @foreach($branches as $branch)
                                    <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4 mt-3">
                        <label for="hallName_1" class="form-label">Select Hall: </label>
                        <div class="input-group">
                            <select name="hall_id[]" class="form-select mx-3 hall" id="hallName_1" required>
                                <option disabled selected>- Select Hall -</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4 mt-3">
                            <label for="date" class="form-label">Date</label>
                            <input type="text" class="form-control date_bs" name="date_bs[]" required>
                            <input type="date" class="form-control date_ad" name="date_ad[]" hidden required>
                    </div>

                    <div class="col-md-4 mt-3">
                        <label for="time" class="form-label">Time</label>
                        <input type="time" class="form-control" id="time" name="time[]" value="12:00" required>
                    </div>

                    <div class="col-md-4 mt-3">
                        <label for="#">Status</label>
                        <div class="form-check-container pl-3">
                            <div class="form-check">
                                <input class="form-check-input status" type="radio"
                                    value="Coming_soon"
                                    checked>
                                <label class="form-check-label" for="comingSoon">
                                    Coming Soon
                                </label>
                            </div>

                            <div class="form-check ">
                                    <input class="form-check-input status" type="radio"
                                           value="Showing_now">
                                    <label class="form-check-label" for="showingNow">
                                        Showing Now
                                    </label>
                            </div>

                            <div class="form-check">
                                    <input class="form-check-input status" type="radio" value="out">
                                    <label class="form-check-label" for="out">
                                        Out
                                    </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 text-right mt-5">
                        <div class="remove--container"></div>
                    </div>
                    <hr style="border: black 1px solid;" class="mt-2 d-flex justify-content-center w-75 mx-auto">
                </div>

            </div>
            <div class="mb-3 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        {{$errors}}
    </div>
    <script>
        let formCounter = 1;
        let newCounter = 1;

        var oldRow = document.querySelector('.show-detail');
        //for status
        var statusElements = document.querySelectorAll('.status');

        statusElements.forEach(function (statusElement) {
            statusElement.name = "status_" + formCounter;
        });
        //chaging branch and hall ids and onChange parameter
        oldRow.querySelector('.branch').id = "branchName_" + formCounter;
        oldRow.querySelector('.hall').id = "hallName_" + formCounter;

        // for Branch
        var branchElement = oldRow.querySelector('.branch');
        branchElement.id = "branchName_" + formCounter;

        branchElement.addEventListener('change', function (event) {
            var clickedBranchValue = event.target.value;
            var rowBranchId = event.target.id;
            hallSetup(clickedBranchValue, rowBranchId);
        });
        var oldRowDate = oldRow.querySelector('.date_bs');
        oldRowDate.id = "date_bs_" + 1;
        window.onload = function () {
            var mainInput = document.querySelector(".date_bs");
            mainInput.nepaliDatePicker();
        };

        function BSTOAD() {
            var nepaliDate = document.querySelector('.date_bs').value;
            var adDate = NepaliFunctions.BS2AD(nepaliDate);
            document.querySelector('.date_ad').value = adDate;
        }

        setInterval(() => {
            BSTOAD();
        }, 30);


        function addShow() {

            newCounter = newCounter + 1;
            var showForm = document.querySelector(".show-detail");


            var newShow = showForm.cloneNode(true);


            newShow.querySelector('.branch').id = "branchName_" + newCounter;
            newShow.querySelector('.hall').id = "hallName_" + newCounter;


            //create a delete button
            var deleteButtonContainer = document.createElement("div");
            deleteButtonContainer.classList.add("col-md-6", "delete-button-container");

            var deleteButton = document.createElement("a");
            deleteButton.href = "#";
            deleteButton.classList.add("btn", "btn-danger", "delete_button", "text-center");
            deleteButton.textContent = "Remove";

            deleteButtonContainer.appendChild(deleteButton);

            newShow.querySelector(".remove--container").appendChild(deleteButton);

            var form = document.querySelector(".addShow--form");
            form.appendChild(newShow);
            var branchElement = newShow.querySelector('.branch');
            branchElement.id = "branchName_" + newCounter;

            branchElement.addEventListener('change', function (event) {
                var clickedBranchValue = event.target.value;
                var rowBranchId = event.target.id;
                hallSetup(clickedBranchValue, rowBranchId);
            });


            //for date
            var newRowDate = newShow.querySelector('.date_bs');
            newRowDate.id = "date_bs_" + newCounter;
            initDatePicker(newShow);

            function newBSTOAD(newShow) {
                var nepaliDate = newShow.querySelector('.date_bs').value;
                var adDate = NepaliFunctions.BS2AD(nepaliDate);
                newShow.querySelector('.date_ad').value = adDate;
            }

            setInterval(() => {
                newBSTOAD(newShow);
            }, 30);

            //for status

            var statusElements = newShow.querySelectorAll('.status');

            statusElements.forEach(function (statusElement) {
                statusElement.name = "status_" + newCounter;
            });


            //Delete a row
            deleteButton.querySelector('.delete_button');
            deleteButton.addEventListener('click', function (event) {
                newShow.remove();
                e.preventDefault();
            });
        }


        function hallSetup(clickedBranchValue, rowBranchId) {
            console.log('clickedBranchValue:' + clickedBranchValue + ", rowBranchId" + rowBranchId)
            var parts = rowBranchId.split('_');
            var row = parts[1];
            var branchId = clickedBranchValue;

            var hallSelect = document.getElementById('hallName_' + row);

            // Remove existing options
            hallSelect.innerHTML = '<option disabled selected>- Select Hall -</option>';

            // Add new options based on the selected branch
            @foreach($branches as $branch)
            if ("{{ $branch->id }}" === branchId) {
                @foreach($branch->halls as $hall)
                var option = document.createElement("option");
                option.value = "{{ $hall->id }}";
                option.text = "{{ $hall->hall_name }}";
                hallSelect.add(option);
                @endforeach
            }



            @endforeach
        }

        function initDatePicker(newShow) {
            var mainInput = newShow.querySelector(".date_bs");
            mainInput.nepaliDatePicker();
        }


    </script>

@endsection
