@extends('layouts.dashboard')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
           <div class="col-sm-6">
            <h1 class="m-0 text-dark">طلبات التواصل  </h1>
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
              
              {{-- <div class="card-header d-flex" >
                <h3 class="card-title">طلبات التواصل   </h3>
              </div> --}}
              <!-- /.card-header -->
              
              <div class="card-body">

                
                
                <table id="example3" class="table table-bordered table-striped">
                  
                  <thead>
                  <tr>
                    <th>م </th>
                    <th>اسم المرسل  </th> 
                    <th> البريد الالكتروني  </th>
                    <th>الموضوع</th>
                    <th>الرسالة</th>
                    
                    <th>خيارات</th>
                    
                  </tr>
                  </thead>
                  <tbody>
         
             @foreach ($messages as $message)
             <tr>
              <td> {{$loop->iteration}}   </td>
              <td>{{$message->name}}</td>
              <td>{{$message->email}} </td>
              <td>{{$message->subject}} </td>
              <td>{{$message->message}} </td>

              <td>
               
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-default{{$message->id}}">
                  حذف
                </button>
              </td>
            </tr>

            <div class="modal fade" id="modal-default{{$message->id}}">
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
                      <form method="POST" action="{{route('messages.destroy',$message)}}">
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
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
             @endforeach
                  
                 
                 
                  </tbody>
                </table>
                {{$messages->links()}}

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
    
      <!-- /.modal -->
     
    </div>
    </section>
    <!-- /.content -->
   
  </div>
@endsection