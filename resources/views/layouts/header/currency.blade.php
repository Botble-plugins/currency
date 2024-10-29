@php
    Assets::addScriptsDirectly('vendor/core/plugins/currency/js/currency.js');
@endphp
@once
    <div class="nav-item d-none d-md-flex me-2" style="order:1">
        <a
            class="px-0 nav-link"
            role="button"
        >
            <select  id="header-currency-dropdown" data-url="{{ route('currency.update.default')}}" class="form-select">
                @foreach (get_all_currencies() as  $currency)
                    <option value="{{ $currency->id }}" {{ $currency->id == get_application_currency()->id ? 'selected' : '' }}>{{ $currency->symbol }}</option>
                @endforeach
            </select>
        </a>
    </div>
@endonce
