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
            <div class="card">
              <div class="card-header">

                <a href="{{ route('admin#addPizza') }}" class="btn btn-primary">
                   <i class="fas fa-plus mr-2"></i> Add Pizza
                </a>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap text-center">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Pizza Name</th>
                      <th>Cateogory</th>
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
                            <td colspan="8" class="text-danger py-4">There is no data!</td>
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
                            <td>{{ $item->price }}kyats</td>
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
                                <a href="{{ route('admin#deletePizza',$item->pizza_id) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    @endif

                  </tbody>
                </table>
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