@extends('users.customer.layouts.app')

@section('content')

<div class="container-fluid">
  <div class="row" style="margin-left: 250px;">
    <div class="col-7" style="display: flex;justify-content: center;">
      <!-- Start Receipt Details -->

      <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3"
        style="border-style: solid;">
        <div class="row">
          <div class="col-xs-6 col-sm-6 col-md-6">
            <address>
              <strong>Jumpstart</strong>
              <br>
              {{ $salesData->sales_location }}
              <br>

              <br>
              {{-- <abbr title="Phone">P:</abbr> (213) 484-6829 --}}
            </address>
          </div>
          <div class="col-xs-6 col-sm-6 col-md-6 text-right">
            <p>
              <em>Date: {{ $salesData->created_at->format('d-m-Y') }}</em>
            </p>
            <p>
              <em>Receipt #: {{ $salesData->id }}</em>
            </p>
          </div>
        </div>
        <div class="row">
          <div class="text-center">
            <h1>Receipt</h1>
          </div>
          </span>
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Product</th>
                <th>#</th>
                <th class="text-center">Price</th>
                <th class="text-center">Total</th>
              </tr>
            </thead>
            <tbody>
              @php
              $total_line = 0;
              $total = 0;
              @endphp
              @foreach($salesItemData as $item)
              <tr>
                <td class="col-md-9 text-wrap"><em>{{ $item -> sales_item_name }}</em></h4>
                </td>
                <td class="col-md-1" style="text-align: center"> {{ $item -> sales_item_quantity }} </td>
                <td class="col-md-1 text-center">RM {{ $item -> sales_item_price }}</td>
                @php
                $total_line = $item -> sales_item_price * $item -> sales_item_quantity;
                @endphp
                <td class="col-md-1 text-center">RM {{ $total_line }}</td>
              </tr>
              @php $total += $item -> sales_item_price * $item -> sales_item_quantity;
              @endphp
              @endforeach
              <tr>
                <td>   </td>
                <td>   </td>
                <td class="text-right">
                  <p>
                    <strong>Subtotal: </strong>
                  </p>
                  <p>
                    <strong>Tax: </strong>
                  </p>
                </td>
                <td class="text-center">
                  <p>
                    <strong>RM {{ $total }}</strong>
                  </p>
                  <p>
                    <strong>RM @php
                      $tax = 8;
                      echo $tax;
                      @endphp</strong>
                  </p>
                </td>
              </tr>
              <tr>
                <td>   </td>
                <td>   </td>
                <td class="text-right">
                  <h4><strong>Total: </strong></h4>
                </td>
                <td class="text-center text-danger">
                  <h4><strong>RM @php
                      echo $total + $tax;
                      @endphp</strong></h4>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>



      <!-- End Receipt Details -->



    </div>

    <!-- Start Payment Success -->
    <div class="col-5 p-4">
      <!-- Content Start -->
      <table cellpadding="0" cellspacing="0" cols="1" bgcolor="#d7d7d7" align="center" style="max-width: 600px;">
        {{-- <tr bgcolor="#d7d7d7">
          <td height="50"
            style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
          </td>
        </tr> --}}

        <!-- This encapsulation is required to ensure correct rendering on Windows 10 Mail app. -->

        <tr>
          <td
            style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top; background:white;">
            <!-- Seperator Start -->
            <table cellpadding="0" cellspacing="0" cols="1" align="center" style="max-width: 600px; width: 100%;">
              <tr>
                <td height="30"
                  style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                </td>
              </tr>
            </table>
            <!-- Seperator End -->

            <!-- Generic Pod Left Aligned with Price breakdown Start -->
            <table align="center" cellpadding="0" cellspacing="0" cols="3" bgcolor="white" class="bordered-left-right"
              {{--
              style="border-left: 10px solid #d7d7d7; border-right: 10px solid #d7d7d7; max-width: 600px; width: 100%;">
              --}}
              <tr height="50">
                <td colspan="3"
                  style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                </td>
              </tr>
              <tr align="center">
                <td width="36"
                  style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                </td>
                <td class="text-primary"
                  style="color: #F16522; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                  <img src="http://dgtlmrktng.s3.amazonaws.com/go/emails/generic-email-template/tick.png" alt="GO"
                    width="50" style="border: 0; font-size: 0; margin: 0; max-width: 100%; padding: 0;">
                </td>
                <td width="36"
                  style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                </td>
              </tr>
              <tr height="17">
                <td colspan="3"
                  style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                </td>
              </tr>
              <tr align="center">
                <td width="36"
                  style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                </td>
                <td class="text-primary"
                  style="color: #F16522; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                  <h1
                    style="color: #F16522; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 30px; font-weight: 700; line-height: 34px; margin-bottom: 0; margin-top: 0;">
                    Payment received</h1>
                </td>
                <td width="36"
                  style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                </td>
              </tr>
              <tr height="30">
                <td colspan="3"
                  style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                </td>
              </tr>
              <tr align="left">
                <td width="36"
                  style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                </td>
                <td
                  style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                  <p
                    style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin: 0;">
                    @php
                    $name = DB::table('users')->where('id', $salesData->customer_id)->value('name');
                    // echo $user;
                    // echo $sales->customer_id;
                    @endphp
                    Hi ,&nbsp;{{ $name }}
                  </p>
                </td>
                <td width="36"
                  style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                </td>
              </tr>
              <tr height="10">
                <td colspan="3"
                  style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                </td>
              </tr>
              <tr align="left">
                <td width="36"
                  style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                </td>
                <td
                  style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                  <p
                    style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin: 0;">
                    Your transaction was successful!</p>
                  <br>
                  <p
                    style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin: 0; ">
                    <strong>Payment Details:</strong><br />

                    Amount: RM {{ $salesData -> sales_total }} <br />
                    {{-- Account: ${accountNumber}.<br /> --}}
                  </p>
                  <br>
                  {{-- <p
                    style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin: 0;">
                    We advise to keep this email for future reference.&nbsp;&nbsp;&nbsp;&nbsp;<br /></p> --}}
                </td>
                <td width="36"
                  style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                </td>
              </tr>
              <tr height="30">
                <td
                  style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                </td>
                <td
                  style="border-bottom: 1px solid #D3D1D1; color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                </td>
                <td
                  style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                </td>
              </tr>
              <tr height="30">
                <td colspan="3"
                  style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                </td>
              </tr>
              <tr align="center">
                <td width="36"
                  style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                </td>
                <td
                  style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                  {{-- <p
                    style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin: 0;">
                    <strong>Transaction reference: ${authorizationCode}</strong>
                  </p> --}}
                  <p
                    style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin: 0;">
                    Order date: {{ $salesData -> created_at }}</p>
                  <p
                    style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin: 0;">
                  </p>
                </td>
                <td width="36"
                  style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                </td>
              </tr>

              <tr height="50">
                <td colspan="3"
                  style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                </td>
              </tr>

            </table>
            <!-- Generic Pod Left Aligned with Price breakdown End -->
            <div class="buy d-flex justify-content-between align-items-center" style="padding: 10px 20px;">
              <a href="{{ url('generate-receipt/'.$salesData->id) }}" class="btn btn-warning"
                style="width: 150px;">Print
                Receipt</a>
              <a href="{{ route('customer#index')}}" class="btn btn-danger" style="width: 150px;">Back to Shopping</a>
            </div>
            <!-- Seperator Start -->
            <table cellpadding="0" cellspacing="0" cols="1" align="center" style="max-width: 600px; width: 100%;">
              <tr>
                {{-- <td height="50"
                  style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                </td> --}}
              </tr>
            </table>
            <!-- Seperator End -->

          </td>
        </tr>

      </table>
      <!-- Content End -->



    </div>
    <!-- End Payment Success -->

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