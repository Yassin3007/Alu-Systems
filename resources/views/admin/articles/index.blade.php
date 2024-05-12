@extends('layouts.dashboard')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">المقالات</h1>
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
                  <a  href="{{route('articles.create')}}" class="btn  btn-outline-primary ">اضافة مقال</a>
                  {{-- <h3 class="card-title font-weight-bold">المشاريع </h3> --}}
                </div>
                <!-- /.card-header -->

                <div class="card-body">

                  <table id="example3" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>م</th>
                      <th>الصورة</th>

                      <th>عنوان المقال</th>
                      <th>تفاصيل المقال </th>
                      <th> مميز </th>
                      <th>الخيارات</th>
                    </tr>
                    </thead>
                    <tbody>

              @foreach ($articles as $article)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td><img width="100px" height="100px" src="{{asset('images/'.$article->getTranslation('title', 'en').'/'.$article->image)}}"></td>
                <td >{{$article->title}}</td>
                <td>{!!$article->description!!}</td>
                <td>
                  @if($article->is_favorite ==1)

                  <span style="color: green;font-size: 30px" class="fa fa-check-circle"></span>
                  @else

                  <span style="color: #9b1010;font-size: 30px" class="fa fa-file-excel"></span>

                  @endif
                </td>
                <td>
                  <a href="{{route('articles.edit',$article)}}" class="btn  btn-outline-warning">تعديل</a>
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-default{{$article->id}}">
                    حذف
                  </button>
                </td>
              </tr>


    <div class="modal fade" id="modal-default{{$article->id}}">
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
              <form method="POST" action="{{route('articles.destroy',$article)}}">
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


                  {{$articles->links()}}

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
