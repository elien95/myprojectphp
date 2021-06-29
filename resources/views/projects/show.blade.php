@extends('layouts.app')

@section('content')

<header class="d-flex justify-content-between align-items-center my-5" dir="rtl">
    <div class="h6 text-dark">
        <a href="/projects">المشاريع/{{$project->title}}</a>
    </div>

    <div>
        <a href="/projects/{{$project->id}}/edit" class="btn btn-primary px-4" role="button"> تعديل مشروع </a>
    </div>
</header>
    
<section class="row text-right" dir="rtl">
<div class="col-lg-4">
    <div class="card mb-4">
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
                    <span class="text-warning">قيد الانجاز </span>   
                    @endswitch
            </div>
                <h5 class="font-weight-bold card-title">
                    <a href="/projects/{{$project->id}}">{{$project->title}}</a>
                </h5>
                <div class="card-text my-4">
                    {{$project->description}}
                </div>
        </div>
        @include('projects.footer')
    </div>
    <div class="card">
        <div class="card-body">
            <h5 class="font-weight-bold">تغيير حالة المشروع </h5>

            <form action="/projects/{{$project->id}}"  method="POST">
                @csrf
                @method('PATCH')
            <select name="status" class="custom-select" onchange="this.form.submit()">
                <option value="0" {{($project->sattus==0) ? 'selected': ""}} >قيد الانجاز</option>
                <option value="1" {{($project->sattus==1) ? 'selected': ""}} > مكتمل</option>
                <option value="2" {{($project->sattus==2) ? 'selected': ""}} >ملغي</option>

            </select>
        </form>
        </div>
    </div>
</div>

<div class="col-lg-8">
@foreach($project->tasks  as $task)
    <div class="card d-felx flex-row  mt-3 p-4 align-items-center">
        <div class="{{$task->done ? 'checked muted':''}}">
            {{$task->body}}
        </div>
    <div class=" d-flex mr-auto">
    <form action="/projects/{{$project->id}}/tasks/{{$task->id}}" method="POST">
        @csrf
        @method('PATCH')
        <input type="checkbox" name="done" class="form-control ml-4" {{$task->done ? 'checked' :''}}
         onchange="this.form.submit()">
    </form>
    <div class="d-flex align-items-center mr-auto ">
        <form action="/projects/{{$task->project_id}}/tasks/{{$task->id}}" method="POST" class="d-flex">
          @csrf
            @method("DELETE")
            <input type="submit"  value="" class="btn btn-delete mb-2"  dir="rtl">
        </form>
    </div>
</div>

</div>
@endforeach
<div class="card mt-4">
    <form action="/projects/{{$project->id}}/tasks" method="POST" class=" p-3 d-flex">
      @csrf
      <input type="text" name ="body" placeholder="أضف مهمة جديدة " class=" border-0 form-control p-2 ml-2">
   <button class="btn btn-primary" type="submit">إضافة </button>
    </form>
</div>
</div>
</section>

@endsection