@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">    
        
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/home">{{ __('Home') }}</a></li>
                    <li class="breadcrumb-item"><a href="/videos">{{ __('Videos') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Index') }}</li>
                </ol>
            </nav>

            @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                 {{ $message }}
            </div>
            @endif

            <nav class="navbar navbar-expand-sm " style="background-color: #dee2e6">
                <form class="form-inline" action="{{ route('videos.search') }}" method="POST">
                @csrf
                    <input name="query" class="form-control mr-sm-2" type="text" placeholder="Search">
                    <button class="btn btn-success" type="submit">Search</button>
                </form>
                <a href="{{ route('videos.create')}}" class="btn btn-primary ml-2">Create</a>
            </nav>

            <!-- start -->
            <div class="table-responsive">
                <table class="table table-bordered table-condensed table-striped">
                    <thead>

                        <th width="1%">ID</th>
                        <th width="1%">CATEGORY</th>
                        <th width="58.5%">TITLE</th>
                        <th width="1%"><i class="fas fa-eye" title="Publish to public ?"></i></th>
                        <th width="40%">MODULE</th>

                        <th width="1%" vAlign="centre">DELETE</th>
                    </thead>

                    <tbody>
                        @foreach($data as $key => $row)
                      
                        <tr >
                            <td> <span class="badge-pill badge-dark">{{$row->id }}</span></td>
                            <td> 

                            @if($row->category)
                                <span class="badge badge-primary">
                                    {{$row->category->title }}
                                </span>
                            @endif

                             </td>
                           
                            <td>
                                <a href="{{ route('videos.show', $row->id)}}" ><p class="h5">{{$row->title }}</p></a>
                            </td>
       
                            <td class="text-center">
                                @if( $row->is_published == 1)
                                <i class="fas fa-check"></i>
                                @else 
                                <span style="color: red;"><i class="fas fa-times "></i></span>
                                @endif
                            
                            </title>

                            <td class="text-center">
                                

                                    
                                    <a href="{{ route('videos.edit', $row->id)}}" class="btn-sm btn-success "><i class="fas fa-check-circle"></i> Metadata</a>
                                    
                                    @if (file_exists(public_path('/uploads/' .$row->id. '/trailer/original.mp4')))
                                    <a href="{{ route('videos.trailer', $row->id)}}" class="btn-sm btn-success"><i class="fas fa-check-circle"></i> Trailer</a>
                                    @else
                                    <a href="{{ route('videos.trailer', $row->id)}}" class="btn-sm btn-secondary"><i class="fas fa-times-circle"></i> Trailer</a>
                                    @endif

                                    @if (file_exists(public_path('/uploads/' .$row->id. '/videos/stream.smil')))
                                    <a href="{{ route('videos.video', $row->id)}}" class="btn-sm btn-success"><i class="fas fa-check-circle"></i> Video</a>
                                    @else
                                    <a href="{{ route('videos.video', $row->id)}}" class="btn-sm btn-secondary"><i class="fas fa-times-circle"></i> Video</a>
                                    @endif

                                    @if (file_exists(public_path('/uploads/' .$row->id. '/images/file-1.png')) && file_exists(public_path('/uploads/' .$row->id. '/images/file-2.png'))  )
                                    <a href="{{ route('videos.poster', $row->id)}}" class="btn-sm btn-success"><i class="fas fa-check-circle"></i> Poster</a>
                                    @else
                                    <a href="{{ route('videos.poster', $row->id)}}" class="btn-sm btn-secondary"><i class="fas fa-times-circle"></i> Poster</a>
                                    @endif
                                   
                               

                            </td>

                            <td class="text-center">
                                <form action="{{ route('videos.destroy', $row->id)}}" method="post">
                                @csrf @method('DELETE')
                                <button onclick="return confirm('Are you sure?')" class="btn btn-danger" type="submit"><i class="fas fa-times"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
                
            </div>
          
            {{ $data->links() }}
    
            <!-- end -->
        </div>
    </div>

</div>


@endsection
