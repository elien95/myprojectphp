<div class="card-footer bg-transparent">
    <div class="d-flex">
        <div class="d-flex align-items-center">
            <img src="/images/clock.svg" alt="">
            <div class="mr-2">
                {{$project->created_at->diffForHumans()}}
            </div>
        </div>

        <div class="d-flex align-items center mr-4">
            <img src="/images/list-check.svg" alt="">
            <div class="mr-2">
              {{count($project->tasks)}}
            </div>
        </div>
        <div class="d-flex align-items-center mr-auto">
            <form action="/projects/{{$project->id}}" method="POST">
                @csrf
                @method("DELETE")
              
                <input type="submit"  value="" class=" btn btn-delete" dir="rtl">
            </form>
        </div>
    </div>
</div>