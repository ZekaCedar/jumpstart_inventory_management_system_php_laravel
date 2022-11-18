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
                                        <h5>Supplier Details</h5>
                                        {{-- <span class="d-block m-t-5">use class <code>table</code> inside table
                                            element</span> --}}
                                        <button type="button" class="btn btn-info add-new"
                                            style="float: right; padding:5px 10px;" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal"><i class="fa fa-plus"></i>Supplier</button>
                                    </div>
                                    <div class="card-block table-border-style">
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Add New Supplier
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST"
                                                            action="{{ route('supplier#CreateSupplier')}}">
                                                            @csrf

                                                            <div class="input-group mb-3">
                                                                <input type="text" placeholder="Supplier Name"
                                                                    class="form-control @error('supplier_name') is-invalid @enderror"
                                                                    name="supplier_name"
                                                                    value="{{ old('supplier_name') }}" required
                                                                    autocomplete="supplier_name" autofocus>
                                                                @error('supplier_name')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>

                                                            <div class="input-group mb-3">
                                                                <select name="supplier_service" id="roleType"
                                                                    class="form-control"
                                                                    value="{{ old('supplier_service') }}" required
                                                                    autocomplete="supplier_service"
                                                                    style="color:rgb(175,179,184)">
                                                                    <option>Supplier Services</option>
                                                                    <option value="Bread & Bakery">Bread & Bakery
                                                                    </option>
                                                                    <option value="Breakfast & Cereal">Breakfast &
                                                                        Cereal</option>
                                                                    <option value="Cookies, Snacks & Candy">Cookies,
                                                                        Snacks & Candy</option>
                                                                    <option value="Frozen Foods">Frozen Foods</option>
                                                                    <option value="Grains, Pasta & Sides">Grains, Pasta
                                                                        & Sides</option>
                                                                    <option
                                                                        value="Miscellaneous – gift cards/wrap, batteries, etc.">
                                                                        Miscellaneous – gift cards/wrap, batteries, etc.
                                                                    </option>
                                                                    <option
                                                                        value="Paper Products – toilet paper, paper towels, tissues, paper plates/cups, etc.">
                                                                        Paper Products – toilet paper, paper towels,
                                                                        tissues, paper plates/cups, etc.</option>
                                                                    <option
                                                                        value="Cleaning Supplies – laundry detergent, dishwashing soap, etc.">
                                                                        Cleaning Supplies – laundry detergent,
                                                                        dishwashing soap, etc.</option>
                                                                    <option value="Face Mask">Face Mask</option>
                                                                    <option value="Health & Beauty">Health & Beauty
                                                                    </option>
                                                                    <option value="Mobile & Accessories">Mobile &
                                                                        Accessories
                                                                    </option>
                                                                </select>
                                                            </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Add
                                                            Supplier</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-responsive">

                                            <table id="datatable1" class="table table-hover table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Supplier Name <i class="fa fa-sort"></i></th>
                                                        <th>Supplier Services</th>
                                                        <th>Order Products</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($supplierData as $supplier)

                                                    <tr>
                                                        <td scope="row">{{ $loop->iteration }}</td>
                                                        <td>{{ $supplier->supplier_name }}</td>
                                                        <td>{{ $supplier->supplier_service }}</td>
                                                        <td style="text-align: center;"">
                                                    <a href=" {{ route('order#Order', $supplier->id ) }}" class="btn
                                                            btn-info add-new " style="padding:2px 10px; color:white;">
                                                            Order
                                                            </a>
                                                        <td>
                                                            {{-- <a href="#" class="view" title="View"
                                                                data-toggle="tooltip"><i
                                                                    class="material-icons">&#xE417;</i></a> --}}
                                                            <a href="#" title="Edit" data-toggle="tooltip">
                                                                <button type="button"
                                                                    class="btn btn-primary btn-sm editbtn1"
                                                                    value="{{ $supplier->id }}"
                                                                    style="border: 0; padding:0; color:inherit;  background:0;">
                                                                    <i style="margin-right: 0;"
                                                                        class="material-icons">&#xE254;</i>
                                                                </button>
                                                            </a>

                                                            <a href="{{ route('supplier#DeleteSupplier' , $supplier->id) }}"
                                                                class="delete" title="Delete" data-toggle="tooltip"><i
                                                                    class="material-icons">&#xE872;</i></a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>

                                            <!-- Start Edit Modal -->
                                            <div class="modal fade" id="editModal1" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Update
                                                                Supplier</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <form method="POST"
                                                                action="{{ route('supplier#UpdateSupplier')}}">
                                                                @csrf
                                                                @method('PUT')

                                                                <input type="hidden" name="supplier_id"
                                                                    id="supplier_id">

                                                                <div class="input-group mb-3">
                                                                    <input type="text" id="supplier_name"
                                                                        placeholder="Supplier Name" name="supplier_name"
                                                                        class="form-control" required>
                                                                </div>

                                                                <div class="input-group mb-3">
                                                                    <select name="supplier_service"
                                                                        id="supplier_service" class="form-control"
                                                                        required autocomplete="supplier_service"
                                                                        style="color:black">
                                                                        <option id="supplier_service">Supplier Services
                                                                        </option>
                                                                        <option value="Bread & Bakery">Bread & Bakery
                                                                        </option>
                                                                        <option value="Breakfast & Cereal">Breakfast &
                                                                            Cereal</option>
                                                                        <option value="Cookies, Snacks & Candy">Cookies,
                                                                            Snacks & Candy</option>
                                                                        <option value="Frozen Foods">Frozen Foods
                                                                        </option>
                                                                        <option value="Grains, Pasta & Sides">Grains,
                                                                            Pasta & Sides</option>
                                                                        <option
                                                                            value="Miscellaneous – gift cards/wrap, batteries, etc.">
                                                                            Miscellaneous – gift cards/wrap, batteries,
                                                                            etc.</option>
                                                                        <option
                                                                            value="Paper Products – toilet paper, paper towels, tissues, paper plates/cups, etc.">
                                                                            Paper Products – toilet paper, paper towels,
                                                                            tissues, paper plates/cups, etc.</option>
                                                                        <option
                                                                            value="Cleaning Supplies – laundry detergent, dishwashing soap, etc.">
                                                                            Cleaning Supplies – laundry detergent,
                                                                            dishwashing soap, etc.</option>
                                                                        <option value="Face Mask">Face Mask</option>
                                                                        <option value="Health & Beauty">Health & Beauty
                                                                        </option>
                                                                        <option value="Mobile & Accessories">Mobile &
                                                                            Accessories
                                                                        </option>
                                                                    </select>
                                                                </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Update
                                                                Supplier</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Edit Modal -->

                                            <!-- Pagination -->
                                            <div class="d-flex">
                                                {!! $supplierData->links() !!}
                                            </div>
                                            <!-- Pagination -->
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!-- [ basic-table ] end -->

                            <!-- [ basic-table ] start -->
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Product Details</h5>
                                        {{-- <span class="d-block m-t-5">use class <code>table</code> inside table
                                            element</span> --}}
                                        <button type="button" class="btn btn-info add-new"
                                            style="float: right; padding:5px 10px;" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal1"><i class="fa fa-plus"></i>Product</button>
                                    </div>
                                    <div class="card-block table-border-style">
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal1" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Add New Product
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" action="{{ route('product#CreateProduct')}}"
                                                            enctype="multipart/form-data">
                                                            @csrf

                                                            <div class="input-group mb-3">
                                                                <input type="text" placeholder="Product Name"
                                                                    class="form-control @error('product_name') is-invalid @enderror"
                                                                    name="product_name"
                                                                    value="{{ old('product_name') }}" required
                                                                    autocomplete="product_name" autofocus>
                                                                @error('product_name')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>

                                                            <div class="input-group mb-3">
                                                                <select name="product_supplier" id="roleType"
                                                                    class="form-control"
                                                                    value="{{ old('product_supplier') }}" required
                                                                    autocomplete="product_supplier" style="color:black">
                                                                    <option>Product Supplier</option>
                                                                    @foreach($supplierData as $supplier)
                                                                    <option style="color: black"
                                                                        value="{{ $supplier->supplier_name }}">{{
                                                                        $supplier->supplier_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="input-group mb-3">
                                                                <select name="product_category" id="roleType"
                                                                    class="form-control"
                                                                    value="{{ old('product_category') }}" required
                                                                    autocomplete="product_category" style="color:black">
                                                                    <option>Product Category</option>
                                                                    <option value="Bread & Bakery">Bread & Bakery
                                                                    </option>
                                                                    <option value="Breakfast & Cereal">Breakfast &
                                                                        Cereal</option>
                                                                    <option value="Cookies, Snacks & Candy">Cookies,
                                                                        Snacks & Candy</option>
                                                                    <option value="Frozen Foods">Frozen Foods</option>
                                                                    <option value="Grains, Pasta & Sides">Grains, Pasta
                                                                        & Sides</option>
                                                                    <option value="Miscellaneous">Miscellaneous – gift
                                                                        cards/wrap, batteries, etc.</option>
                                                                    <option value="Paper Products">Paper Products –
                                                                        toilet paper, paper towels, tissues, paper
                                                                        plates/cups, etc.</option>
                                                                    <option value="Cleaning Supplies">Cleaning Supplies
                                                                        – laundry detergent, dishwashing soap, etc.
                                                                    </option>
                                                                    <option value="Face Mask">Face Mask</option>
                                                                    <option value="Health & Beauty">Health & Beauty
                                                                    </option>
                                                                    <option value="Mobile & Accessories">Mobile &
                                                                        Accessories
                                                                    </option>
                                                                </select>
                                                            </div>

                                                            <div class="input-group mb-3">
                                                                <input type="text" placeholder="Product Type"
                                                                    class="form-control @error('product_type') is-invalid @enderror"
                                                                    name="product_type"
                                                                    value="{{ old('product_type') }}" required
                                                                    autocomplete="product_type" autofocus>
                                                                @error('product_type')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>

                                                            <div class="input-group mb-3">
                                                                <input type="number" step="0.01"
                                                                    placeholder="Product Price (RM)"
                                                                    class="form-control @error('product_price') is-invalid @enderror"
                                                                    name="product_price"
                                                                    value="{{ old('product_price') }}" required
                                                                    autocomplete="product_price" autofocus>
                                                                @error('product_price')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>

                                                            <input class="form-control" type="file" id="photo"
                                                                name="product_image">
                                                            <div style="text-align: center; margin:20px;">
                                                                <img id="imgPreview" src="" width="100px" height="100px"
                                                                    src="#" alt="pic" />
                                                            </div>
                                                            <script>
                                                                $(document).ready(() => {
                                                $("#photo").change(function () {
                                                    const file = this.files[0];
                                                    if (file) {
                                                        let reader = new FileReader();
                                                        reader.onload = function (event) {
                                                            $("#imgPreview")
                                                              .attr("src", event.target.result);
                                                        };
                                                        reader.readAsDataURL(file);
                                                    }
                                                });
                                            });
                                                            </script>


                                                            <input type="hidden" name="manager_id"
                                                                value="{{  Auth()->user()->id}}" />

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Add
                                                                    Product</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-hover table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Product Image</th>
                                                        <th>Product Name <i class="fa fa-sort"></i></th>
                                                        <th>Product Price (RM)</th>
                                                        <th>Product Type</th>
                                                        <th>Product Category</th>
                                                        <th>Product Supplier</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($productData as $product)
                                                    <tr>
                                                        <td scope="row">{{ $loop->iteration }}</td>
                                                        <td><img src="{{ asset('uploads/products/' . $product->product_image) }}"
                                                                width="100px" height="100px" alt="pic" /></td>
                                                        <td class="text-wrap" style="width: 6rem;">{{
                                                            $product->product_name }}</td>
                                                        <td>{{ $product->product_price }}</td>
                                                        <td>{{ $product->product_type }}</td>
                                                        <td class="text-wrap" style="width: 6rem;">{{
                                                            $product->product_category }}</td>
                                                        <td>{{ $product->product_supplier }}</td>
                                                        <td>
                                                            {{-- <a href="#" class="view" title="View"
                                                                data-toggle="tooltip"><i
                                                                    class="material-icons">&#xE417;</i></a> --}}

                                                            <a href="#" title="Edit" data-toggle="tooltip">
                                                                <button type="button"
                                                                    class="btn btn-primary btn-sm editbtn2"
                                                                    value="{{ $product->id }}"
                                                                    style="border: 0; padding:0; color:inherit;  background:0;">
                                                                    <i style="margin-right: 0;"
                                                                        class="material-icons">&#xE254;</i>
                                                                </button>
                                                            </a>

                                                            <a href="{{ route('product#DeleteProduct' , $product->id) }}"
                                                                class="delete" title="Delete" data-toggle="tooltip"><i
                                                                    class="material-icons">&#xE872;</i></a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>

                                            <!-- Pagination -->
                                            <div class="d-flex">
                                                {!! $productData->links() !!}
                                            </div>
                                            <!-- Pagination -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- [ basic-table ] end -->

                            <!-- Start Edit Product Modal -->
                            <div class="modal fade" id="editModal2" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Update Product</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="{{ route('product#UpdateProduct')}}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')

                                                <input type="hidden" name="product_id" id="product_id">

                                                <div class="input-group mb-3">
                                                    <input type="text" placeholder="Product Name" class="form-control"
                                                        id="product_name" name="product_name" required autofocus>
                                                </div>

                                                <div class="input-group mb-3">
                                                    <select name="product_supplier" id="product_supplier"
                                                        class="form-control" required autocomplete="product_supplier"
                                                        style="color:black">
                                                        <option>Product Supplier</option>
                                                        @foreach($supplierData as $supplier)
                                                        <option style="color: black"
                                                            value="{{ $supplier->supplier_name }}">{{
                                                            $supplier->supplier_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="input-group mb-3">
                                                    <select name="product_category" id="product_category"
                                                        class="form-control" required autocomplete="product_category"
                                                        style="color:black">
                                                        <option>Product Category</option>
                                                        <option value="Bread & Bakery">Bread & Bakery</option>
                                                        <option value="Breakfast & Cereal">Breakfast & Cereal</option>
                                                        <option value="Cookies, Snacks & Candy">Cookies, Snacks & Candy
                                                        </option>
                                                        <option value="Frozen Foods">Frozen Foods</option>
                                                        <option value="Grains, Pasta & Sides">Grains, Pasta & Sides
                                                        </option>
                                                        <option value="Miscellaneous">Miscellaneous – gift cards/wrap,
                                                            batteries, etc.</option>
                                                        <option value="Paper Products">Paper Products – toilet paper,
                                                            paper towels, tissues, paper plates/cups, etc.</option>
                                                        <option value="Cleaning Supplies">Cleaning Supplies – laundry
                                                            detergent, dishwashing soap, etc.</option>
                                                        <option value="Face Mask">Face Mask</option>
                                                        <option value="Health & Beauty">Health & Beauty
                                                        </option>
                                                        <option value="Mobile & Accessories">Mobile &
                                                            Accessories
                                                        </option>
                                                    </select>
                                                </div>

                                                <div class="input-group mb-3">
                                                    <input type="text" placeholder="Product Type" class="form-control"
                                                        id="product_type" name="product_type" required autofocus>
                                                </div>

                                                <label class="sr-only" for="inlineFormInputGroup">Product Price</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">RM</div>
                                                    </div>
                                                    <input type="number" step="0.01" placeholder="Product Price (RM)"
                                                        class="form-control" id="product_price" name="product_price"
                                                        required autocomplete="product_price" autofocus>
                                                </div>

                                                <input class="form-control" type="file" id="photo1"
                                                    name="product_image">
                                                <div style="text-align: center; margin:20px;">
                                                    <img id="imgPreview1" src="" width="100px" height="100px" src="#"
                                                        alt="pic" />

                                                </div>
                                                <script>
                                                    $(document).ready(() => {
                                            $("#photo1").change(function () {
                                                const file = this.files[0];
                                                if (file) {
                                                    let reader = new FileReader();
                                                    reader.onload = function (event) {
                                                        $("#imgPreview1")
                                                          .attr("src", event.target.result);
                                                    };
                                                    reader.readAsDataURL(file);
                                                }
                                            });
                                        });
                                                </script>

                                                <input class="form-control" type="hidden" id="product_image"
                                                    name="product_image">
                                                <div style="text-align: center; margin:20px;">

                                                    <input type="hidden" id="manager_id" name="manager_id"
                                                        value="{{  Auth()->user()->id}}" />

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Update
                                                            Product</button>
                                                    </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Edit Product Modal -->
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
    });

</script>

@endsection