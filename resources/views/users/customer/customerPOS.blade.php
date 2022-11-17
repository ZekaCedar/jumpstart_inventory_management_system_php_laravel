@extends('users.customer.layouts.app')

@section('content')

<div class="container-fluid">
  <div class="row" style="margin-left: 250px;">
    <div class="col-7">
      <!-- Start Product Details -->
      @php $total = 0;
      $total_quantity = 0;
      @endphp
      <div class="row">
        @foreach($stockData as $item)
        <div class="col-md-4 mt-2">

          <div class="card ">
            <div class="card-body">
              <div class="card-img-actions">
                <img src="{{ asset('uploads/products/' . $item->stock_image ) }}" class="card-img img-fluid" width="90"
                  height="100" alt="">
              </div>
            </div>

            <div class="card-body bg-light text-center" style="padding:10px;">

              <div class="buy d-flex justify-content-between align-items-center">
                <div class="price text-success">
                  <h6 class="mt-4">RM {{ $item -> selling_price }}
                    </h5>
                </div>

                <form action="{{ route('cart#AddToCart') }}" method="POST">

                  @csrf

                  <input type="hidden" value="{{ $item -> stock_product }}" name="cart_item_name">

                  <input type="hidden" value="{{ $item -> selling_price }}" name="cart_item_price">

                  <input type="hidden" value="{{ $item -> product_id }}" name="product_id">

                  {{-- @php
                  $prod_id = $product->id;
                  @endphp --}}

                  <input type="hidden" value="" name="supplier_id">

                  <input type="hidden" value="{{ Auth()->user()->id }}" name="user_id">
                  <button type="submit" class="btn btn-danger mt-3" style="margin: 0; padding:5px; font-size:12px;"><i
                      class="fas fa-shopping-cart"></i>
                    Add to Cart</button>
                </form>
              </div>

            </div>
          </div>
        </div>
        @endforeach

      </div>


      <!-- End Product Details -->



    </div>

    <!-- Start Cart -->
    <div class="col-5 p-4" style="background: white; padding-right:0;">

      <table class="table table-responsive">
        <thead>
          <tr>

            <th scope="col">Product</th>
            <th scope="col">Price (RM)</th>
            <th scope="col">Qty</th>
            <th scope="col">Total (RM)</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>

          @if(count($carts) > 0 )

          @foreach($carts as $cart)
          <tr>
            @php
            $name = $cart->cart_item_name;
            @endphp

            <td class="text-wrap">@php
              echo substr($name, 0, 20);
              @endphp ...</td>
            <td>{{ $cart->cart_item_price }}</td>
            <td>
              <div class="input-group text-center mb-3" style="width: 100px;">
                <form action="{{ route ('cart#DecreaseQuantity' , $cart->id) }}" method="GET">

                  {{-- <input type="hidden" name="cart_id" id="cart_id"> --}}

                  <button type="submit" class="input-group-text changeQtybtn" style="padding:1px 10px;"
                    value="{{ $cart->id }}">-</button>
                </form>
                <input id=demoInput type="text" name="cart_item_quantity" class="form-control qty-input text-center"
                  value="{{ $cart->cart_item_quantity }}" style="height:28px; padding:0;" readonly>
                <form action="{{ route ('cart#IncreaseQuantity' , $cart->id) }}" method="GET">
                  <button type="submit" class="input-group-text changeQtybtn" style="padding:1px 8px;">+</button>
                </form>

              </div>
              {{-- <input type="hidden" class="prod_id" value="{{ $cart->product_id }}">
              {{-- <input id=demoInput type=number min=1 max=200 value="{{ $cart->cart_item_quantity }}">

              <form method="get">
                <input type="submit" name="button1" value="+" />

                <input type="submit" name="button2" value="-" />
              </form> --}}

              {{-- <button onclick="increment()">+</button>
              <button onclick="decrement()">-</button> --}}
              {{-- <script>
                function increment() {
                                  document.getElementById('demoInput').stepUp();
                              }
                              function decrement() {
                                  document.getElementById('demoInput').stepDown();
                              }
              </script> --}}

            </td>

            <td>
              @php
              $total_line_item = $cart->cart_item_price * $cart->cart_item_quantity;
              echo $total_line_item;
              @endphp
            </td>
            <td>
              <a href="{{ route('cart#DeleteCartItem' , $cart->id) }}" class="btn btn-danger btn-sm"
                style="padding:6px;">
                <i class="fa fa-times" style="margin-right: 0;"></i>
              </a>
            </td>
          </tr>
          @php $total += $cart->cart_item_price * $cart->cart_item_quantity;

          $total_quantity += $cart->cart_item_quantity;
          @endphp
          @endforeach
          @else
          <div class="alert alert-primary" role="alert">
            No product added
          </div>

          @endif

        </tbody>
      </table>

      <div class="row justify-content-between">
        <div class="col-4">
          <p class="mb-1"><b>Tax (RM)</b></p>
        </div>
        <div class="flex-sm-col col-auto">
          <p class="mb-1"><b>@php $tax = 8; @endphp 8.00 </b></p>
        </div>
      </div>
      <div class="row justify-content-between">
        <div class="col-4">
          <p class="mb-1"><b>Subtotal (RM)</b></p>
        </div>
        <div class="flex-sm-col col-auto">
          <p class="mb-1"><b>
              @php
              if(isset($total)){
              echo $total;
              $total_quantity;
              }else{
              echo $total = 0;
              echo $total_quantity=0;
              }
              @endphp
            </b></p>
        </div>
      </div>
      <div class="row justify-content-between">
        <div class="col-4">
          <p><b>Total (RM)</b>
          </p>
        </div>
        <div class="flex-sm-col col-auto">
          <p class="mb-1"><b>@php $final_total = $total + $tax; echo $final_total;
              @endphp </b></p>
        </div>
      </div>
      @include('users.customer.stripepaymodal')
      <button type="submit" class="btn btn-lg btn-block" data-toggle="modal" data-target="#StripeCardModal"
        style="background: rgb(99,91,255); color:white;">Pay with
        &nbsp;
        <img src="{{ asset('assets/images/stripe logo.png') }}" height="25"></button>

      <hr class="my-0">


    </div>
    <!-- End Cart -->

  </div>
</div>

<div class="container text-center">
  <div class="row">
    <div class="col">

    </div>


  </div>
</div>

<!-- [ basic-table ] end -->


</div>
<!-- [ Main Content ] end -->
</div>
</div>
</div>

@endsection

@section('scripts')

<script>
  $(document).ready(function () {
        $(document).on('click', '.changeQtybtn', function () {
            var cart_id = $(this).val();
            // alert(cart_id);
            // $('#editModal1').modal('show');

            $.ajax({
                type: "GET",
                url: "/editQuantity/"+cart_id,
                success: function (response) {
                    console.log(response);
                    // $('#supplier_name').val(response.supplier.supplier_name);
                    // $('#supplier_service').val(response.supplier.supplier_service);
                    // $('#supplier_id').val(supplier_id);
                }
            });
        });
    });

</script>

@endsection