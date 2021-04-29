@extends('layouts.app')

@section('content')


    @include('/parts/carousel', $data = $row[1])
    @include('/parts/carousel', $data = $row[2])


@endsection 