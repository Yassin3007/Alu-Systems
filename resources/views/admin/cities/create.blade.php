@extends('layouts.dashboard')
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">اضافة مدينة</h1>
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

                        <!-- <div class="card-header d-flex" style="text-align: center;">
                            <h3 class="card-title" >يمكنك اضافة مدينة جديدة</h3>
                        </div> -->
                        <!-- /.card-header -->

                        <div class="card-body">
                            <div class="container">
                                <form method="POST" action="{{route('cities.store')}}" enctype="multipart/form-data">
                                    @csrf
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>

                                        </div>
                                    @endif

                                    <div class="row">

                                        <div class="col-md-6">
                                            <label for="field1">اسم المدينة باللغة العربية</label>
                                            <input type="text" name="city_ar" value="{{old('city_ar')}}" class="form-control" id="field1">
                                        </div>

                                        <div class="col-md-6">
                                            <label for="field2">اسم المدينة باللغة الانجليزية</label>
                                            <input type="text" name="city_en" value="{{old('city_en')}}" class="form-control" id="field2">
                                        </div>
                                    
                                    </div>
                                    <br>

                                    <button type="submit" class="btn btn-primary">تأكيد</button>
                                    </form>
                                </div>
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

@endsection