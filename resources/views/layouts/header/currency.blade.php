@once
    <div class="nav-item d-none d-md-flex me-2"  id="system-currency" style="order:1" data-url="ahmed">
        <a
            class="px-0 nav-link"
            {{-- data-bs-toggle="offcanvas"
            href="#notification-sidebar"
            aria-controls="notification-sidebar" --}}
            role="button"
        >

        <select name="" id="system-currency-select-box" class="form-select">
            <option value="USD">$ USD</option>
            <option value="EUR">€ EUR</option>
            <option value="GBP">£ GBP</option>
            <option value="EGP">£ EGP</option>
        </select>
            {{-- <span class="badge bg-blue text-blue-fg badge-pill notification-count">{{ number_format(10) }}</span> --}}
        </a>
    </div>

@endonce
