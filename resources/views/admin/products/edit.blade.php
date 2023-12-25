@extends('admin.layout.master')
@section('content')
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Product</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Product</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('admin.product.update')}}"method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="product_id" value="{{encrypt($product->id)}}">
                <div class="card-body">
                  <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $product->name}}" placeholder="Enter Name">
                  </div>
                  <div class="form-group">
                    <label for="">price</label>
                    <input type="text" class="form-control" name="price" value="{{ $product->price}}" placeholder="price">
                  </div>
                  <div class="form-group">
                    <label for="">Category</label>
                    <select name="category_id" class="form-control">
                      <option value="">Select an Option</option>
                      @foreach ($categories as $category)
                         <option {{ $category->id == $product->category_id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      {{-- <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div> --}}
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="">Status</label>
                    <input type="radio" value="1" name="status"/>Active
                    <input type="radio" value="0" name="status"/>Inactive    
                  </div>
                  <div class="form-group">
                    <label for="">Is Favourite</label>
                    <input type="radio" value="1" name="is_favorite"/>Yes
                    <input type="radio" value="0" name="is_favorite"/>No
                  </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
@endsection    
 