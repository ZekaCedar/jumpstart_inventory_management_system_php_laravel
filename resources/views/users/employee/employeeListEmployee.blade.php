@extends('users.employee.layouts.app')

@section('content')

<section class="pcoded-main-container">

    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <!-- [ breadcrumb ] start -->
                {{-- <div class="page-header">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="page-header-title">
                                    <h5 class="m-b-10">Bootstrap Basic Tables</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html"><i
                                                class="feather icon-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="#!">Tables</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:">Basic Tables</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- [ breadcrumb ] end -->
                <div class="main-body">

                    <div class="page-wrapper">
                        <!-- [ Main Content ] start -->
                        <div class="row">
                            <!-- [ basic-table ] start -->
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Employee Details</h5>
                                        {{-- <span class="d-block m-t-5">use class <code>table</code> inside table
                                            element</span> --}}
                                        {{-- <button type="button" class="btn btn-info add-new"
                                            style="float: right; padding:5px 10px;" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal"><i class="fa fa-plus"></i>Supplier</button>
                                        --}}
                                    </div>
                                    <div class="card-block table-border-style">

                                        <div class="table-responsive">

                                            <table id="datatable1" class="table table-hover table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Employee Name <i class="fa fa-sort"></i></th>
                                                        <th>Employee Email</th>
                                                        <th>Employee Contact</th>
                                                        <th>Employee Position</th>
                                                        <th>Employee Job Location</th>
                                                        <th>Employee Job Description</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($employeeData as $employee)
                                                    <tr>
                                                        <td scope="row"></td>
                                                        <td class="text-wrap">{{ $employee->employee_name }}</td>
                                                        <td class="text-wrap">{{ $employee->employee_email }}</td>
                                                        <td class="text-wrap">{{ $employee->employee_contact }}</td>
                                                        <td>{{ $employee->employee_job_title }}</td>
                                                        <td>{{ $employee->employee_job_location }}</td>
                                                        <td class="text-wrap">{{ $employee->employee_job_description }}
                                                        </td>
                                                        <td>
                                                            {{-- <a href=" #" class="view" title="View"
                                                                data-toggle="tooltip"><i
                                                                    class="material-icons">&#xE417;</i></a> --}}
                                                            <a href="#" title="Edit" data-toggle="tooltip">
                                                                <button type="button"
                                                                    class="btn btn-primary btn-sm editbtn"
                                                                    value="{{ $employee->id }}"
                                                                    style="border: 0; padding:0; color:inherit;  background:0;">
                                                                    <i style="margin-right: 0; margin-bottom:10px;"
                                                                        class="material-icons">&#xE254;</i>
                                                                </button>
                                                            </a>

                                                            <a href="{{ route('user#DeleteEmployee', $employee->id) }}"
                                                                class="delete" title="Delete" data-toggle="tooltip"><i
                                                                    class="material-icons">&#xE872;</i></a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>

                                            <!-- Start Edit Modal -->
                                            <div class="modal fade" id="editModal" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Update
                                                                Employee</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <form method="POST"
                                                                action="{{ route('user#UpdateEmployee') }}">
                                                                @csrf
                                                                @method('PUT')

                                                                <input type="hidden" name="employee_id"
                                                                    id="employee_id">

                                                                <div class="input-group mb-3">
                                                                    <input type="text" id="employee_name"
                                                                        placeholder="Employee Name" name="employee_name"
                                                                        class="form-control" required>
                                                                </div>

                                                                <div class="input-group mb-3">
                                                                    <input type="text" id="employee_email"
                                                                        placeholder="Employee Email"
                                                                        name="employee_email" class="form-control"
                                                                        required>
                                                                </div>

                                                                <div class="input-group mb-3">
                                                                    <input type="text" id="employee_contact"
                                                                        placeholder="Employee Contact"
                                                                        name="employee_contact" class="form-control"
                                                                        required>
                                                                </div>

                                                                <div class="input-group mb-3">
                                                                    <input type="text" id="employee_job_title"
                                                                        placeholder="Employee Position"
                                                                        name="employee_job_title" class="form-control"
                                                                        required>
                                                                </div>

                                                                <div class="input-group mb-3">
                                                                    <input type="text" id="employee_job_location"
                                                                        placeholder="Employee Job Location"
                                                                        name="employee_job_location"
                                                                        class="form-control" required>
                                                                </div>

                                                                <div class="input-group mb-3">
                                                                    <textarea type="text" id="employee_job_description"
                                                                        placeholder="Employee Job Description"
                                                                        name="employee_job_description"
                                                                        class="form-control" required></textarea>
                                                                </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Update
                                                                Employee</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Edit Modal -->

                                            <!-- Pagination -->
                                            <div class="d-flex">
                                                {!! $employeeData->links() !!}
                                            </div>
                                            <!-- Pagination -->
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!-- [ basic-table ] end -->

                        </div>
                        <!-- [ Main Content ] end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection

@section('scripts')

<script>
    $(document).ready(function () {
        $(document).on('click', '.editbtn', function () {
            var employee_id = $(this).val();
            // alert(supplier_id);
            $('#editModal').modal('show');

            $.ajax({
                type: "GET",
                url: "/editEmployee/"+employee_id,
                success: function (response) {
                    // console.log(response);
                    $('#employee_name').val(response.employee.employee_name);
                    $('#employee_email').val(response.employee.employee_email);
                    $('#employee_contact').val(response.employee.employee_contact);
                    $('#employee_job_title').val(response.employee.employee_job_title);
                    $('#employee_job_location').val(response.employee.employee_job_location);
                    $('#employee_job_description').val(response.employee.employee_job_description);
                    $('#employee_id').val(employee_id);
                }
            });
        });
    });

</script>

{{-- <script>
    $(document).ready(function () {
        $(document).on('click', '.editbtn2', function () {
            var product_id = $(this).val();
            // alert(supplier_id);
            $('#editModal2').modal('show');

            $.ajax({
                type: "GET",
                url: "/editProduct/"+product_id,
                success: function (response) {
                    // console.log(response);
                     $('#product_id').val(product_id);
                     $('#product_name').val(response.product.product_name);
                     $('#product_supplier').val(response.product.product_supplier);
                     $('#product_category').val(response.product.product_category);
                     $('#product_type').val(response.product.product_type);
                     $('#product_price').val(response.product.product_price);
                     $('#product_image').val(response.product.product_image);
                }
            });
        });
    });

</script> --}}

@endsection