@extends('layouts.app')
@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">    
        
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/home">{{ __('Home') }}</a></li>
                    <li class="breadcrumb-item"><a href="/categories">{{ __('Categories') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Index') }}</li>
                </ol>
            </nav>

            @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                 {{ $message }}
            </div>
            @endif

            <nav class="navbar navbar-expand-sm " style="background-color: #dee2e6">
                <form class="form-inline" action="{{ route('categories.search') }}" method="POST">
                @csrf
                    <input name="query" class="form-control mr-sm-2" type="text" placeholder="Search by Title">
                    <button class="btn btn-success" type="submit">Search</button>
                </form>
                <a href="{{ route('categories.create')}}" class="btn btn-primary ml-2">Create</a>
            </nav>

            <!-- start -->
            <div class="table-responsive">
                <table class="table table-bordered table-condensed table-striped">
                    <thead>

                        <th width="1%">ID</th>
                        <th width="20%">TITLE</th>
                        <th width="50%">DESCRIPTION</th>
                        <th width="13%">MANAGE</th>
                        <th width="1%">DELETE</th>
                    </thead>

                    <tbody>
                        @foreach($data as $row)
                        <tr >

                            <td>{{$row->id }}</td>
                            <td>{{$row->title }}</td>
                            <td>{{$row->description }}</td>
                            <td>       
                                    <a href="{{ route('categories.show', $row->id)}}" class="btn btn-primary">Show</a>
                                    <a href="{{ route('categories.edit', $row->id)}}" class="btn btn-secondary">Edit</a>
                            </td>

                            <td>
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
