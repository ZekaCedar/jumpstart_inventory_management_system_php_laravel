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
                                  <div class="card-header" >
                                      <h5>Supplier Details</h5>
                                    
                                  </div>
                                  <div class="card-block table-border-style">

                                    @if(count($products) > 0 )
                                    <section class="h-100 h-custom">
                                        <div class="container py-5 h-100">
                                          <div class="row d-flex justify-content-center align-items-center h-100">
                                            <div class="col-12">
                                              <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                                                <div class="card-body p-0">
                                                  <div class="row g-0">
                                                    <div class="col-lg-8">
                                                      <div class="p-5">
                                                        <div class="d-flex justify-content-between align-items-center mb-5">
                                                          
                                                        </div>
                                                        {{-- <hr class="my-4"> --}}
                                      
                                                        <div class="row mb-4 d-flex justify-content-between align-items-center">
                                                          <div class="col-md-2 col-lg-2 col-xl-2">
                                                            <img
                                                              src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-shopping-carts/img5.webp"
                                                              class="img-fluid rounded-3" alt="Cotton T-shirt">
                                                          </div>
                                                          <div class="col-md-3 col-lg-3 col-xl-3">
                                                            <h6 class="text-muted">Shirt</h6>
                                                            <h6 class="text-black mb-0">Cotton T-shirt</h6>
                                                          </div>
                                                          <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                                            <button class="btn btn-link px-2"
                                                              onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                              <i class="fas fa-minus"></i>
                                                            </button>
                                      
                                                            <input id="form1" min="0" name="quantity" value="1" type="number"
                                                              class="form-control form-control-sm" />
                                      
                                                            <button class="btn btn-link px-2"
                                                              onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                              <i class="fas fa-plus"></i>
                                                            </button>
                                                          </div>
                                                          <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                            <h6 class="mb-0">€ 44.00</h6>
                                                          </div>
                                                          <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                            <a href="#!" class="text-muted"><i class="fas fa-times"></i></a>
                                                          </div>
                                                        </div>
                                      
                                                        <hr class="my-4">
                                      
                                                        <div class="row mb-4 d-flex justify-content-between align-items-center">
                                                          <div class="col-md-2 col-lg-2 col-xl-2">
                                                            <img
                                                              src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-shopping-carts/img6.webp"
                                                              class="img-fluid rounded-3" alt="Cotton T-shirt">
                                                          </div>
                                                          <div class="col-md-3 col-lg-3 col-xl-3">
                                                            <h6 class="text-muted">Shirt</h6>
                                                            <h6 class="text-black mb-0">Cotton T-shirt</h6>
                                                          </div>
                                                          <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                                            <button class="btn btn-link px-2"
                                                              onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                              <i class="fas fa-minus"></i>
                                                            </button>
                                      
                                                            <input id="form1" min="0" name="quantity" value="1" type="number"
                                                              class="form-control form-control-sm" />
                                      
                                                            <button class="btn btn-link px-2"
                                                              onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                              <i class="fas fa-plus"></i>
                                                            </button>
                                                          </div>
                                                          <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                            <h6 class="mb-0">€ 44.00</h6>
                                                          </div>
                                                          <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                            <a href="#!" class="text-muted"><i class="fas fa-times"></i></a>
                                                          </div>
                                                        </div>
                                      
                                                        <hr class="my-4">
                                      
                                                        <div class="row mb-4 d-flex justify-content-between align-items-center">
                                                          <div class="col-md-2 col-lg-2 col-xl-2">
                                                            <img
                                                              src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-shopping-carts/img7.webp"
                                                              class="img-fluid rounded-3" alt="Cotton T-shirt">
                                                          </div>
                                                          <div class="col-md-3 col-lg-3 col-xl-3">
                                                            <h6 class="text-muted">Shirt</h6>
                                                            <h6 class="text-black mb-0">Cotton T-shirt</h6>
                                                          </div>
                                                          <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                                            <button class="btn btn-link px-2"
                                                              onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                              <i class="fas fa-minus"></i>
                                                            </button>
                                      
                                                            <input id="form1" min="0" name="quantity" value="1" type="number"
                                                              class="form-control form-control-sm" />
                                      
                                                            <button class="btn btn-link px-2"
                                                              onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                              <i class="fas fa-plus"></i>
                                                            </button>
                                                          </div>
                                                          <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                            <h6 class="mb-0">€ 44.00</h6>
                                                          </div>
                                                          <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                            <a href="#!" class="text-muted"><i class="fas fa-times"></i></a>
                                                          </div>
                                                        </div>
                                      
                                                        <hr class="my-4">
                                      
                                                        <div class="pt-5">
                                                          <h6 class="mb-0"><a href="#!" class="text-body"><i
                                                                class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a></h6>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="col-lg-4 bg-grey">
                                                      <div class="p-5">
                                                        <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                                                        <hr class="my-4">
                                      
                                                        <div class="d-flex justify-content-between mb-4">
                                                          <h5 class="text-uppercase">items 3</h5>
                                                          <h5>€ 132.00</h5>
                                                        </div>
                                      
                                                        <h5 class="text-uppercase mb-3">Shipping</h5>
                                      
                                                        <div class="mb-4 pb-2">
                                                          <select class="select">
                                                            <option value="1">Standard-Delivery- €5.00</option>
                                                            <option value="2">Two</option>
                                                            <option value="3">Three</option>
                                                            <option value="4">Four</option>
                                                          </select>
                                                        </div>
                                      
                                                        <h5 class="text-uppercase mb-3">Give code</h5>
                                      
                                                        <div class="mb-5">
                                                          <div class="form-outline">
                                                            <input type="text" id="form3Examplea2" class="form-control form-control-lg" />
                                                            <label class="form-label" for="form3Examplea2">Enter your code</label>
                                                          </div>
                                                        </div>
                                      
                                                        <hr class="my-4">
                                      
                                                        <div class="d-flex justify-content-between mb-5">
                                                          <h5 class="text-uppercase">Total price</h5>
                                                          <h5>€ 137.00</h5>
                                                        </div>
                                      
                                                        <button type="button" class="btn btn-dark btn-block btn-lg"
                                                          data-mdb-ripple-color="dark">Register</button>
                                      
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </section>
                                    @else
                                    <p>No record</p>
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



