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
                <form method="POST" action="{{route('sub-products.update',$subProduct->id)}}" enctype="multipart/form-data">
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
                      <input type="text" name="name_ar" value="{{$subProduct->getTranslation('name', 'ar')}}" class="form-control" id="field1">
                    </div>
                    <div class="col-md-6">
                      <label for="field2"> الاسم  باللغة الانجليزية</label>
                      <input type="text" name="name_en" value="{{$subProduct->getTranslation('name', 'en')}}" class="form-control" id="field2">
                    </div>
                   
                  </div>
                  <br>

                  
                 
                  <div class="row">
                    <div class="col-md-12">
                      <label for="field4"> التفاصيل  باللغة العربية </label>
                      <div class="card-body pad">
                        <div class="mb-3">
                          <textarea class="textarea" name="description_ar" placeholder="Place some text here"
                                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$subProduct->getTranslation('data', 'ar')}}</textarea>
                        </div>
                       
                      </div> 
                    </div>
                   
                  </div>
                  <br>

                  <div class="row">
                    <div class="col-md-12">
                      <label for="field4"> التفاصيل  باللغة الانجليزية</label>
                     <div class="card-body pad">
                        <div class="mb-3">
                          <textarea class="textarea" name="description_en" placeholder="Place some text here"
                                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$subProduct->getTranslation('data', 'en')}}</textarea>
                        </div>
                       
                      </div>           
                    </div>
                   
                  </div>
                  <br>
                 
                  <div class="row">
                    <div class="col-md-6">
                      <label for="field1"> الصورة   </label>
                      <input type="file" name="image" accept="image/*" class="form-control"  id="field1">
                    </div>
                    <div class="col-md-6">
                      <label for="field1">المنتج الرئيسي  </label>
                      <select name="product_id"  id="product_id" class="form-control">
                        @foreach($products as $product)
                          <option value="{{ $product->id }}" @if($subProduct->product_id == $product->id) selected @endif> {{ $product->name }} </option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-6">
                      
                      <img width="200px" src="{{$subProduct->getFirstMediaUrl('avatar')}}">
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