@csrf
<div class="form-group">
    <label for="title" class="form-label">عنوان المشروع </label>
    <input type="text" name="title" value="{{$project->title ?? ""}}" class="form-control" id="title">
    @error('title')
        <div class="text-danger">
            <small>{{$message}}</small>
        </div>
    @enderror
</div>
<div class="form-group">
    <label for="description" class="form-label">وصف المشروع</label>
    <textarea type="text" name="description" class="form-control" id="description">{{$project->description ?? ""}}</textarea>
    @error('description')
        <div class="text-danger">
            {{$message}}
        </div>
    @enderror
</div>