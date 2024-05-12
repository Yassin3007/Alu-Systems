@extends('layouts.dashboard')
@section('content')
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
              
              <div class="card-header" ">
                <h3 class="card-title">التعليقات   </h3>
              </div>
              <!-- /.card-header -->
              
              <div class="card-body">

                
                
                <table id="example3" class="table table-bordered table-striped">
                  
                  <thead>
                  <tr>
                    <th>م </th>
                    <th>التعليق  </th> 
                    <th> عنوان المقال </th>
                    
                    <th>خيارات</th>
                    
                  </tr>
                  </thead>
                  <tbody>
         
             @foreach ($comments as $comment)
             <tr>
              <td> {{$loop->iteration}}   </td>
              <td>{{$comment->comment}}</td>
              <td>{{$comment->article->title}} </td>
              <td>
               
                <a href="{{route('accept_comment',$comment->id)}}" class="btn  btn-outline-primary">قبول</a>
                <a href="{{route('comment_delete',$comment->id)}}" class="btn  btn-outline-danger">حذف</a>

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
      <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"> تعديل نموذج التقييم</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="container">
                <form>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label for="input1">  اسم نموذج التقييم</label>
                        <input type="text" class="form-control" id="input1">
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label for="select1">نوع النموذج</label>
                        <select class="form-control" id="select1">
                          <option> تقييم مقرر</option>
                          <option> تقييم مدرب</option>
                        </select>
                      </div>
                    </div>
                   
                  </div>
                  <div class="col">
                    <div class="form-group form-check">
                      <input type="checkbox" class="form-check-input" id="checkbox1">
                      <label class="form-check-label" for="checkbox1">نشط/لا</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <button type="submit" class="btn btn-primary">تأكيد</button>
                    </div>
                  </div>
                </form>
              </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
     
    </div>
    </section>
    <!-- /.content -->
   
  </div>
@endsection