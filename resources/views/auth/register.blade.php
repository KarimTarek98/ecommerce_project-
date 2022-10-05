<div class="col-md-6 col-sm-6 create-new-account">
    <h4 class="checkout-subtitle">Create a new account</h4>
    <p class="text title-tag-line">Create your new account.</p>

    <form class="register-form outer-top-xs" action="{{ route('register') }}"
    method="POST" role="form">
    @csrf

        <div class="form-group">
            <label class="info-title" for="name">Name <span>*</span></label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control unicase-form-control text-input"
                id="name">
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label class="info-title" for="email">Email Address <span>*</span></label>
            <input type="email" name="email" value="{{ old('email') }}" class="form-control unicase-form-control text-input"
                id="email">
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label class="info-title" for="phone">Phone Number <span>*</span></label>
            <input type="text" name="phone" value="{{ old('phone') }}" class="form-control unicase-form-control text-input"
                id="phone">
            @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label class="info-title" for="password">Password <span>*</span></label>
            <input type="password" name="password" class="form-control unicase-form-control text-input"
                id="password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label class="info-title" for="password_confirmation">Confirm Password <span>*</span></label>
            <input type="password" name="password_confirmation" class="form-control unicase-form-control text-input"
                id="password_confirmation">
            @error('password_confirmation')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Sign Up</button>
    </form>


</div>
