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
                                        <h5>Order Details</h5>
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
                                                        <th>Requestor<i class="fa fa-sort"></i></th>
                                                        <th>Location</th>
                                                        <th>Order Date</th>
                                                        <th class="text-wrap">Order Status</th>
                                                        <th>Order Total (RM)</th>
                                                        <th class="text-wrap">Order Quantity</th>
                                                        <th>Tracking No</th>
                                                        <th>Invoice</th>
                                                        <th class="text-wrap">In Inventory?</th>
                                                        {{-- <th>Actions</th> --}}
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($orderData as $order)
                                                    <tr>
                                                        <td scope="row">{{ $loop->iteration }}</td>
                                                        <td>{{ $order-> order_name}}</td>
                                                        <td>{{ $order-> order_location}}</td>
                                                        <td>{{ $order-> created_at}}</td>
                                                        <td style="text-align: center;">

                                                            @if($order -> order_message == 'Completed')
                                                            Completed
                                                            @else
                                                            <a href="#" class="view" title="View" data-toggle="tooltip">
                                                                <button type="button"
                                                                    class="btn btn-primary btn-sm statusbtn"
                                                                    value="{{ $order->id }}"
                                                                    style="border: 0; padding:0; color:inherit;  background:0;">
                                                                    <i style="margin-right: 0;"
                                                                        class="material-icons">&#xE417;</i>
                                                                </button>
                                                            </a>
                                                            @endif

                                                        </td>
                                                        <td>{{ $order-> order_total}}</td>
                                                        <td>{{ $order-> order_quantity}}</td>
                                                        <td>{{ $order-> tracking_no}}</td>
                                                        <td style="text-align: center;">
                                                            <a href="{{ route('order#ViewInvoice', $order->id)}}"
                                                                class="view" title="View" data-toggle="tooltip"><i
                                                                    class="material-icons">&#xE417;</i></a>
                                                        </td>

                                                        <td style="text-align: center;">
                                                            @if($order-> order_status == 0)
                                                            <a href="#" class="view" title="No" data-toggle="tooltip"><i
                                                                    class="fa fa-times" aria-hidden="true"></i></a>
                                                            @else
                                                            <a href="#" class="view" title="Yes" data-toggle="tooltip">
                                                                <i class="fa fa-check-circle" aria-hidden="true"></i>
                                                            </a>
                                                            @endif

                                                        </td>
                                                    </tr>

                                                    @endforeach
                                                </tbody>
                                            </table>

                                            <!-- Start Edit Modal -->
                                            <div class="modal fade" id="editStatus" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Order Status
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <form method="POST"
                                                                action="{{ route('order#UpdateOrder') }}">
                                                                @csrf
                                                                @method('PUT')

                                                                <input type="hidden" name="order_id" id="order_id">

                                                                {{--
                                                                <div class="input-group mb-3">
                                                                    <input type="text" id="order_message"
                                                                        placeholder="Order Status" class="form-control"
                                                                        readonly>
                                                                </div> --}}

                                                                <div class="input-group mb-3">
                                                                    <select name="order_message" id="order_message"
                                                                        class="form-control" required
                                                                        autocomplete="order_message"
                                                                        style="color:black">
                                                                        <option>Choose Order Status
                                                                        </option>
                                                                        <option value="Pending">Pending
                                                                        </option>
                                                                        <option value="Awaiting Payment">Awaiting
                                                                            Payment</option>
                                                                        <option value="Awaiting Fullfillment">Awaiting
                                                                            Fullfillment</option>
                                                                        <option value="Awaiting Shipment">Awaiting
                                                                            Shipment
                                                                        </option>
                                                                        <option value="Awaiting Pickup">Awaiting Pickup
                                                                        </option>
                                                                        <option value="Partially Shipped">Partially
                                                                            Shipped
                                                                        </option>
                                                                        <option value="Completed">Completed</option>
                                                                        <option value="Shipped">Shipped</option>
                                                                        <option value="Cancelled">Cancelled</option>
                                                                        <option value="Declined">Declined</option>
                                                                        <option value="Refunded">Refunded</option>
                                                                        <option value="Disputed">Disputed</option>
                                                                        <option value="Manual Verification Required">
                                                                            Manual Verification Required</option>
                                                                        <option value="Partially Refunded">Partially
                                                                            Refunded</option>
                                                                    </select>
                                                                </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>

                                                            <button type="submit" class="btn btn-primary">Update
                                                                Status</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Edit Modal -->

                                            <!-- Pagination -->
                                            <div class="d-flex">
                                                {!! $orderData->links() !!}
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
        $(document).on('click', '.statusbtn', function () {
            var order_id = $(this).val();
            // alert(supplier_id);
            $('#editStatus').modal('show');

            $.ajax({
                type: "GET",
                url: "/editOrder/"+order_id,
                success: function (response) {
                    // console.log(response);
                    $('#order_message').val(response.order.order_message);
                    $('#order_id').val(order_id);
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
    }); --}}

</script>

@endsection