@extends('layouts.dashboard')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">الماكينات</h1>
          </div>

          <!-- /.col -->
          <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">شاشة المدربين</li>
            </ol>
          </div>/.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <br>
              <div class="card">
                <div class="card-header " >
                  <a  href="{{route('machines.create')}}" class="btn  btn-outline-primary ">اضافة ماكينة</a>
                  {{-- <h3 class="card-title font-weight-bold">المشاريع </h3> --}}
                </div>
                <!-- /.card-header -->

                <div class="card-body">

                  <table id="example3" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>م</th>
                      <th>الصورة</th>

                      <th>اسم الماكينة </th>
                      <th> المصنع    </th>
                      <th>الخيارات</th>
                    </tr>
                    </thead>
                    <tbody>

              @foreach ($machines as $machine)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td><img width="100px" height="100px" src="{{$machine->getFirstMediaUrl('avatar')}}"></td>
                <td >{{$machine->name}}</td>
                <td>{{$machine->slider->name}}</td>
                
                <td>
                  <a href="{{route('machines.edit',$machine->id)}}" class="btn  btn-outline-warning">تعديل</a>
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-default{{$machine->id}}">
                    حذف
                  </button>
                </td>
              </tr>


    <div class="modal fade" id="modal-default{{$machine->id}}">
      <div class="modal-dialog">

        <!-- Modal Content -->
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title"> هل انت متاكد من عملية الحذف ؟</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <!-- Modal Body -->
          <div class="modal-body">
            <div class="container">
              <form method="POST" action="{{route('machines.destroy',$machine)}}">
                @csrf
                @method('delete')

                <div class="row">
                  <div class="col">
                    <button type="submit" class="btn btn-danger">تأكيد</button>
                  </div>
                </div>
              </form>
            </div>
          </div>

        </div>

      </div>
    <!-- /.modal -->
              @endforeach


                

                    </tbody>

                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      {{-- <button type="button" class="btn  btn-danger ">حذف جميع المدربين</button> --}}

    </footer>



  </div>
@endsection
