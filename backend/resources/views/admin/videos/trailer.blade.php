@extends('layouts.app')


@section('head')
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="/js/simpleUpload.js"></script>
@endsection

@section('script')
    var $j = jQuery.noConflict();

    $j(document).ready(function(){



        $j('input[name=file]').change(function(){
            $j(this).simpleUpload("{{ route('videos.store_trailer_video', $data->id) }}", {

                start: function(file){
                    //upload started
                    $j('#filename').html(file.name);
                    $j('#progress').html("");
                    $j('#progressBar').width(0);
                },


                data: {
                "_token": "{{ csrf_token() }}",
                "id": {{ $data->id }},
                },

                progress: function(progress){
                    //received progress
                    $j('#progress').html("Progress: " + Math.round(progress) + "%");
                    $j('#progressBar').width(progress + "%");
                    $j("#progress-bar").attr("style",  "width:" + Math.round(progress) +  "%;" );
                },

                success: function(data){

                    if(data.status == 'success'){
                        $j('#progress').html("<span class=\"text-success\"><i class=\"fas fa-check\"></i>&nbsp;" + data.message + "</span>");
                        //location.reload();
                        location.href = '{{ route('videos.trailer_success', $data->id) }}';

                    }else if(data.status == 'error'){
                        $j('#progress').html("<span class=\"text-danger\"><i class=\"fa fa-exclamation-triangle\"></i>&nbsp;" + data.message.file + "</span>");
                    }
                    
                    console.log(data.message.file);
                    
                   
                },

                error: function(error){
                    //upload failed
                    //$('#progress').html("Failure!<br>" + error.name + ": " + error.message);
                   // console.log(data.message);
             
     
                    $j('#progress').html("Trailer upload failed!");
                }

            });

        });

    });
@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/home">{{ __('Home') }}</a></li>
                    <li class="breadcrumb-item"><a href="/videos">{{ __('Videos') }}</a></li>
                    <li class="breadcrumb-item"><a href="/videos/{{ $data->id }}">{{ $data->title }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('videos.edit' , $data->id )}}">Metadata</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Trailer') }}</li>
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
                    <div class="card-header" style="background-color: #dee2e6"><button type="button" class="btn btn-primary btn-lg">Trailer Video</button></div>
                    <div class="card-body">
                       
                        @if (file_exists(public_path('/uploads/' .$data->id. '/trailer/original.mp4')))

                            
                            @if (!file_exists(public_path('/uploads/' .$data->id. '/trailer/stream.smil')))
                                
                                <table class="table table-dark">
                                    <thead>
                                        <tr>
                                        <th class = "text-center">1080p</th>
                                        <th class = "text-center">720p</th>
                                        <th class = "text-center">480p</th>
                                        <th class = "text-center">240p</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class = "text-center">
                                                @if (file_exists(public_path('/uploads/' .$data->id. '/trailer/1080p.mp4')))
                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                @else 
                                                <i class="fa fa-cog fa-lg fa-spin"></i>
                                                @endif
                                            </td>
                                            <td class = "text-center">
                                                @if (file_exists(public_path('/uploads/' .$data->id. '/trailer/720p.mp4')))
                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                @else 
                                                <i class="fa fa-cog fa-lg fa-spin"></i>
                                                @endif
                                            </td>
                                            <td class = "text-center">
                                                @if (file_exists(public_path('/uploads/' .$data->id. '/trailer/480p.mp4')))
                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                @else 
                                                <i class="fa fa-cog fa-lg fa-spin"></i>
                                                @endif
                                            </td>
                                            <td class = "text-center">
                                                @if (file_exists(public_path('/uploads/' .$data->id. '/trailer/240p.mp4')))
                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                @else 
                                                <i class="fa fa-cog fa-lg fa-spin"></i>
                                                @endif
                                            </td>
    
                                        </tr>
                                        <tr>
                                            <td colspan="4"><progress style="width:100%" value="0" max="10" id="progressBar"></progress></td>
                                        </tr>
    
    
                                    </tbody>
                                    </table>
    
    
                                    <script>
                                        var $j = jQuery.noConflict();
    
                                        $j(document).ready(function(){
                                            setInterval(function() {
                                                window.location.reload(true);
                                            }, 10000);
                                        });
    
                                        var timeleft = 10;
                                        var downloadTimer = setInterval(function(){
                                        if(timeleft <= 0){
                                            clearInterval(downloadTimer);
                                        }
                                        document.getElementById("progressBar").value = 10 - timeleft;
                                        timeleft -= 1;
                                        }, 1000);
                                    </script>
                                    
                       
                                @else 
                                    @include('admin.videos.partials.player_trailer', $data)
                                @endif

                   
                         
                        @else
                            <img style="width:100%" class="img img-thumbnail mb-2" src="/src/poster/trailer.png" />
                        @endif
                        <div class="progress">
                            <div id="progress-bar" class="progress-bar" role="progressbar" style="width: 0%;"  aria-valuemin="0" aria-valuemax="100">
                                <span id="filename"></span>
                            </div>
                        </div>
                        
                        <div class="input-group mt-1 mb-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Upload Trailer</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" name="file" class="custom-file-input" id="inputGroupFile01">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                           
                        </div>

                        <form method="POST" action="{{ route('videos.store_trailer_poster', $data->id) }}" enctype="multipart/form-data">
                         @csrf
                        <div class="input-group mt-1 mb-1"><span id="progress"></span></div>
                        <div class="input-group mt-1 ">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Upload Poster</span>
                        </div>
                        <div class="custom-file" >
                            <input onchange="form.submit()" type="file" class="form-control @error('file-2') is-invalid @enderror" name="file-2" class="custom-file-input" id="inputGroupFile02" aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="inputGroupFile02">.jpg or .png only</label>
                        </div>
                        </form>
                        
                    </div>

                    

                    </div>

                    <div class="card-footer text-center">
                    <a href="{{ route('videos.edit' , $data->id )}}" class="float-left btn btn-primary">	&laquo; Metadata</a>
                    <a href="{{ route('videos.video' , $data->id )}}" class="float-right btn btn-primary"> Video &raquo;</a>
                </div>


                    
                </div>            




                
            
        </div>
    </div>
</div>
@endsection


