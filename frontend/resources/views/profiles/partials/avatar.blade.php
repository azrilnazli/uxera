@if(file_exists( public_path().'/thumbnails/avatar-'. auth()->user()->id . '.png' )) 
<div class="form-group row ">

    <label for="name" class="col-md-2 col-form-label text-md-right"></label>
    <div class="col-md">
        <img class="img-thumbnail rounded rounded-circle" src="{{ '/thumbnails/avatar-'. auth()->user()->id . '.png' }}" />
    </div>
</div>    
@endif