
<table class="table-borderless">
    <tr>
        <td colspan=3  scope="col">@include('profiles.partials.avatar')</td>
    </tr>


    <tr>
        <td  scope="col"><strong>User Level</strong></td>
        <td style="width:30px"></td>
        <td  scope="col"> {{ auth()->user()->role }}</td>
    </tr>

    <tr>
        <td  scope="col"><strong>Email</strong></td>
        <td  style="width:30px"></td>
        <td  scope="col"> {{ auth()->user()->email }}</td>
    </tr>

    <tr>
        <td  scope="col"><strong>Address</strong></td>
        <td  style="width:30px"></td>
        <td  scope="col">{!! nl2br(e($profile->address)) !!}</td>
    </tr>

    <tr>
      <td  scope="col"><strong>Member Since</strong></td>
      <td style="width:30px"></td>
      <td  scope="col">{{ \Carbon\Carbon::parse(auth()->user()->created_at)->diffForHumans() }}</td>
    </tr>

</table>

