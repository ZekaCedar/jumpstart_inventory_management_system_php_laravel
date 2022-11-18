@extends('users.employee.layouts.app')

@section('content')
@php
$total_stock = DB::table('stocks')->sum('stock_quantity');
$total_supplier = DB::table('suppliers')->count('id');
$total_customer = DB::table('customers')->count('id');
$total_employee = DB::table('employees')->count('id');
$total_sales = DB::table('sales')->sum('sales_total');
$total_orders = DB::table('orders')->count('id');

@endphp
<div class="pcoded-main-container">
  <div class="pcoded-wrapper">
    <div class="pcoded-content">
      <div class="pcoded-inner-content">
        <!-- [ breadcrumb ] start -->

        <!-- [ breadcrumb ] end -->
        <div class="main-body">
          <div class="page-wrapper">
            <!-- [ Main Content ] start -->
            <div class="row">
              <!--[ section ] start-->
              <div class="col-md-6 col-xl-4">
                <div class="card daily-sales">
                  <div class="card-block">
                    <h6 class="mb-4">Total Stocks</h6>
                    <div class="row d-flex align-items-center">
                      <div class="col-9">
                        <h3 class="f-w-300 d-flex align-items-center m-b-0"><i
                            class="feather icon-arrow-up text-c-green f-30 m-r-10"></i> {{ $total_stock }}</h3>
                      </div>

                      <div class="col-3 text-right">
                        <p class="m-b-0">{{ ($total_stock/10000)*100 }}%</p>
                      </div>
                    </div>
                    <div class="progress m-t-30" style="height: 7px;">
                      <div class="progress-bar progress-c-theme" role="progressbar"
                        style="width: <?php echo ($total_stock/100000)*100; ?>%;" aria-valuenow="60" aria-valuemin="0"
                        aria-valuemax="100"></div>
                    </div>
                  </div>
                </div>
              </div>
              <!--[ section ] end-->

              <!--[ section ] start-->
              <div class="col-md-6 col-xl-4">
                <div class="card daily-sales">
                  <div class="card-block">
                    <h6 class="mb-4">Total Customers</h6>
                    <div class="row d-flex align-items-center">
                      <div class="col-9">
                        <h3 class="f-w-300 d-flex align-items-center m-b-0"><i
                            class="feather icon-arrow-up text-c-green f-30 m-r-10"></i> {{ $total_customer }}</h3>
                      </div>

                      <div class="col-3 text-right">
                        <p class="m-b-0">{{ ($total_customer/100)*100 }}%</p>
                      </div>
                    </div>
                    <div class="progress m-t-30" style="height: 7px;">
                      <div class="progress-bar progress-c-theme" role="progressbar"
                        style="width: <?php echo ($total_customer/100)*100; ?>%;" aria-valuenow="60" aria-valuemin="0"
                        aria-valuemax="100"></div>
                    </div>
                  </div>
                </div>
              </div>
              <!--[ section ] end-->

              <!--[ section ] start-->
              <div class="col-md-6 col-xl-4">
                <div class="card daily-sales">
                  <div class="card-block">
                    <h6 class="mb-4">Total Sales (RM)</h6>
                    <div class="row d-flex align-items-center">
                      <div class="col-9">
                        <h3 class="f-w-300 d-flex align-items-center m-b-0"><i
                            class="feather icon-arrow-up text-c-green f-30 m-r-10"></i> {{ $total_sales }}</h3>
                      </div>

                      <div class="col-3 text-right">
                        <p class="m-b-0">{{ number_format(($total_sales/10000)*100 , 2 ) }}%</p>
                      </div>
                    </div>
                    <div class="progress m-t-30" style="height: 7px;">
                      <div class="progress-bar progress-c-theme" role="progressbar"
                        style="width: <?php echo ($total_sales/10000)*100; ?>%;" aria-valuenow="60" aria-valuemin="0"
                        aria-valuemax="100"></div>
                    </div>
                  </div>
                </div>
              </div>
              <!--[ section ] end-->

              <!--[ section ] start-->
              <div class="col-md-6 col-xl-4">
                <div class="card daily-sales">
                  <div class="card-block">
                    <h6 class="mb-4">Total Suppliers</h6>
                    <div class="row d-flex align-items-center">
                      <div class="col-9">
                        <h3 class="f-w-300 d-flex align-items-center m-b-0"><i
                            class="feather icon-arrow-up text-c-green f-30 m-r-10"></i> {{ $total_supplier }}</h3>
                      </div>

                      <div class="col-3 text-right">
                        <p class="m-b-0">{{ number_format(($total_supplier/10000)*100 , 2 ) }}%</p>
                      </div>
                    </div>
                    <div class="progress m-t-30" style="height: 7px;">
                      <div class="progress-bar progress-c-theme" role="progressbar"
                        style="width: <?php echo ($total_supplier/10000)*100; ?>%;" aria-valuenow="60" aria-valuemin="0"
                        aria-valuemax="100"></div>
                    </div>
                  </div>
                </div>
              </div>
              <!--[ section ] end-->

              <!--[ section ] start-->
              <div class="col-md-6 col-xl-4">
                <div class="card daily-sales">
                  <div class="card-block">
                    <h6 class="mb-4">Total Employees</h6>
                    <div class="row d-flex align-items-center">
                      <div class="col-9">
                        <h3 class="f-w-300 d-flex align-items-center m-b-0"><i
                            class="feather icon-arrow-up text-c-green f-30 m-r-10"></i> {{ $total_employee }}</h3>
                      </div>

                      <div class="col-3 text-right">
                        <p class="m-b-0">{{ number_format(($total_employee/10000)*100 , 2 ) }}%</p>
                      </div>
                    </div>
                    <div class="progress m-t-30" style="height: 7px;">
                      <div class="progress-bar progress-c-theme" role="progressbar"
                        style="width: <?php echo ($total_employee/10000)*100; ?>%;" aria-valuenow="60" aria-valuemin="0"
                        aria-valuemax="100"></div>
                    </div>
                  </div>
                </div>
              </div>
              <!--[ section ] end-->

              <!--[ section ] start-->
              <div class="col-md-6 col-xl-4">
                <div class="card daily-sales">
                  <div class="card-block">
                    <h6 class="mb-4">Total Orders</h6>
                    <div class="row d-flex align-items-center">
                      <div class="col-9">
                        <h3 class="f-w-300 d-flex align-items-center m-b-0"><i
                            class="feather icon-arrow-up text-c-green f-30 m-r-10"></i> {{ $total_orders }}</h3>
                      </div>

                      <div class="col-3 text-right">
                        <p class="m-b-0">{{ number_format(($total_orders/10000)*100 , 2 ) }}%</p>
                      </div>
                    </div>
                    <div class="progress m-t-30" style="height: 7px;">
                      <div class="progress-bar progress-c-theme" role="progressbar"
                        style="width: <?php echo ($total_orders/10000)*100; ?>%;" aria-valuenow="60" aria-valuemin="0"
                        aria-valuemax="100"></div>
                    </div>
                  </div>
                </div>
              </div>
              <!--[ section ] end-->

              <!--[ Recent Users ] start-->
              <div class="col-xl-8 col-md-6">
                <div class="card Recent-Users">
                  <div class="card-header">
                    <h5>Stock Status</h5>
                  </div>
                  <div class="card-block px-0 py-3">
                    <div class="table-responsive">
                      <table class="table table-hover">
                        <tbody>
                          @if(count($stockoutData) > 0 )
                          @foreach($stockoutData as $stockout)

                          <tr class="unread">
                            <td><img class="rounded-circle" style="width:40px;" src="assets/images/user/avatar-1.jpg"
                                alt="activity-user"></td>
                            <td>
                              <h6 class="mb-1 text-wrap">{{ $stockout->stock_product }}</h6>
                              <p class="m-0">{{ $stockout->stock_message }}</p>
                            </td>
                            <td>
                              <h6 class="text-muted"><i class="fas fa-circle text-c-green f-10 m-r-15"></i>{{
                                $stockout->created_at }}
                              </h6>
                            </td>
                            <td>
                              <a href="{{ route('stock#StockIndex')}}" class="label theme-bg2 text-white f-12">
                                Check Stock
                              </a>
                            </td>
                          </tr>
                          @endforeach
                          @else
                          No Stock Out Issue
                          @endif


                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <!--[ Recent Users ] end-->

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection