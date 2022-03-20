@extends('layouts.app')
@section('content')
<header class="d-flex justify-content-between my-5" dir="rtl">
    <div class="h6 text-dark">
        <a href="/projects">مشاريع / {{$project->title}}</a>
    </div>
    <div>
        <a href="/projects/{{$project->id}}/edit" class="btn btn-primary px-4">تعديل المشروع  </a>
    </div>
</header>

<section class="row text-right" dir="rtl">
    {{-- Project Details --}}
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="status">
                    @switch($project->status)
                    @case(1)
                    <span class="text-success">مكتمل</span>
                    @break
                    @case(2)
                    <span class="text-danger">ملغي</span>
                    @break
                    @default
                    <span class="text-warning">قيد الإنجاز </span>
                    @break
                    @endswitch
                    <h4 class="font-weight-bold card-title">
                        <a href="/projects/{{$project->id}}">{{$project->title}}</a>
                    </h4>
                    <div class="card-text mt-4">
                        {{$project->description}}
                    </div>

                 
                </div>
            </div>
            @include('projects.footer')
        </div>
        {{-- project card edit  --}}
        <div class="card">
            <div class="card-body">
                <h5 class="font-weight-bold">تغير حالة المشروع</h5>
                <form action="" method="POST">
                    @csrf
                    @method('PATCH')
                    <select name="status" class="custom-select" onchange="this.form.submit();">
                        <option value="0" {{($project->status == 0) ? 'selected' : ""}}>قيد الانتظار</option>
                        <option value="1" {{($project->status == 1) ? 'selected' : ""}}>مكتمل</option>
                        <option value="2" {{($project->status == 2) ? 'selected' : ""}}>ملغي</option>
                    </select>
                </form>
            </div>
        </div>
    </div>
    {{-- tasks Started here --}}
    <div class="col-lg-8">
        @foreach ($project->tasks as $task)
        <div class="card p-2 d-flex flex-row justify-content-between">
            <div class="{{$task->done ? 'checked muted':""}}">
                {{$task->body}}
            </div>
            
            <div class="mr-auto">
                <form action="/projects/{{$project->id}}/tasks/{{$task->id}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <input type="checkbox" name="done" class='ml-4' {{$task->done ? 'checked':""}} onchange="this.form.submit()" />
                </form>

                <form action="/projects/{{$task->project_id}}/tasks/{{$task->id}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <input type="submit" class="btn-delete" value="">
                </form>
            </div>
        </div>
        @endforeach
        
        <div class="card my-2">
            <form action="/projects/{{$project->id}}/tasks" method="POST" class='d-flex'>
                @csrf
                <input type="text" name="body" class="form-control p-2 ml-3" placeholder="اضف مهمة جديدة"/>
                <button type="submit" class="btn btn-primary">اضافة</button>
            </form>
        </div>
    </div>
</section>


@endsection