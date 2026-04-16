<header class="main-header">
    <div class="header-container">
        <div class="logo">
            <a href="index.php">LA FLORISTERÍA</a>
        </div>

        <div class="search-bar">
            <form action="index.php?page=search" method="POST">
                <input type="text" name="txtSearch" placeholder="Buscar flores, ramos, ocasiones...">
                <button type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>

        <div class="header-actions">
            <a href="index.php?page=login" class="action-item">
                <span class="action-text">Hola, Identifícate</span>
                <span class="action-title">Cuenta</span>
            </a>
            <a href="index.php?page=cart" class="cart-container">
                <div class="cart-icon">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="cart-count">0</span>
                </div>
                <span class="cart-text">Carrito</span>
            </a>
        </div>
    </div>
</header>