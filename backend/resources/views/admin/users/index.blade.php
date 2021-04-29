@extends('layouts.app')
@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">    
        
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/home">{{ __('Home') }}</a></li>
                    <li class="breadcrumb-item"><a href="/users">{{ __('Users') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Index') }}</li>
                </ol>
            </nav>

            @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                 {{ $message }}
            </div>
            @endif

            <nav class="navbar navbar-expand-sm " style="background-color: #dee2e6">
                <form class="form-inline" action="{{ route('users.search') }}" method="POST">
                @csrf
                    <input name="query" class="form-control mr-sm-2" type="text" placeholder="Search by Name">
                    <button class="btn btn-success" type="submit">Search</button>
                </form>
                <a href="{{ route('users.create')}}" class="btn btn-primary ml-2">Create</a>
            </nav>

            <!-- start -->
            <div class="table-responsive">
                <table class="table table-bordered table-condensed table-striped">
                    <thead>

                        <th width="5%">ID</th>
                        <th width="8%">ROLE</th>
                        <th width="*">NAME</th>
                        <th width="20%">EMAIL</th>

                        <th>ACTION</th>
                    </thead>

                    <tbody>
                        @foreach($data as $row)
                        <tr>

                            <td>{{$row->id }}</td>
                            <td>{{$row->role }}</td>
                            <td>{{$row->name }}</td>
                            <td>{{$row->email }}</td>

                            <td width="20%">
                                

                                <form action="{{ route('users.destroy', $row->id)}}" method="post">
                                    @csrf @method('DELETE')
                                    <a href="{{ route('users.show', $row->id)}}" class="btn btn-primary">Show</a>
                                    <a href="{{ route('users.edit', $row->id)}}" class="btn btn-secondary">Edit</a>
                                    <button class="btn btn-danger" type="submit">Delete</button>
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
