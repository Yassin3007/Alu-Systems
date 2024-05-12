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
              <h3 class="card-title" >تعديل </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="container">
                <form method="POST" action="{{route('articles.update',$article)}}" enctype="multipart/form-data">
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
                      <label for="field1">عنوان المقال باللغة العربية </label>
                      <input type="text" name="title_ar" value="{{$article->getTranslation('title', 'ar')}}" class="form-control" id="field1">
                    </div>
                    <div class="col-md-6">
                      <label for="field2"> عنوان المقال باللغة الانجليزية</label>
                      <input type="text" name="title_en" value="{{$article->getTranslation('title', 'en')}}" class="form-control" id="field2">
                    </div>
                   
                  </div>
                  <br>

                  
                 
                  <div class="row">
                    <div class="col-md-12">
                      <label for="field4"> تفاصيل المقال باللغة العربية </label>
                      <div class="card-body pad">
                        <div class="mb-3">
                          <textarea class="textarea" name="description_ar" placeholder="Place some text here"
                                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$article->getTranslation('description', 'ar')}}</textarea>
                        </div>
                       
                      </div> 
                    </div>
                   
                  </div>
                  <br>

                  <div class="row">
                    <div class="col-md-12">
                      <label for="field4"> تفاصيل المقال باللغة الانجليزية</label>
                     <div class="card-body pad">
                        <div class="mb-3">
                          <textarea class="textarea" name="description_en" placeholder="Place some text here"
                                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$article->getTranslation('description', 'en')}}</textarea>
                        </div>
                       
                      </div>           
                    </div>
                   
                  </div>
                  <br>
                 
                  <div class="row">
                    <div class="col-md-6">
                      <label for="field1"> صورة المقال  </label>
                      <input type="file" name="image" accept="image/*" class="form-control" accept="application/pdf" id="field1">
                    </div>
                   
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-6">
                      
                      <img width="200px" src="{{asset('images/'.$article->getTranslation('title','en').'/'.$article->image)}}">
                    </div>
                   
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-6">
                      <input type="checkbox" 
                      
                          @checked($article->is_favorite == 1)
                      
                      value="1" name="is_favorite" accept="image/*"  id="field1">
                      <label for="field1">       <span class="badge" style="background: green;font-size:17px">مميز</span></label>

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