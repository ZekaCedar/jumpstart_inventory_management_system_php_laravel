@extends('users.employee.layouts.app')

@section('content')

<style>
  .mt-50 {

    margin-top: 50px;
  }

  .mb-50 {

    margin-bottom: 50px;
  }



  .card {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0, 0, 0, .125);
    border-radius: .1875rem;
  }

  .card-img-actions {
    position: relative;
  }

  .card-body {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 1.25rem;
    text-align: center;
  }

  .card-img {

    width: 350px;
  }

  .star {
    color: red;
  }

  .bg-cart {
    background-color: orange;
    color: #fff;
  }

  .bg-cart:hover {

    color: #fff;
  }

  .bg-buy {
    background-color: green;
    color: #fff;
    padding-right: 29px;
  }

  .bg-buy:hover {

    color: #fff;
  }

  a {

    text-decoration: none !important;
  }
</style>


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
                  <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
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
                    <h5> Order Product From {{ $supplierData->supplier_name }}</h5>

                    <a style="float: right;" href="{{ URL::previous() }}" class="btn btn-warning"> <i
                        class="fas fa-arrow-left"></i> Go
                      Back</a>

                  </div>
                  <div class="card-block table-border-style">

                    @if(count($products) > 0 )

                    <div class="container text-center">
                      <div class="row">
                        <div class="col">
                          <!-- Start Product Details -->
                          <div class="container d-flex justify-content-center mt-50 mb-50" style="margin-top: 0;">
                            <div class="row">

                              @foreach($products as $product)
                              <div class="col-md-6 mt-2">
                                <div class="card ">
                                  <div class="card-body">
                                    <div class="card-img-actions">

                                      <img src="{{ asset('uploads/products/' . $product->product_image) }}"
                                        class="card-img img-fluid" width="96" height="150" alt="">
                                    </div>
                                  </div>

                                  <div class="card-body bg-light text-center">
                                    <div class="mb-2">
                                      <h6 class="font-weight-semibold mb-2">
                                        <a href="#" class="text-default mb-2" data-abc="true">{{ $product->product_name
                                          }}</a>
                                      </h6>

                                      {{-- <a href="#" class="text-muted" data-abc="true">Laptops & Notebooks</a> --}}
                                    </div>

                                    <h5 class="mb-0 font-weight-semibold" style="margin: 20px 0;">RM {{
                                      $product->product_price
                                      }}</h3>

                                      {{-- <div>
                                        <i class="fa fa-star star"></i>
                                        <i class="fa fa-star star"></i>
                                        <i class="fa fa-star star"></i>
                                        <i class="fa fa-star star"></i>
                                      </div>

                                      <div class="text-muted mb-3">34 reviews</div> --}}

                                      <form action="{{ route('cart#AddToCart') }}" method="POST">

                                        @csrf

                                        <input type="hidden" value="{{ $product->product_name
                                      }}" name="cart_item_name">

                                        <input type="hidden" value="{{ $product->product_price
                                      }}" name="cart_item_price">

                                        <input type="hidden" value="{{ $product->id
                                      }}" name="product_id">

                                        @php
                                        $prod_id = $product->id;
                                        @endphp

                                        <input type="hidden" value="{{ $supplierData->id
                                      }}" name="supplier_id">

                                        <input type="hidden" value="{{ Auth()->user()->id }}" name="user_id">

                                        <button type="submit" class="btn bg-cart" style="margin-top: 10px;"><i
                                            class="fa fa-cart-plus mr-2"></i> Add to cart</button>

                                      </form>

                                  </div>
                                </div>
                              </div>
                              @endforeach

                            </div>
                          </div>

                          <!-- End Product Details -->
                        </div>
                        <div class="col product_data">

                          <table class="table table-image">
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
                              @php $total = 0; @endphp
                              @foreach($carts as $cart)
                              <tr>
                                <td class="text-wrap">{{ $cart->cart_item_name }}</td>
                                <td>{{ $cart->cart_item_price }}
                                </td>
                                <td>

                                  <div class="input-group text-center mb-3" style="width: 150px;">
                                    <form action="{{ route ('cart#DecreaseQuantity' , $cart->id) }}" method="GET">
                                      <button type="submit" class="input-group-text">-</button>
                                    </form>
                                    <input id=demoInput type="text" name="cart_item_quantity"
                                      class="form-control qty-input text-center" value="{{ $cart->cart_item_quantity }}"
                                      style="height:38px;" readonly>
                                    <form action="{{ route ('cart#IncreaseQuantity' , $cart->id) }}" method="GET">
                                      <button type="submit" class="input-group-text">+</button>
                                    </form>

                                  </div>
                                  {{-- <input type="hidden" class="prod_id" value="{{ $cart->product_id }}">
                                  {{-- <input id=demoInput type=number min=1 max=200
                                    value="{{ $cart->cart_item_quantity }}">

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
                              @php $total += $cart->cart_item_price * $cart->cart_item_quantity; @endphp
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
                              <p class="mb-1"><b>Shipping (RM)</b></p>
                            </div>
                            <div class="flex-sm-col col-auto">
                              <p class="mb-1"><b>@php $shipping_price = 10; echo $shipping_price; @endphp </b></p>
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
                                  }else{
                                  echo $total = 0;
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
                              <p class="mb-1"><b>@php $final_total = $total + $shipping_price; echo $final_total;
                                  @endphp </b></p>
                            </div>
                          </div>

                          <button type="button" class="btn btn-primary btn-lg btn-block">Order</button>

                          <hr class="my-0">


                        </div>
                      </div>
                    </div>

                    @else
                    <div class="alert alert-primary" role="alert">
                      No record
                    </div>

                    @endif


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
  $.ajaxSetup({
    headers:{
      'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    }
  });

  $('.changeQuantity').click(function (e) { 
  e.preventDefault();

  var prod_id = $(this).closest('.product_data').find('.prod_id').val();
  var qty = $(this).closest('.product_data').find('.qty-input').val();
  data = {
    'prod_id':prod_id,
    'prod_qty':qty,
  }

  $.ajax({
    type: "POST",
    url: "/update-cart",
    data: data,
    success: function (response) {
      alert(response);
    }
  });
  
});
</script> --}}

@endsection