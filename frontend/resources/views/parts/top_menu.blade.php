@foreach($categories as $k => $v)
    @if( $current == $k ) 
        <a class="nav-item nav-link active " href="{{ route('by_category', $k ) }}">{{ $v }}</a>
    @else
        <a class="nav-item nav-link" href="{{ route('by_category', $k ) }}">{{ $v }}</a>    
    @endif
@endforeach