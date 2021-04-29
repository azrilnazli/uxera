@extends('layouts.mobile')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.min.js"></script>

<script type="text/javascript">
var $j = jQuery.noConflict();
$j( document ).ready(function() {
    $j('ul.pagination').hide();
    $j(function() {
        $j('.scrolling-pagination').jscroll({
            autoTrigger: true,
            loadingHtml: '<img class="img-responsive text-center" src="/src/ajax-loader.gif" alt="Loading..." />',
            padding: 0,
            nextSelector: '.pagination li.active + li a',
            contentSelector: 'div.scrolling-pagination',
            callback: function() {
                $j('ul.pagination').remove();
            }
        });
    });
});
</script>
<div class="container-fluid">
    <div class="d-flex justify-content-center">
        <div class="scrolling-pagination">
            @foreach($data as $video)
            <div class="card mt-1 mb-1" style="width:202px;height:302px">
                <a href="{{ route('play',$video->id) }}"><img  class="img-thumbnail" style="width:200px;height:300px" src=" {{ config('settings.asset_server') .  $video->id }}/images/file-1-small.png" /></a>
            </div>
            @endforeach
            {{ $data->links() }}
        </div>
    </div>    
</div>

@endsection 