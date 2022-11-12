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
                                      {{-- <span class="d-block m-t-5">use class <code>table</code> inside table element</span> --}}
                                      <button type="button" class="btn btn-info add-new" style="float: right; padding:5px 10px;" 
                                      data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-plus"></i>Supplier</button>
                                  </div>
                                  <div class="card-block table-border-style">
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add New Supplier</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                          </div>
                                          <div class="modal-body">
                                            <form method="POST" action="{{ route('supplier#CreateSupplier')}}">
                                              @csrf
                                          
                                          <div class="input-group mb-3">
                                              <input type="text" placeholder="Supplier Name" class="form-control @error('supplier_name') is-invalid @enderror" name="supplier_name" value="{{ old('supplier_name') }}" required autocomplete="supplier_name" autofocus>
                                              @error('supplier_name')
                                                  <span class="invalid-feedback" role="alert">
                                                      <strong>{{ $message }}</strong>
                                                  </span>
                                              @enderror
                                          </div>
                                
                                          <div class="input-group mb-3">
                                              <select name="supplier_service" id="roleType" class="form-control" value="{{ old('supplier_service') }}" required autocomplete="supplier_service"
                                              style="color:rgb(175,179,184)">
                                                  <option>Supplier Services</option>
                                                  <option value="Bread & Bakery">Bread & Bakery</option>
                                                  <option value="Breakfast & Cereal">Breakfast & Cereal</option>
                                                  <option value="Cookies, Snacks & Candy">Cookies, Snacks & Candy</option>
                                                  <option value="Frozen Foods">Frozen Foods</option>
                                                  <option value="Grains, Pasta & Sides">Grains, Pasta & Sides</option>
                                                  <option value="Miscellaneous – gift cards/wrap, batteries, etc.">Miscellaneous – gift cards/wrap, batteries, etc.</option>
                                                  <option value="Paper Products – toilet paper, paper towels, tissues, paper plates/cups, etc.">Paper Products – toilet paper, paper towels, tissues, paper plates/cups, etc.</option>
                                                  <option value="Cleaning Supplies – laundry detergent, dishwashing soap, etc.">Cleaning Supplies – laundry detergent, dishwashing soap, etc.</option>
                                                  <option value="Face Mask">Face Mask</option>
                                               </select>
                                          </div>
                                          
                                          {{-- <div class="form-group text-left">
                                              <div class="checkbox checkbox-fill d-inline">
                                                  <input type="checkbox" name="checkbox-fill-1" id="checkbox-fill-1" checked="">
                                                  <label for="checkbox-fill-1" class="cr"> Save Details</label>
                                              </div>
                                          </div> --}}
                                    
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Add Supplier</button>
                                          </div>
                                        </form>
                                        </div>
                                      </div>
                                    </div>
                                      <div class="table-responsive">
                                        
                                        <table class="table table-hover table-bordered">
                                          <thead>
                                              <tr>
                                                  <th>#</th>
                                                  <th>Supplier Name <i class="fa fa-sort"></i></th>
                                                  <th>Supplier Services</th>
                                                  <th>Actions</th>
                                              </tr>
                                          </thead>
                                          <tbody> 
                                            @foreach($supplierData as $supplier)
                                            
                                              <tr>
                                                  <td scope="row">{{ $loop->iteration }}</td>
                                                  <td>{{ $supplier->supplier_name }}</td>
                                                  <td>{{ $supplier->supplier_service }}</td>
                                                  <td>
                                                      <a href="#" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>
                                                      <a href="#" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                                      <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                                                  </td>
                                              </tr>
                                              @endforeach   
                                          </tbody>
                                        </table>
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
                                <div class="card-header" >
                                    <h5>Product Details</h5>
                                    {{-- <span class="d-block m-t-5">use class <code>table</code> inside table element</span> --}}
                                    <button type="button" class="btn btn-info add-new" style="float: right; padding:5px 10px;" 
                                    data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-plus"></i>Product</button>
                                </div>
                                <div class="card-block table-border-style">
                                  <!-- Modal -->
                                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Add New Product</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                          <form method="POST" action="">
                                            @csrf
                                        
                                        <div class="input-group mb-3">
                                            <input type="text" placeholder="Supplier Name" class="form-control @error('supplier_name') is-invalid @enderror" name="supplier_name" value="{{ old('supplier_name') }}" required autocomplete="supplier_name" autofocus>
                                            @error('supplier_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                              
                                        <div class="input-group mb-3">
                                            <select name="role" id="roleType" class="form-control" value="{{ old('role') }}" required autocomplete="role"
                                            style="color:rgb(175,179,184)">
                                                <option>Supplier Services</option>
                                                <option value="Bread & Bakery">Bread & Bakery</option>
                                                <option value="Breakfast & Cereal">Breakfast & Cereal</option>
                                                <option value="Cookies, Snacks & Candy">Cookies, Snacks & Candy</option>
                                                <option value="Frozen Foods">Frozen Foods</option>
                                                <option value="Grains, Pasta & Sides">Grains, Pasta & Sides</option>
                                                <option value="Miscellaneous – gift cards/wrap, batteries, etc.">Miscellaneous – gift cards/wrap, batteries, etc.</option>
                                                <option value="Paper Products – toilet paper, paper towels, tissues, paper plates/cups, etc.">Paper Products – toilet paper, paper towels, tissues, paper plates/cups, etc.</option>
                                                <option value="Cleaning Supplies – laundry detergent, dishwashing soap, etc.">Cleaning Supplies – laundry detergent, dishwashing soap, etc.</option>
                                                <option value="Face Mask">Face Mask</option>
                                             </select>
                                        </div>
                                        
                                        {{-- <div class="form-group text-left">
                                            <div class="checkbox checkbox-fill d-inline">
                                                <input type="checkbox" name="checkbox-fill-1" id="checkbox-fill-1" checked="">
                                                <label for="checkbox-fill-1" class="cr"> Save Details</label>
                                            </div>
                                        </div> --}}
                                  
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                          <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                      </form>
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
                                                <th>Product Price</th>
                                                <th>Product Category</th>
                                                <th>Product Supplier</th>
                                                <th>Order?</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Thomas Hardy</td>
                                                <td>Thomas Hardy</td>
                                                <td>89 Chiaroscuro Rd.</td>
                                                <td>89 Chiaroscuro Rd.</td>
                                                <td>89 Chiaroscuro Rd.</td>
                                                <td><button type="button" class="btn btn-info add-new" style="padding:2px 10px;"></i>Order</button></button></td>
                                                <td>
                                                    <a href="#" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>
                                                    <a href="#" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                                    <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                                                </td>
                                            </tr>
                                           
                                        </tbody>
                                      </table>
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