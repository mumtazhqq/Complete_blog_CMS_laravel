@include('inc-back.header')
<body>

<div class="o-page o-page--center">
    <div class="o-page__card">
        <div class="c-card c-card--center">

            @include('includes.errors')

            @if(Session::get('status'))
            <div class="uk-alert-success" uk-alert>
                <a class="uk-alert-close" uk-close></a>
                    <h5>{{ Session::get('status') }}</h5>
            </div>
            @endif

            <h4 class="u-mb-medium">Forgot Your Password</h4>
            <form action="{{ route('password.email') }}" method="POST">
                @csrf

                <div class="c-field">
                    <label class="c-field__label">Email Address</label>

                    <input class="c-input u-mb-small" type="email" placeholder="e.g. adam@sandler.com" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}">


                </div>



                <button class="c-btn c-btn--fullwidth c-btn--info" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>

@include('inc-back.footer')