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
                                        <h5>Stock Details</h5>
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
                                                        <th>Product <i class="fa fa-sort"></i></th>
                                                        <th>Selling Price</th>
                                                        <th>Purchase Price</th>
                                                        <th>Quantity</th>
                                                        <th>Location</th>
                                                        <th>Status</th>
                                                        <th class="text-wrap">Safety Stock</th>
                                                        <th class="text-wrap">Reorder Point</th>
                                                        <th class="text-wrap">Economic Order Quantity</th>
                                                        <th>Reorder?</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($stockData as $stock)
                                                    <tr>
                                                        <td scope="row">{{ $loop->iteration }}</td>
                                                        <td class="text-wrap">{{ $stock->stock_product }}</td>
                                                        <td>{{ $stock->selling_price }}</td>
                                                        <td>{{ $stock->purchase_price }}</td>
                                                        <td>{{ $stock->stock_quantity }}</td>
                                                        <td>{{ $stock->stock_location }}</td>
                                                        <td>{{ $stock->stock_message }}</td>
                                                        <td>

                                                            @php
                                                            // safety stock = (max. lead time - average lead time) *
                                                            // ave.product demand
                                                            // safety stock is the amount of reserve inventory stored in
                                                            // the facility
                                                            $max_lead_time = 8;
                                                            $ave_lead_time = 5;
                                                            $ave_product_demand = rand(1, ($stock->stock_quantity/2));
                                                            $safety_stock = ($max_lead_time - $ave_lead_time ) *
                                                            $ave_product_demand;
                                                            echo $safety_stock;
                                                            @endphp

                                                        </td>
                                                        <td>
                                                            @php
                                                            // reorder point = safety stock + (average consumption x
                                                            // lead time)
                                                            // reorder point identify the ideal time for a company to
                                                            // place an order with
                                                            // suppliers
                                                            $lead_time = 5;
                                                            $average_consumption = rand(1, ($stock->stock_quantity/2));
                                                            $reorder_point = $safety_stock + ($average_consumption *
                                                            $lead_time);
                                                            echo $reorder_point;
                                                            @endphp

                                                        </td>
                                                        <td>
                                                            @php
                                                            // EOQ when to place an order with a supplier and in what
                                                            // quantity
                                                            // EOQ = sqrt( ( ( 2 x cost of placing each order x annual
                                                            // demand ) / cost of storing ) )
                                                            $cost_placing_order = $stock->purchase_price;
                                                            $cost_storing = $stock->purchase_price * 10;
                                                            $annual_demand = 100;
                                                            $eoq = sqrt( (( 2*$cost_placing_order*$annual_demand ) /
                                                            $cost_storing ) );
                                                            echo number_format($eoq);
                                                            @endphp

                                                        </td>
                                                        @php
                                                        $supplier_id = DB::table('products')->where('id',
                                                        $stock->product_id)->value('supplier_id');
                                                        @endphp
                                                        <td style="text-align: center;"">
                                                            <a href=" {{ route('order#Order', $supplier_id ) }}"
                                                            class="btn btn-info add-new " style="padding:2px 10px;
                                                            color:white;">
                                                            Order
                                                            </a>
                                                        </td>

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