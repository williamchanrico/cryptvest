<div class="{{ $userCardBg }} mdl-card__title @if (Auth::user()->profile->user_profile_bg == NULL) @endif" @if (Auth::user()->profile->user_profile_bg != NULL) style="background: url('{{Auth::user()->profile->user_profile_bg}}') center/cover;" @endif>
    <h2 class="mdl-card__title-text mdl-title-username mdl-color-text--white text-center">
        Hi {{ Auth::user()->name }}
    </h2>
</div>
<div class="mdl-card__supporting-text mdl-color-text--grey-600">
    <p>
        <em>Thank you</em> for checking out CryptVest. <strong>Please contact us if you have suggestions or want to report something!</strong>
    </p>
    <p>Start using CryptVest by adding coins you bought!</p>
    <a href="{{ route('coin.create') }}" class="mdl-button mdl-js-button mdl-button--default">ADD NEW COIN</a>
</div>