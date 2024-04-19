<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="{{ $type_menu == 'dashboard' ? 'active' : '' }}">
                <a class="nav-link" href="/"><i class="fa-solid fa-house"></i> <span>Dashboard</span></a>
            </li>
            <li class="{{ $type_menu == 'product' ? 'active' : '' }}">
                <a class="nav-link" href="/products"><i class="fa-solid fa-shopping-cart"></i> <span>Produk</span></a>
            </li>
            <li class="{{ $type_menu == 'user' ? 'active' : '' }}">
                <a class="nav-link" href="/user"><i class="fa-solid fa-user"></i> <span>User</span></a>
            </li>
            <li class="{{ $type_menu == 'sale' ? 'active' : '' }}">
                <a class="nav-link" href="/sale"><i class="fa-solid fa-shopping-bag"></i> <span>Penjualan</span></a>
            </li>
        </ul>

        <div class="hide-sidebar-mini mt-4 mb-4 p-3">

        </div>
    </aside>
</div>
