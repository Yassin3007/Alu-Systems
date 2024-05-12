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
              <h3 class="card-title" >تعديل السلايدر</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="container">
                <form method="POST" action="{{route('slider.update',$slider)}}" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
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
                      <input type="text" name="name_ar" value="{{$slider->getTranslation('name', 'ar')}}"  class="form-control" id="field1">
                    </div>
                    <div class="col-md-6">
                      <label for="field2"> الاسم باللغة الانجليزية</label>
                      <input type="text" name="name_en" value="{{$slider->getTranslation('name', 'en')}}" class="form-control" id="field2">
                    </div>
                   
                  </div>
                  <br>

                  
                 
                  <div class="row">
                    <div class="col-md-12">
                      <label for="field4"> الوصف  باللغة العربية</label>

                      <div class="card-body pad">
                        <div class="mb-3">
                          <textarea class="textarea" name="description_ar" placeholder="Place some text here"
                                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                    {{$slider->getTranslation('description', 'ar')}}
                                  </textarea>
                        </div>
                       
                      </div> 
                    
                    </div>
                   
                  </div>
                  <br>

                  <div class="row">
                    <div class="col-md-12">
                      <label for="field4"> الوصف  باللغة الانجليزية</label>
                      <div class="card-body pad">
                        <div class="mb-3">
                          <textarea class="textarea" name="description_en" placeholder="Place some text here"
                                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                    {{$slider->getTranslation('description', 'en')}}
                                  </textarea>
                        </div>
                       
                      </div>                     
                    </div>
                   
                  </div>
                  <br>

                  <div class="row">
                    <div class="col-md-6">
                      <label for="field1">المرافق  باللغة العربية </label>
                      <input type="text" name="facilities_ar" value="{{$slider->getTranslation('facilities', 'ar')}}" class="form-control" id="field1">
                    </div>
                    <div class="col-md-6">
                      <label for="field2"> المرافق باللغة الانجليزية</label>
                      <input type="text" name="facilities_en" value="{{$slider->getTranslation('facilities', 'en')}}" class="form-control" id="field2">
                    </div>
                   
                  </div>
                  <br>

                  <div class="row">
                    <div class="col-md-6">
                      <label for="field1">الصورة الرئيسية للعنصر      </label>
                      <input type="file" name="image" accept="image/*" multiple class="form-control" id="field1">
                      <img src="{{$slider->getFirstMediaUrl('avatar')}}" width="200px" alt="">
                    </div>

                    
                   
                   
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-6">
                      <label for="field1">الصور الداخلية للعنصر      </label>
                      <input type="file" multiple name="images[]" accept="image/*" multiple class="form-control" id="field1">
                      @foreach($slider->getMedia('images') as $image)
                        <img src="{{$image->getUrl()}}" width="200px" alt="">
                      @endforeach
                      
                    </div>              
                  </div>
                  <br>

                  <div class="row">
                    <div class="col-md-6">
                      <label for="field1">  الفيديو      </label>
                      <input type="file"  name="video" accept="video/*" multiple class="form-control" id="field1">
                      <br>
                      <video src="{{$slider->getFirstMediaUrl('video')}}" width="200px" controls></video>
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
<footer class="main-footer">

</footer>

@endsection