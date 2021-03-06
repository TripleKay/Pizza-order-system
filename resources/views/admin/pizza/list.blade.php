@extends('admin.layout.app')
@section('content')
<div class="content-wrapper">


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row mt-4">
          <div class="col-12">
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ Session::get('success')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            @endif
            <div class="card shadow-none">
              <div class="card-header">
                <button type="button" class="btn btn-outline-primary font-weight-bold mr-2">
                    Total - <span class="badge badge-danger"> {{ $pizzas->total() }}</span>
                  </button>
                <a href="{{ route('admin#addPizza') }}" class="btn btn-primary">
                   <i class="fas fa-plus-circle mr-2"></i> Add Pizza
                </a>
                <div class="card-tools d-flex">
                    <a href="{{ route('admin#downloadPizza') }}" class="btn btn-dark mr-2"><i class="fas fa-download mr-2"></i>Download CSV</a>
                    <form action="{{ route('admin#searchPizza') }}" method="GET">
                        @csrf
                        <div class="input-group my-0" style="width: 200px;">
                          <input type="text" name="search" class="form-control float-right" placeholder="Search">
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">
                              <i class="fas fa-search"></i>
                            </button>
                          </div>
                        </div>
                      </form>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover text-nowrap table-bordered">
                        <thead class="">
                          <tr>
                            <th>ID</th>
                            <th>Pizza Name</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Publish Status</th>
                            <th>Buy 1 Get 1 Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @if ($emptyStatus == 0)
                              <tr>
                                  <td colspan="8" class="text-danger text-center py-4">There is no data!</td>
                              </tr>
                          @else
                              @foreach ($pizzas as $item)
                              <tr>
                                  <td>{{ $item->pizza_id }}</td>
                                  <td>{{ $item->pizza_name }}</td>
                                  <td>{{ $item->category_id }}</td>
                                  <td>
                                  <img src="{{ asset('uploads/'.$item->image) }}" class="img-thumbnail" width="100px">
                                  </td>
                                  <td>{{ $item->price }} kyats</td>
                                  <td>
                                      @if ($item->publish_status == 1)
                                          Publish
                                      @elseif ($item->publish_status == 0)
                                          Unpublish
                                      @endif
                                  </td>
                                  <td>
                                      @if ($item->buy_one_get_one_status == 1)
                                          Yes
                                      @elseif ($item->buy_one_get_one_status == 0)
                                          No
                                      @endif
                                  </td>
                                  <td>
                                      <a href="{{ route('admin#editPizza',$item->pizza_id) }}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                                      <a href="{{ route('admin#infoPizza',$item->pizza_id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                                      <a href="{{ route('admin#deletePizza',$item->pizza_id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete...?')"><i class="fas fa-trash-alt"></i></a>
                                  </td>
                              </tr>
                              @endforeach
                          @endif

                        </tbody>
                      </table>
                </div>
                {{ $pizzas->links() }}
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
