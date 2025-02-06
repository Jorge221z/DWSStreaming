<div class="language-switcher" >
    @if (session('locale', config('app.locale')) == 'es')
        <a href="{{ route('lang.switch', ['lang' => 'en']) }}" class="bot">EN</a>
    @else
        <a href="{{ route('lang.switch', ['lang' => 'es']) }}" class="bot">ES</a>
    @endif
</div>
