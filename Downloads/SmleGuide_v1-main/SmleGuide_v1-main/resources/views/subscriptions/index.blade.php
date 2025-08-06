@extends('layouts.vertical', ['title' => 'Subscriptions'])

@section('content')
<style>
    #suggestion-box {
        max-height: 200px;
        overflow-y: auto;
    }

</style>
<div class="container-fluid">

    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-semibold m-0">Subscriptions</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-xl-12">
            <div class="card overflow-hidden">

                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h5 class="card-title mb-0">Subscription</h5>
                    </div>
                </div>
                {{-- <div class="d-flex justify-content-end flex-wrap gap-3 pt-3 px-3">
                    <a href="{{ route('courseFiles.create') }}" class="btn btn-outline-primary">
                Add Course file
                </a>
            </div> --}}


            <div class="card-body mt-0">

                {{-- <form method="GET" class="form-group" action="{{ route('userSubscription.index') }}"> --}}
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <label for="">User name</label>
                        <div class="position-relative">
                            <input type="text" name="name" value="{{ request('name') }}" class="form-control search-box name" placeholder="Search...">
                            <div class="name-suggestion-box list-group position-absolute w-100 z-3 d-none"></div>
                        </div>
                    </div>
                    {{-- <div>
                            <label for="">User Name</label>
                            <input type="search" class="form-control" name="name" value="{{ request('name') }}">
                </div> --}}
                <div>
                    <label for="">Course</label>
                    <div class="position-relative">
                        <input type="text" name="course" value="{{ request('course') }}" class="form-control search-box course" placeholder="Search...">
                        <div class="course-suggestion-box list-group position-absolute w-100 z-3 d-none"></div>
                    </div>

                </div>
                <div>
                    <label for="">Category</label>
                    <div class="position-relative">
                        <input type="text" name="category" value="{{ request('category') }}" class="form-control search-box category" placeholder="Search...">
                        <div class="category-suggestion-box list-group position-absolute w-100 z-3 d-none"></div>
                    </div>
                </div>
                <div>
                    <label for="">Date</label>
                    {{-- ?? '2025-06-02 to 2025-06-25' default date if pass --}}
                    <input type="text" class="form-control search-box daterange" name="daterange" id="daterange" name="daterange" value="{{ request('daterange')}} ">

                </div>
                <div class="align-items-center">
                    {{-- <label for="">Date</label> --}}
                    {{-- <button class="btn btn-outline-primary mt-3" type="submit" id="">Search</button> --}}
                </div>
            </div>


            {{-- </form> --}}

            <div class="table-responsive table-card mt-0">
                <table class="table table-borderless table-centered align-middle table-nowrap mb-0">
                    <thead class="text-muted table-light">
                        <tr>
                            <th scope="col" class="cursor-pointer">ID </th>
                            <th scope="col" class="cursor-pointer">User </th>
                            <th scope="col" class="cursor-pointer">Category </th>
                            <th scope="col" class="cursor-pointer">Course</th>
                            <th scope="col" class="cursor-pointer">File</th>
                            <th scope="col" class="cursor-pointer">Purchase Date</th>
                            <th scope="col" class="cursor-pointer">Expiry Date</th>
                            <th scope="col" class="cursor-pointer">Course Status</th>
                            <th scope="col" class="cursor-pointer">Status</th>
                            <th scope="col" class="cursor-pointer">Action</th>
                        </tr>
                    </thead>
                    <tbody id="list">
                        @include('subscriptions.partials.subscriptionList')
                    </tbody><!-- end tbody -->
                </table><!-- end table -->
            </div>
            <div class="mt-3">
                {{ $subscriptions->links() }}
            </div>
        </div>

    </div>
</div>
@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>



</div>
@endif



</div>
</div>
@endsection

@section('scripts')


<script src="https://apexcharts.com/samples/assets/stock-prices.js"></script>
@vite(['resources/js/pages/jobs-dashboard.init.js'])
@endsection

@push('js')

<script>
    const sorting = document.querySelector('.selectpicker');
    const commentSorting = document.querySelector('.selectpicker');
    const sortingchoices = new Choices(sorting, {
        placeholder: false
        , itemSelectText: ''
    });


    // Trick to apply your custom classes to generated dropdown menu
    let sortingClass = sorting.getAttribute('class');
    window.onload = function() {
        sorting.parentElement.setAttribute('class', sortingClass);
    }

</script>
<script>
    let inputName = null;

    function collectFilters() {
        return {
            name: $('input[name="name"]').val()
            , course: $('input[name="course"]').val()
            , category: $('input[name="category"]').val()
            , daterange: $('input[name="daterange"]').val()
            , activeInput: inputName
        };
    }

    $(document).ready(function() {
        // Live search on keyup
        $('.search-box').on('keyup', function() {
            inputName = $(this).attr('name');
            const query = $(this).val();
            const filters = collectFilters();

            if (query.length >= 2) {
                $.ajax({
                    url: "{{ route('userSubscription.suggestions') }}"
                    , method: 'GET'
                    , data: filters
                    , success: function(response) {
                        // 1. Update table
                        $('#list').html(response.html);

                        // 2. Update suggestions for this input only
                        const box = $("." + inputName + "-suggestion-box");
                        box.empty();

                        if (response.suggestions.length > 0) {
                            response.suggestions.forEach(item => {
                                box.append('<a href="#" class="list-group-item list-group-item-action">' + item + '</a>');
                            });
                            box.removeClass('d-none');
                        } else {
                            box.addClass('d-none');
                        }
                    }
                });
            } else {
                $("." + inputName + "-suggestion-box").addClass('d-none');
            }
        });

        // Handle suggestion click
        $(document).on('click', '.list-group-item', function(e) {
            e.preventDefault();
            const selectedText = $(this).text();

            const input = $(this).closest('.position-relative').find('.search-box');
            input.val(selectedText);

            inputName = input.attr('name'); // update global inputName

            // Manually re-trigger search after filling input
            // input.trigger('keyup');

            // Hide only the current box
            $(this).closest('.position-relative').find('.' + inputName + '-suggestion-box').addClass('d-none');
        });

        // Optional: hide suggestions when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.position-relative').length) {
                $('.name-suggestion-box, .course-suggestion-box, .category-suggestion-box').addClass('d-none');
            }
        });
    });

    $('#daterange').flatpickr({
        mode: 'range', // if using range selection
        dateFormat: 'Y-m-d', // or your preferred format
        onChange: function(selectedDates, dateStr, instance) {
            // console.log("Date changed:", dateStr); // formatted string
            // console.log("Start date:", selectedDates[0]); // JS Date object
            // console.log("End date:", selectedDates[1]); // if range

            if (selectedDates[0] && selectedDates[1]) {

                $('.search-box').keyup();
            }

        }
    });

</script>

@endpush
