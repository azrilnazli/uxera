<table class="table table-dark" id="processing">
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
                @if (file_exists(public_path('/uploads/' .$data->id. '/videos/1080p.mp4')))
                <i class="fa fa-check" aria-hidden="true"></i>
                @else 
                <i class="fa fa-cog fa-lg fa-spin"></i>
                @endif
            </td>
            <td class = "text-center">
                @if (file_exists(public_path('/uploads/' .$data->id. '/videos/720p.mp4')))
                <i class="fa fa-check" aria-hidden="true"></i>
                @else 
                <i class="fa fa-cog fa-lg fa-spin"></i>
                @endif
            </td>
            <td class = "text-center">
                @if (file_exists(public_path('/uploads/' .$data->id. '/videos/480p.mp4')))
                <i class="fa fa-check" aria-hidden="true"></i>
                @else 
                <i class="fa fa-cog fa-lg fa-spin"></i>
                @endif
            </td>
            <td class = "text-center">
                @if (file_exists(public_path('/uploads/' .$data->id. '/videos/240p.mp4')))
                <i class="fa fa-check" aria-hidden="true"></i>
                @else 
                <i class="fa fa-cog fa-lg fa-spin"></i>
                @endif
            </td>
        </tr>
    </tbody>
</table>
