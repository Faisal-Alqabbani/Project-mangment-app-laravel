@extends('layouts.app')

@section('title', 'profile')
@section('content')
<div class="row" dir="rtl">
    <div class="col-md-6 mx-auto">
        <div class="card p-2">
            <div class="text-center">
                <img src="{{asset('storage/'.auth()->user()->image)}}" alt="" width="82px" height="82px" />
                <h3>{{auth()->user()->name}}</h3>
            </div>
            <div class="card-body">
                <form action="/profile" method="POST" enctype="multipart/form-data">
                   @csrf
                   @method('PATCH')
                   <div class="form-group my-2">
                       <label for="name">الإسم</label>
                       <input type="text" name="name" value="{{auth()->user()->name}}" class='form-control' />
                   </div>

                <div class="form-group">
                    <label for="name">البريد الإلكروني </label>
                    <input type="email" name="email" value="{{auth()->user()->email}}" class='form-control' />
                </div>
                   
                <div class="form-group">
                    <label for="password"> كلمة المرور</label>
                    <input type="password" name="password"  class='form-control' />
                </div>

                <div class="form-group">
                    <label> تغير الصورة الشخصية</label>
                    <div class="custom-file">
                       <input type="file" name="image"  class='form-control' /> 
                       <label for="image" id="label-image" class="custom-file-label text-left" data-browse="استعراض"></label>
                    </div>
                    
                </div>
                <div class="flex-row-reverse">
                     <button type="submit" class="btn btn-outline-primary">حفظ التعديلات </button>
                <button class="btn btn-outline-danger" form="logout">تسجيل الخروج </button>
                </div>
               
                </form>
                <form action="/logout" id="logout" method="POST">
                @csrf
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('image').onchange = uploadOnChange;
    function uploadOnChange(){
        let filename = this.value; 
        let lastIndex = filename.lastIndex("\\");
        if(lastIndex >= 0){
            filename = filename.substring('image-label').innerHTML = filename;
            
        } 
        
    }
</script>
@endsection