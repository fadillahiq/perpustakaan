<div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="index.html">Perpustakaan</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">PP</a>
      </div>
      <ul class="sidebar-menu">
          <li class="menu-header">Dashboard</li>
          <li class="nav-item dropdown {{ request()->route()->getName() === 'dashboard' ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
          </li>
          <li class="menu-header">Menu</li>
          <li class="nav-item {{ (request()->is('admin/data-buku*')) ? 'active' : '' }}"><a class="nav-link" href="{{ route('data.buku') }}"><i class="fas fa-th-large"></i> <span>Buku</span></a></li>
          <li class="nav-item {{ (request()->is('admin/katalog*')) ? 'active' : '' }}"><a class="nav-link" href="{{ route('katalog.index') }}"><i class="fas fa-th-large"></i> <span>Katalog</span></a></li>
          <li class="nav-item {{ (request()->is('admin/data-penerbit*')) ? 'active' : '' }}"><a class="nav-link" href="{{ route('data.penerbit') }}"><i class="fas fa-th-large"></i> <span>Penerbit</span></a></li>
          <li class="nav-item {{ (request()->is('admin/pengarang*')) ? 'active' : '' }}"><a class="nav-link" href="{{ route('pengarang.index') }}"><i class="fas fa-th-large"></i> <span>Pengarang</span></a></li>
          <li class="nav-item {{ (request()->is('admin/data-anggota*')) ? 'active' : '' }}"><a class="nav-link" href="{{ route('data.anggota') }}"><i class="fas fa-th-large"></i> <span>Anggota</span></a></li>
          @role('petugas')
          <li class="nav-item {{ (request()->is('admin/data-peminjaman*')) ? 'active' : '' }}"><a class="nav-link" href="{{ route('data.peminjaman') }}"><i class="fas fa-th-large"></i> <span>Peminjaman</span></a></li>
          @endrole
        </ul>
    </aside>
  </div>
