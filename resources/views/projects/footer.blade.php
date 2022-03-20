<div class="card-footer bg-transparent" dir="rtl">
    <div class="row">
        <div class="d-flex align-items-center col-md-6">
            <img src="/images/clock.svg" alt="clock" />
            <div class="mr-2">
                {{$project->created_at->diffForHumans()}}
            </div>
        </div>
        {{-- the second div --}}
        <div class="d-flex align-items-center col-md-3">
            <img src="/images/list-check.svg" alt="clock" />
            <div class="mr-2">
                {{count($project->tasks)}}
            </div>
        </div>
        <div class="flex align-items-center mr-auto col-md-3">
            <form action="/projects/{{$project->id}}" method="POST">
                @method('DELETE')
                @csrf
                <input type="submit" class="btn-delete" value="">
            </form>
        </div>
    </div>
</div>