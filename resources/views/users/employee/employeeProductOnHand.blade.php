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
                                        <h5>Product On Hand</h5>
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
                                                        <th>Product Image <i class="fa fa-sort"></i></th>
                                                        <th>Product Name</th>
                                                        <th>Product Type</th>
                                                        <th>Product Category</th>
                                                        <th>Product Brand</th>
                                                        <th>Product Barcode</th>
                                                        <th>Stock Status</th>
                                                        {{-- <th>Actions</th> --}}
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($stockData as $stock)
                                                    <tr>
                                                        <td scope="row">{{ $loop->iteration }}</td>
                                                        <td class="text-wrap"><img
                                                                src="{{ asset('uploads/products/' . $stock->stock_image) }}"
                                                                width="100px" height="100px" alt="pic" /></td>
                                                        <td class="text-wrap">{{ $stock->stock_product }}</td>
                                                        <td>{{ $stock->stock_item_type }}</td>
                                                        <td>{{ $stock->stock_item_category }}</td>
                                                        <td>{{ $stock->stock_item_brand }}</td>
                                                        <td>{{ $stock -> stock_item_barcode }}</td>
                                                        <td>{{ $stock -> stock_message }}</td>
                                                        {{-- <td>
                                                            <a href=" #" class="view" title="View"
                                                                data-toggle="tooltip"><i
                                                                    class="material-icons">&#xE417;</i></a>
                                                            <a href="#" title="Edit" data-toggle="tooltip">
                                                                <button type="button"
                                                                    class="btn btn-primary btn-sm editbtn1" value=""
                                                                    style="border: 0; padding:0; color:inherit;  background:0;">
                                                                    <i style="margin-right: 0;"
                                                                        class="material-icons">&#xE254;</i>
                                                                </button>
                                                            </a>

                                                            <a href="" class="delete" title="Delete"
                                                                data-toggle="tooltip"><i
                                                                    class="material-icons">&#xE872;</i></a>
                                                        </td> --}}
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>



                                            <!-- Pagination -->
                                            <div class="d-flex">
                                                {!! $stockData->links() !!}
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

{{-- <script>
    $(document).ready(function () {
        $(document).on('click', '.editbtn1', function () {
            var supplier_id = $(this).val();
            // alert(supplier_id);
            $('#editModal1').modal('show');

            $.ajax({
                type: "GET",
                url: "/editSupplier/"+supplier_id,
                success: function (response) {
                    // console.log(response);
                    $('#supplier_name').val(response.supplier.supplier_name);
                    $('#supplier_service').val(response.supplier.supplier_service);
                    $('#supplier_id').val(supplier_id);
                }
            });
        });
    });

</script>

<script>
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
    }); --}}

</script>

@endsection