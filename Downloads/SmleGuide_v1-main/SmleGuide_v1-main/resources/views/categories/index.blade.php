@extends('layouts.vertical', ['title' => 'Categories'])
@section('css')
    @vite([
        'node_modules/datatables.net-bs5/css/dataTables.bootstrap5.min.css',
        'node_modules/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css',
        'node_modules/datatables.net-keytable-bs5/css/keyTable.bootstrap5.min.css',
        'node_modules/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css',
        'node_modules/datatables.net-select-bs5/css/select.bootstrap5.min.css'
     ])
@endsection
@section('content')
<div class="container-fluid">

    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-semibold m-0">Categories</h4>
        </div>
        <div class="d-flex justify-content-end flex-wrap gap-3 pt-3 px-3">
                    <a href="{{ route('categories.create') }}" class="btn btn-outline-primary">
                        Add Categories
                    </a>
                </div>
    </div>

   

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Categories</h5>
                </div>
                
                <div class="card-body">
                    <table class="categoriesTable table table-striped dt-responsive nowrap table-striped w-100">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th> Name</th>
                                <th>Priority</th>
                                <th>Status</th>
                                <th>Created At</th>
                                {{-- <th></th>
                                <th>Privacy Change</th> --}}
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://apexcharts.com/samples/assets/stock-prices.js"></script>
@vite(['resources/js/pages/jobs-dashboard.init.js'])
<script>
    function confirmDeleteFile() {
        Swal.fire({
            title: 'Are you sure?',
            text: "Do you really want to delete this Category? This action cannot be undone.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                // Only submits the form if user confirms
                document.getElementById('delete-file-form').submit();
            }
        });
    }
</script>
@vite([ 'resources/js/pages/datatable.init.js'])
<script>
    $(document).ready(function () {
    $('.categoriesTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('categories.index') }}', // This uses Ziggy, see note below
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'name', name: 'name' },
            { data: 'priority', name: 'course.priority' },
            { data: 'status', name: 'status' },
            { data: 'created_at', name: 'created_at' },
            // { data: 'privacy', name: 'open_for_all_users' },
            // { data: 'privacy_change', name: 'privacy_change', orderable: false, searchable: false },
            { data: 'actions', name: 'actions', orderable: false, searchable: false },
        ],
        dom: 'Bfrtip',
        buttons: [
            { extend: 'csv', className: 'btn btn-sm btn-primary' },
            { extend: 'excel', className: 'btn btn-sm btn-success' },
            { extend: 'pdf', className: 'btn btn-sm btn-danger' },
            { extend: 'print', className: 'btn btn-sm btn-secondary' },
            { extend: 'colvis', className: 'btn btn-sm btn-info' }
        ],
        pageLength: 10,
        order: [[1, 'asc']],
        language: {
            paginate: {
                next: '<i class="mdi mdi-chevron-right"></i>',
                previous: '<i class="mdi mdi-chevron-left"></i>'
            },
            emptyTable: "No categories files found"
        }
    });
});
</script>
@endsection
