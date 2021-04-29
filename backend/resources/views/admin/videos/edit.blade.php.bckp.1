@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/home">{{ __('Home') }}</a></li>
                    <li class="breadcrumb-item"><a href="/videos">{{ __('Videos') }}</a></li>
                    <li class="breadcrumb-item"><a href="/videos/{{ $data->id }}">{{ $data->title }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Edit') }}</li>
                </ol>
            </nav>

            <div class="card">
                <div class="card-header" style="background-color: #dee2e6"><h2> {{ $data->title }} </h2></div>

                <div class="card-body">


                @if ($errors->any())
                
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                    <!-- Create Post Form -->

                    <form action="{{ route('videos.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')


                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $data->title }}" required autocomplete="title" >

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <!--<input id="description" type="description" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description"> -->
                                <textarea class="form-control @error('description') is-invalid @enderror" rows="8" id="description" name="description" style="resize:none" required autocomplete="description">{{ $data->description }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
 

                        <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Current Video') }}</label>

                        <div class="col-md-6">
                            <script type="text/javascript" src="//player.wowza.com/player/latest/wowzaplayer.min.js"></script>
                            <div id="playerElement" style="width:100%; height:0; padding:0 0 56.25% 0"></div>
                                <script type="text/javascript">
                                WowzaPlayer.create("playerElement",
                                        {
                                            "license":"PLAY1-hZeDc-CnBKQ-PM8MY-C9QkZ-cu899",
                                            "sources":[
                                                        {
                                                            "sourceURL":"http://localhost:8081/vod/{{ $data->id }}/videos/smil:stream.smil/playlist.m3u8"
                                                        },
                                                    ],

                                            "title":"",
                                            "description":"",
                                            "autoPlay":false,
                                            "mute":false,
                                            "volume":75,
                                            @if (file_exists(public_path('/uploads/' .$data->id. '/images/file-2-small.png')))
                                                "posterFrameURL":"/uploads/{{ $data->id }}/images/file-2-small.png",
                                                "endPosterFrameURL":"/uploads/{{ $data->id }}/images/file-2-small.png",
                                                "uiPosterFrameFillMode":"fit"
                                            @else 
                                                "posterFrameURL":"/src/poster/trailer.png",
                                                "endPosterFrameURL":"/src/poster/trailer.png",
                                                "uiPosterFrameFillMode":"fit"
                                            @endif                                               
                                        }
                                );
                            </script>
                            </div>
                        </div>
                        

                        <div class="col-md-6">
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Replace Video') }}</label>

                            <div class="col-md-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="form-control @error('file') is-invalid @enderror" name="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                        <label class="custom-file-label" for="inputGroupFile01">Choose video ( mp4 or mov only )</label>
                                    </div>
                                </div>

                                @error('file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a href="{{ route('videos.index')}}" class="btn btn-dark ml-2">	&laquo; Back</a>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
