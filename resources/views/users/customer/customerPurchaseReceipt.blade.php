<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
  <div class="row">
    <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
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
              <td class="col-md-9 text-wrap" style="word-wrap: break-word;"><em>{{ $item -> sales_item_name }}</em></h4>
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
  </div>