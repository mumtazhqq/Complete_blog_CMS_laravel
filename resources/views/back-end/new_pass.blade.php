@include('inc-back.header')
<body>
<div class="o-page o-page--center">
    <div class="o-page__card">
        <div class="c-card c-card--center">

            @include('includes.errors')


            <h4 class="u-mb-medium">Reset Password</h4>

            <form method="POST" action="{{ route('new_pass') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="c-field">
                    <label class="c-field__label">Enter your email</label>
                    <input id="email" name="email" class="c-input u-mb-small" type="email" placeholder="your email" value="{{ $email ?? old('email') }}">
                </div>

                <div class="c-field">
                    <label class="c-field__label">Enter New Password</label>
                    <input id="password" name="password" class="c-input u-mb-small" type="password" placeholder="Numbers, Pharagraphs Only">

                </div>

                <div class="c-field">
                    <label class="c-field__label">Confirm Password</label>
                    <input id="password-confirm" class="c-input u-mb-small" name="password_confirmation" type="password" placeholder="Numbers, Pharagraphs Only">
                </div>

                <button class="c-btn c-btn--fullwidth c-btn--info" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>

@include('inc-back.footer')