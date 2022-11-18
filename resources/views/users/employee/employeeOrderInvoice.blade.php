<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
  <div class="row">

    <div class="card">
      <div class="card-body">
        <div class="container mb-5 mt-3">
          <div class="row d-flex align-items-baseline">
            <div class="col-xl-9">
              <p style="color: #7e8d9f;font-size: 20px;">Invoice >> <strong>ID: #{{ $orderData->id
                  }}</strong></p>
            </div>
            <div class="col-xl-3 float-end">

            </div>
            <hr>
          </div>

          <div class="container">
            <div class="col-md-12">
              <div class="text-center">
                <i class="fab fa-mdb fa-4x ms-0" style="color:#5d9fc5 ;"></i>
                <h3 class="pt-0">Jumpstart</h3>
              </div>
            </div>

            <div class="row">

              <div class="col-xl-8">
                <ul class="list-unstyled">
                  <li class="text-muted">To: <span style="color:#5d9fc5 ;">{{ $orderData->order_name
                      }}</span></li>
                  <li class="text-muted">{{ $orderData->order_location }}</li>
                  {{-- <li class="text-muted">State, Country</li>
                  <li class="text-muted"><i class="fas fa-phone"></i> 123-456-789</li> --}}
                </ul>
              </div>
              <div class="col-xl-4">
                <h5 class="text-muted">Invoice</h5>
                <ul class="list-unstyled">
                  {{-- <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i>
                    <span class="fw-bold">ID:</span>#123-456
                  </li> --}}
                  <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                      class="fw-bold">Creation Date: </span>{{ $orderData->created_at }}</li>
                  <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                      class="me-1 fw-bold">Status:</span><span class="badge bg-warning text-black fw-bold">
                      {{ $orderData->order_message }}</span></li>
                </ul>
              </div>
            </div>

            <div class="row my-2 mx-1 justify-content-center">
              <table class="table table-striped table-borderless">
                <thead style="background-color:#84B0CA ;" class="text-white">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Description</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Unit Price</th>
                    <th scope="col">Amount</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                  $total = 0;
                  @endphp
                  @foreach($orderItemData as $item)
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    @php
                    $item_name = DB::table('products')->where('id',
                    $item->product_id)->value('product_name');

                    $total_line_item = $item -> order_item_quantity * $item -> order_item_price;
                    $total += $item -> order_item_quantity * $item -> order_item_price;
                    $shipping = number_format(8,2);
                    @endphp
                    <td>{{ $item_name }}</td>
                    <td>{{ $item -> order_item_quantity }}</td>
                    <td>RM&nbsp;{{ number_format($item -> order_item_price , 2) }}</td>
                    <td>RM&nbsp;{{ number_format($total_line_item, 2) }}</td>
                  </tr>
                  @endforeach
                </tbody>

              </table>
            </div>
            <div class="row">
              <div class="col-xl-8">
                <p class="ms-3">Add additional notes and payment information</p>

              </div>
              <div class="col-xl-3">
                <ul class="list-unstyled">
                  <li class="text-muted ms-3"><span class="text-black me-4">SubTotal</span>RM&nbsp;{{
                    $total }}
                  </li>
                  <li class="text-muted ms-3 mt-2"><span class="text-black me-4">Shipping</span>RM&nbsp;{{
                    $shipping }}
                  </li>
                </ul>
                <p class="text-black float-start"><span class="text-black me-3"> Total
                    Amount</span><span style="font-size: 25px;">@php
                    $final_total = $total + $shipping;
                    echo number_format($final_total, 2);
                    @endphp</span></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-xl-10">
                <p>Thank you for your purchase</p>
              </div>

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>