<header class="header">
    <div class="logo-catalog">
        <a class="logo-container" href="/" data-cy="test-header-logo">
            <div class="logo">
                <img src="{{ asset('images/logo.png') }}" alt="Логотип" width="50" height="50">
            </div>
            <div class="tooltip" data-cy="test-header-tooltip">Вернуться на главную</div>
        </a>
        <button class="catalog-btn">Каталог</button>
    </div>
    <div class="search">
        <input type="text" placeholder="Поиск...">
    </div>
    <div class="nav-buttons">
        <div class="nav-button">
            <img src="{{ asset('images/heart.png') }}" alt="Избранное">
            <span>Избранное</span>
        </div>
        <div class="nav-button">
            <img src="{{ asset('images/cart.png') }}" alt="Корзина">
            <span>Корзина</span>
        </div>
        <div class="nav-button">
            <img src="{{ asset('images/user.png') }}" alt="Войти">
            <span>Войти</span>
        </div>
    </div>
</header>