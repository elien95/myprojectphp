@csrf
<div class="form-group">
   <label for="title">عنوان المشروع</label>
   <input type="text" class="form-control" id="title" name='title' value="{{$project->title}}">
 @error('title')
     <div class="text-danger">
       <small> {{$message}} </small>
     </div>
 @enderror
  </div>

 <div class="form-group">
   <label for="decsription">وصف المشروع </label>
<textarea name="description" id="description"  class="form-control" >{{$project->description}}</textarea>
@error('description')
<div class="text-danger">
  <small> {{$message}} </small>
</div>
@enderror   

</div>
