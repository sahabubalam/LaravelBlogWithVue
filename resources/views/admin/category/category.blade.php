@extends('admin.home')
@section('content')
<!-- page content -->
<div class="right_col" role="main">

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                   
                    <a href="#" class="btn btn-warning mb-1 mr-2" style="float:right;" data-toggle="modal" data-target="#exampleModal">Add New</a>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Category List</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Category Name</th>
                      <th>Action</th>
                      
                    </tr>
                  </thead>
                  <tbody>                
                        <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                          <td>
                            <a href="{{URL::to('edit/category/')}}" class="btn btn-sm btn-info">Edit</a>
                            <a href="{{URL::to('delete/category/')}}" class="btn btn-sm btn-danger" id="delete">Delete</a>
                          </td>                        
                        </tr>
                    </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        

             
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
       
      </div>
      <form method="post" action="{{URL::to('add/category')}}">
      @csrf
        <div class="modal-body">
          <div class="form-group">
            <label>Category Name</label>
            <input type="text" class="form-control" placeholder="Category" name="category_name">
          
          </div>
        
        </div>
      
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         
        </div>
      </form>
    </div>
  </div>
</div>

@endsection