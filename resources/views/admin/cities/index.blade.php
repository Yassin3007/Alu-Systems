@extends('layouts.dashboard')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">المدن</h1>
            </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header " >
                            <a  href="{{route('cities.create')}}" class="btn  btn-outline-primary ">اضافة مدينة</a>
                        </div>
                        <!-- /.card-header -->  
                        
                        <x-flash-message class="w-75 m-auto" />

                        <div class="card-body">
                            <table id="example3" class="table table-bordered table-striped">

                                <thead>
                                    <tr>
                                        <th>م </th>
                                        <th> (عربي) المدينة  </th>
                                        <th> (English) المدينة  </th>
                                        <th>خيارات</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach ($cities as $city)
                                    <tr>
                                        <td> {{$loop->iteration}}   </td>
                                        <td>{{$city->getTranslation('name', 'ar')}}</td>
                                        <td>{{$city->getTranslation('name', 'en')}}</td>
                                        <td>
                                            <a href="{{route('cities.edit',$city)}}" class="btn  btn-outline-info">تعديل</a>
                                            <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#modal-default{{$city->id}}">
                                                حذف
                                            </button>
                                        
                                            <div class="modal fade" id="modal-default{{$city->id}}">
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
                                                        <form method="POST" action="{{route('cities.destroy',$city)}}">
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
                                        </td>
                                    </tr>
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
@endsection
