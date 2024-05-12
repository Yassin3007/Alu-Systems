@extends('layouts.dashboard')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
           <div class="col-sm-6">
            <h1 class="m-0 text-dark"> صور المشروع </h1>
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
        

          <div class="card">
            <div class="card-header d-flex" >
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                اضافة صور
              </button>            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example3" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>م </th>
                  <th>الصورة  </th>
                  <th>العمليات</th>
                  

                </tr>
                </thead>
                <tbody>

       @foreach ($images as $image)
       <tr>
                
        <td>{{$loop->iteration}}</td>
        <td><img src="{{asset('images/'.$project->getTranslation('title','en').'/'.$image->image)}}" width="100px"></td>
        <td>
          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-default{{$image->id}}">
            حذف
          </button>         
        </td>
      </tr>


      <div class="modal fade" id="modal-default{{$image->id}}">
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
                      <a href="{{route('delete_project_image',$image->id)}}" class="btn btn-danger">تأكيد</a>
                    </div>
                  </div>
               
              </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
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
 
  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">اضافة صور</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container">
            <form method="POST" action="{{route('project_add_images',$project)}}" enctype="multipart/form-data">
              @csrf
              
          
              <div class="row">
                <div class="col-md-12">
                  <label for="field1">صور المشروع      </label>
                  <input type="file" name="images[]" accept="image/*" multiple class="form-control" id="field1">
                </div>
               
              </div>
              <br>
              <div class="row">
                <div class="col">
                  <button type="submit" class="btn btn-danger">تأكيد</button>
                </div>
              </div>
            </form>
          </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  </div>
  <!-- /.modal --> 





@endsection