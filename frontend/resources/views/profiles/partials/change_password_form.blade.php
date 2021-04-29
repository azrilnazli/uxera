<form action="{{ route('update_password') }}" method="post">
@csrf

<div class="form-group row">

    <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Current Password') }}</label>

    <div class="col-md">
        <input class="form-control @error('current_password') is-invalid @enderror" type="password" name="current_password" id="current_password">

        @error('current_password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>    

<div class="form-group row">

    <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Password') }}</label>

    <div class="col-md">
        <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" id="password">

        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>    

<div class="form-group row">
        <label for="password-confirm" class="col-md-2 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

        <div class="col-md">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
        </div>
</div>    

<div class="form-group row">
    <div class="col-md-2"></div> 
    
    <div class="col-md">
    <button type="submit" class="btn btn-primary">
                {{ __('Update') }}
    </button>   
    </div>
</div>

</form>