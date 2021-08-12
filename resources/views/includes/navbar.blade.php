<div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
            @php
                $now = date('Y-m-d');
                $data_lewat = App\Models\Peminjaman::select('*', Illuminate\Support\Facades\DB::raw('DATEDIFF("'.$now.'", tanggal_kembali) as jumlah_lewat'))
                ->with('anggota')
                ->where('tanggal_kembali','<', date('Y-m-d'))
                ->where('status','=', 0)
                ->get();
            @endphp
            <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
                <div class="dropdown-menu dropdown-list dropdown-menu-right">
                  <div class="dropdown-header">Notifications
                  </div>
                  <div class="dropdown-list-content dropdown-list-icons">
                    @foreach ($data_lewat as $lewat)
                    <a href="#" class="dropdown-item dropdown-item-unread">
                        <div class="dropdown-item-desc">
                            {{ $lewat['anggota']['name'] }}
                          <div class="time text-primary">Melewati batas waktu {{ $lewat['jumlah_lewat'] }} hari</div>
                        </div>
                    </a>
                    @endforeach
                  </div>
                </div>
              </li>
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="{{ url('avatars') }}/{{ Auth::user()->avatar }}" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">Logged In {{ Carbon\Carbon::parse(Auth::user()->last_login_at)->diffForHumans() }}</div>
              <a href="{{ route('profile.get', Auth::user()->id) }}" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <a href="{{ route('change.password.view') }}" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
              </a>
              <div class="dropdown-divider"></div>
              <a href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();"
                 class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </div>
          </li>
        </ul>
      </nav>
