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
                      <th>Cat id </th>
                      <th>User Id</th>
                      <th>Title</th>
                      <th>Description</th>
                      <th>Image</th>
                      <th>Action</th>
                      
                    </tr>
                  </thead>
                  <tbody>  
                  @foreach($post as $row)              
                        <tr>
                        <td>{{$row->id}}</td>
                        <td>{{$row->cat_id}}</td>
                        <td>{{$row->user_id}}</td>
                        <td>{{$row->title}}</td>
                        <td>{{$row->description}}</td>
                        <td><img src="{{URL::to($row->image)}}" height="70px" width="80px;"></td>
                        
                          <td>
                            <a href="{{URL::to('edit/category/')}}" class="btn btn-sm btn-info">Edit</a>
                            <a href="{{URL::to('delete/category/')}}" class="btn btn-sm btn-danger" id="delete">Delete</a>
                          </td>                        
                        </tr>
                        @endforeach
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
      <form method="post" action="{{URL::to('add/post')}}" enctype="multipart/form-data">
      @csrf
        <div class="modal-body">
          <div class="form-group">
          <label>Category Name</label>
            <select class ="form-control" name="category_id">
                @foreach($category as $row)
                <option value="{{$row->id}}">{{$row->category_name}}</option>        
                @endforeach
                
            </select>
          </div>
          <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control" placeholder="Title" name="title">
          </div>
          <div class="form-group">
            <label>Description</label>
            <input type="text" class="form-control" placeholder="Description" name="description">
          </div>
          <div class="form-group">
            <label>Image</label>
            <input type="file" class="form-control" name="image">
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