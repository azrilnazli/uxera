<div class="form-group row">
    <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Address') }}</label>
    <div class="col-md">
        <textarea name="address" id="" cols="30" rows="5" class="form-control  @error('address') is-invalid @enderror"></textarea>
        @error('address')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>    



<div class="form-group row">
    <div class="col-md-2"></div> 
    
    <div class="col-md">
    <button type="submit" class="btn btn-primary">
                {{ __('Save') }}
    </button>   
    </div>
</div>



