@include('inc-back.header')
<div class="o-page o-page--center">
    <div class="o-page__card">
        <div class="c-card c-card--center">

            @include('includes.errors')

            <h4 class="u-mb-medium">Sing Up to Get Started</h4>
            <form action="{{ route('register_new_user') }}" method="POST">
                @csrf
                <div class="c-field">
                    <label class="c-field__label">Name</label>
                    <input class="c-input u-mb-small" type="text" placeholder="e.g. sara Sandler" name="name" value="{{ old('name') }}">
                </div>

                <div class="c-field">
                    <label class="c-field__label">Email Address</label>
                    <input class="c-input u-mb-small" type="email" placeholder="e.g. adam@sandler.com" name="email" value="{{ old('email') }}">
                </div>

                <div class="c-field u-mb-small">
                    <label class="c-field__label">Password</label>
                    <input class="c-input" type="password" placeholder="Numbers, Pharagraphs Only" name="password" >
                </div>

                <div class="c-field u-mb-small">
                    <label class="c-field__label">Confirm Password</label>
                    <input class="c-input" type="password" placeholder="Rewrite your password" name="password_confirmation">
                </div>

                <button class="c-btn c-btn--fullwidth c-btn--info" type="submit">Register</button>
            </form>
            <br>
            <a href="{{ route('password.request') }}">Forgotten account?</a> | <a href="{{ route('login') }}">Login</a>

        </div>
    </div>
</div>

@include('inc-back.footer')