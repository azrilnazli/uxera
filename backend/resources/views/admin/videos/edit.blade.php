@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('videos.update', $data->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row justify-content-center">
        <div class="col-md-12">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/videos">{{ __('Videos') }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('videos.show' , $data->id )}}">{{ $data->title }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Metadata') }}</li>
                    <li class="breadcrumb-item"><a href="{{ route('videos.trailer' , $data->id )}}">Trailer</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('videos.video' , $data->id )}}">Video</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('videos.poster' , $data->id )}}">Poster</a></li>
                   
                </ol>
            </nav>

            @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ $message }}
                </div>
            @endif


            @if ($errors->any())
                
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <div class="card">
                <div class="card-header" style="background-color: #dee2e6"><button type="button" class="btn btn-primary btn-lg">Metadata</button></div>
                <div class="card-body" style="background-color: #eaeaea">

                    <dt class="col-sm-3">Title</dt>
                    <dd class="col-sm-9">
                        <div class="form-group row">
                            <div class="col-md-9">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $data->title }}" required autocomplete="title" >

                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>
                    </dd>


                    <dt class="col-sm-3">Category</dt>
                    <dd class="col-sm-9">
                        <div class="form-group row">
                            <div class="col-md-9">                    

                                <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id" >
                                    @foreach($categories as $key => $category)
                                        <option  @if( $data->category_id == $key) {{ 'selected' }}  @endif value="{{ $key }}">{{ $category }}</option>
                                    @endForeach
                                </select>
                                @error('category_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                                </div>
                        </div>
                    </dd>   

                    <dt class="col-sm-3">Description</dt>
                    <dd class="col-sm-9">
                        <div class="form-group row">

                                <div class="col-md-9">
                                    <!--<input id="description" type="description" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description"> -->
                                    <textarea class="form-control @error('description') is-invalid @enderror" rows="8" id="description" name="description" style="resize:none" required autocomplete="description">{{ $data->description }}</textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div>              
                    </dd>

                    <dt class="col-sm-3">Publish now ?</dt>
                    <dd class="col-sm-9">
                        <div class="form-group row">
                        
                            <div class="col-md-4">
  
                                    <input  @if ($data->is_processing == 1 ) disabled @endif @if($data->is_published == 1) checked @endif id="is_published" type="checkbox" class="@error('is_published') is-invalid @enderror" name="is_published" value="1" >


                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>
                    </dd>                    

                </dl>
                <dt class="col-sm-3">
                
                @if ($data->is_processing == 1 )          
                <p class="alert alert-danger">Video is still processing</p>
                @else            
                <p class="alert alert-success">Video is ready for publishing</p>
                @endif
                
                </dt> 
                <dd class="col-sm-9">
                    <button type="submit" class="btn btn-primary" >
                        Update
                    </button>
                </dd>    

                </div>

                <div class="card-footer text-center">
                    <a href="{{ route('videos.show', $data->id  )}}" class="float-left btn btn-primary">	&laquo; Show Assets</a>
                    <a href="{{ route('videos.trailer', $data->id  )}}" class="float-right btn btn-primary">	Trailer &raquo;</a>
                </div>
            </div> 
        </div>
    </div>
       
    </form>    
</div>
@endsection
