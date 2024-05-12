@extends('layouts.dashboard')

@section('content')
<div class="content-wrapper">

    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-10 mx-auto my-3">
            <x-flash-message />
        </div>
    </div>

    <!-- Start Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">الشهادات</h1>
                </div>
            </div><!-- /.row -->
        </div>
    </div>
    <!-- End Header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header d-flex" >
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                                اضافة
                            </button>
                        </div>

                        <div class="card-body">
                            <table id="example3" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>م</th>
                                        <th>الشهادة</th>
                                        
                                        <th>العمليات</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($certificates as $certificate)
                                    <tr>
                                        <td>{{$certificate->id}}</td>
                                        <td><img src="{{$certificate->getFirstMediaUrl('avatar')}}" width="100px"></td>
                                        <td>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-default{{$certificate->id}}">
                                                حذف
                                            </button>
                                        </td>
                                    </tr>


                                    <div class="modal fade" id="modal-default{{$certificate->id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h4 class="modal-title"> هل انت متاكد من عملية الحذف ؟</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <div class="modal-body">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col">
                                                                <a href="#"
                                                                    class="btn btn-danger"
                                                                    onclick="event.preventDefault(); document.getElementById('deletecertificate').submit()"
                                                                    >
                                                                    تأكيد
                                                                </a>
                                                                <form id="deletecertificate" action="{{ route('certificates.destroy', $certificate->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <!-- /.col -->
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <!-- Start Modal -->
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header my-1">
                    <h4 class="modal-title">اضافة شهادات جديدة</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body my-1">
                    <div class="container">
                        <form method="POST" action="{{route('certificates.store')}}" enctype="multipart/form-data">
                            @csrf
                    
                            <div class="row my-2">
                                <div class="col-md-12">
                                    <label for="field1">الشهادة</label>
                                    <input type="file" name="images[]" multiple accept="image/*" class="form-control" id="field1">
                                </div>
                            </div>
                            <br>
                            <div class="row my-2">
                                <div class="col">
                                    <button type="submit" class="btn btn-outline-info">إضافة</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Modal -->
</div>
@endsection
