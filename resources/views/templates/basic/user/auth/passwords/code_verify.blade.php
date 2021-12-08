@extends($activeTemplate.'layouts.auth')
@section('content')

<section class="account-section">
    <div class="left" style="background-image: url('{{ getImage('assets/images/frontend/auth/'.getContent('auth.content',true)->data_values->image) }}');">
        <div class="left-inner text-center">
            <h3 class="title text-white mt-2">@lang('Verification Code')</h3>
        </div>
    </div>

    <div class="right">
        <div class="top w-100 text-center">
            <a href="{{route('home')}}" class="account-logo"><img src="{{getImage(imagePath()['logoIcon']['path'] .'/logo.png')}}" alt="@lang('logo')"></a>
        </div>
        <div class="middle w-100">
            <form action="{{ route('user.password.verify.code') }}" method="POST" class="contact-form row mb--25 align-items-center">
                @csrf
                <input type="hidden" name="email" value="{{ $email }}">
                <div class="col-md-12">
                    <div class="contact-form-group">
                        <label for="username">@lang('Verification Code')</label>
                        <input type="text" name="code" maxlength="7" id="code"  placeholder="@lang('Enter Verification Code')" required="">
                    </div>
                </div>

                <div class="col-md-12 pt-3">
                    <div class="contact-form-group">
                        <button type="submit">@lang('Verify Code') <i class="las la-sign-in-alt"></i></button>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="contact-form-group">
                        <p class="text-white m-0">@lang('Please check including your Junk/Spam Folder. if not found, you can')
                            <a class="text-theme" href="{{ route('user.password.request') }}">@lang('Try to send again')</a>
                        </p>
                    </div>
                </div>
            </form>
        </div>
        <div class="bottom w-100 text-center">
            <p class="text-white">&copy; @lang('All Right Reserved By') <a href="{{route('home')}}" class="text--base">{{__($general->sitename)}}</a></p>
        </div>
    </div>
</section>
@endsection
@push('script')
<script>
    (function($){
        "use strict";
        $('#code').on('input change', function () {
          var xx = document.getElementById('code').value;
          $(this).val(function (index, value) {
             value = value.substr(0,7);
              return value.replace(/\W/gi, '').replace(/(.{3})/g, '$1 ');
          });
      });
    })(jQuery)
</script>
@endpush