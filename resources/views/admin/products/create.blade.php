@extends('layouts.dashboard')
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <!-- <div class="col-sm-6">
          <h1 class="m-0 text-dark">شاشة المدربين </h1>
        </div> -->
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
        

          <div class="card">
            <div class="card-header d-flex" style="text-align: center;">
              <h3 class="card-title" >اضافة منتج</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="container">
                <form method="POST" action="{{route('products.store')}}" enctype="multipart/form-data">
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
                      <label for="field1">الاسم  باللغة العربية </label>
                      <input type="text" name="name_ar" value="{{old('name_ar')}}" class="form-control" id="field1">
                    </div>
                    <div class="col-md-6">
                      <label for="field2"> الاسم باللغة الانجليزية</label>
                      <input type="text" name="name_en" value="{{old('name_en')}}" class="form-control" id="field2">
                    </div>
                   
                  </div>
                  <br>

                  
                 
                 
            
              
                  <div class="row">
                    <div class="col-md-6">
                      <label for="field1">صورة المنتج      </label>
                      <input type="file" name="image" accept="image/*" multiple class="form-control" id="field1">
                    </div>

                    <div class="col-md-6">
                      <label for="field1">المشاريع  </label>
                      <select name="projects[]" multiple id="project_id" class="form-control">
                        @foreach($projects as $project)
                          <option value="{{ $project->id }}"> {{ $project->name }} </option>
                        @endforeach
                      </select>
                    </div>
                   
                  </div>
                  <br>
                  
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
<footer class="main-footer">

</footer>

@endsection