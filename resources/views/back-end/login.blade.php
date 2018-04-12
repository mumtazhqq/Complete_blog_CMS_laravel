@include('inc-back.header')

<div class="o-page o-page--center">
<div class="o-page__card">
<div class="c-card c-card--center">

    @include('includes.errors')

    <h4 class="u-mb-medium">Welcome Back :)</h4>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="c-field">
            <label class="c-field__label">Email Address</label>
            <input class="c-input u-mb-small" id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Your Email">
        </div>

        <div class="c-field">
            <label class="c-field__label">Password</label>
            <input class="c-input u-mb-small" type="password" placeholder="Your Password" name="password">
        </div>

        <button type="submit" class="c-btn c-btn--fullwidth c-btn--info">Login</button>
    </form>
    <br>
    <a href="{{ route('password.request') }}">Forgotten account?</a> | <a href="{{ route('show_register') }}">Sign Up</a>

</div>
</div>
</div>

@include('inc-back.footer')
