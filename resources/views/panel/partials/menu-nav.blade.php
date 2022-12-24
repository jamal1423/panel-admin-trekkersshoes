<div class="aside-menu-wrapper flex-column-fluid overflow-auto h-100" id="tc_aside_menu_wrapper">
  <div id="tc_aside_menu" class="aside-menu  mb-5" data-menu-vertical="1" data-menu-scroll="1"
    data-menu-dropdown-timeout="500">
    <div id="accordion">
      <ul class="nav flex-column">
        @role('Administrator')
        <li class="nav-item {{Request::is('/') ? 'active' : '' }}">
          <a href="{{ url('/') }}" class="nav-link">
            <span class="svg-icon nav-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                <polyline points="9 22 9 12 15 12 15 22"></polyline>
              </svg>
            </span>
            <span class="nav-text">
              Beranda
            </span>
          </a>
        </li>
        <li class="nav-item @if(Request::is('produk-all') || Request::is('produk-baru') || Request::is('produk-populer') || Request::is('produk/*')) active @else @endif">
          <a  class="nav-link" data-toggle="collapse"  href="javascript:void(0)" data-target="#catalog" role="button" aria-expanded="false" aria-controls="catalog">
            <span class="svg-icon nav-icon">
              <i class="fas fa-boxes font-size-h4"></i>
            </span>
            <span class="nav-text">Produk</span>
            <i class="fas fa-chevron-right fa-rotate-90"></i>
          </a>
          <div class="collapse nav-collapse @if(Request::is('produk-all') || Request::is('produk-baru') || Request::is('produk-populer') || Request::is('produk/*')) show @else @endif" id="catalog" data-parent="#accordion">
            <div id="accordion1">
              <ul class="nav flex-column">
                <li class="nav-item">
                  <a href="{{ url('/produk-all') }}" class="nav-link sub-nav-link {{Request::is('produk-all') ? 'active' : '' }}">
                    <span class="svg-icon nav-icon d-flex justify-content-center">
                      <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        </svg>
                    </span>
                    <span class="nav-text">Data Semua Produk</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('/produk-baru') }}" class="nav-link sub-nav-link {{Request::is('produk-baru') ? 'active' : '' }}">
                    <span class="svg-icon nav-icon d-flex justify-content-center">
                      <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        </svg>
                    </span>
                    <span class="nav-text">Produk Baru</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('/produk-populer') }}" class="nav-link sub-nav-link {{Request::is('produk-populer') ? 'active' : '' }}">
                    <span class="svg-icon nav-icon d-flex justify-content-center">
                      <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        </svg>
                    </span>
                    <span class="nav-text">Produk Populer</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </li>
        <li class="nav-item @if(Request::is('transaksi-baru') || Request::is('transaksi-baru/*') || Request::is('transaksi-selesai') || Request::is('transaksi-selesai/*') || Request::is('transaksi-batal') || Request::is('transaksi-batal/*')) active @else @endif">
          <a  class="nav-link" data-toggle="collapse" href="#transaksiReseller" role="button" aria-expanded="false" aria-controls="transaksiReseller">
            <span class="svg-icon nav-icon">
              <i class="fas fa-money-check-alt font-size-h4"></i>
            </span>
            <span class="nav-text">Transaksi Reseller</span>
            <i class="fas fa-chevron-right fa-rotate-90"></i>
          </a>
          <div class="collapse nav-collapse @if(Request::is('transaksi-baru') || Request::is('transaksi-baru/*') || Request::is('transaksi-selesai') || Request::is('transaksi-selesai/*') || Request::is('transaksi-batal')) || Request::is('transaksi-batal/*')) show @else @endif" id="transaksiReseller"  data-parent="#accordion">
            <div id="accordion2">
              <ul class="nav flex-column">
                <li class="nav-item">
                  <a href="{{ url('/transaksi-baru') }}" class="nav-link sub-nav-link @if(Request::is('transaksi-baru') || Request::is('transaksi-baru/*')) active @else @endif">
                    <span class="svg-icon nav-icon d-flex justify-content-center">
                      <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        </svg>
                    </span>
                    <span class="nav-text">Baru</span>
                    <span class="badge badge-pill badge-danger" id="transaksiBaru">0</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('/transaksi-selesai') }}" class="nav-link sub-nav-link @if(Request::is('transaksi-selesai') || Request::is('transaksi-selesai/*')) active @else @endif">
                    <span class="svg-icon nav-icon d-flex justify-content-center">
                      <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        </svg>
                    </span>
                    <span class="nav-text">Selesai</span>
                    <span class="badge badge-pill badge-danger" id="transaksiSelesai">0</span>
                  </a>
                </li>
                
                <li class="nav-item">
                  <a href="{{ url('/transaksi-batal') }}" class="nav-link sub-nav-link @if(Request::is('transaksi-batal') || Request::is('transaksi-batal/*')) active @else @endif">
                    <span class="svg-icon nav-icon d-flex justify-content-center">
                      <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        </svg>
                    </span>
                    <span class="nav-text">Batal</span>
                    <span class="badge badge-pill badge-danger" id="transaksiBatal">0</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </li>
        <li class="nav-item @if(Request::is('manifest-baru') || Request::is('manifest-baru/*') || Request::is('manifest-proses') || Request::is('manifest-proses/*') || Request::is('manifest-verifikasi-nota') || Request::is('manifest-verifikasi/*') || Request::is('manifest-selesai') || Request::is('manifest-selesai/*') || Request::is('manifest-batal') || Request::is('manifest-batal/*')) active @else @endif">
          <a  class="nav-link" data-toggle="collapse" href="#transaksiStockist" role="button" aria-expanded="false" aria-controls="transaksiStockist">
            <span class="svg-icon nav-icon">
              <i class="fas fa-money-check-alt font-size-h4"></i>
            </span>
            <span class="nav-text">Transaksi Stockist</span>
            <i class="fas fa-chevron-right fa-rotate-90"></i>
          </a>
          <div class="collapse nav-collapse @if(Request::is('manifest-baru') || Request::is('manifest-baru/*') || Request::is('manifest-proses') || Request::is('manifest-proses/*') || Request::is('manifest-verifikasi-nota') || Request::is('manifest-verifikasi/*') || Request::is('manifest-selesai') || Request::is('manifest-selesai/*') || Request::is('manifest-batal') || Request::is('manifest-batal/*')) show @else @endif" id="transaksiStockist"  data-parent="#accordion">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a href="{{ url('/manifest-baru') }}" class="nav-link sub-nav-link @if(Request::is('manifest-baru') || Request::is('manifest-baru/*')) active @else @endif">
                  <span class="svg-icon nav-icon d-flex justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                      </svg>
                  </span>
                  <span class="nav-text">Baru</span><span class="badge badge-pill badge-danger" id="totalManifestBaru">0</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/manifest-proses') }}" class="nav-link sub-nav-link @if(Request::is('manifest-proses') || Request::is('manifest-proses/*')) active @else @endif">
                  <span class="svg-icon nav-icon d-flex justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                      </svg>
                  </span>
                  <span class="nav-text">Proses</span><span class="badge badge-pill badge-danger" id="totalManifestProses">0</span>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="{{ url('/manifest-verifikasi-nota') }}" class="nav-link sub-nav-link @if(Request::is('manifest-verifikasi-nota') || Request::is('manifest-verifikasi/*')) active @else @endif">
                  <span class="svg-icon nav-icon d-flex justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                      </svg>
                  </span>
                  <span class="nav-text">Verifikasi Nota</span><span class="badge badge-pill badge-danger" id="totalManifestVerifikasiNota">0</span>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="{{ url('/manifest-selesai') }}" class="nav-link sub-nav-link @if(Request::is('manifest-selesai') || Request::is('manifest-selesai/*')) active @else @endif">
                  <span class="svg-icon nav-icon d-flex justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                      </svg>
                  </span>
                  <span class="nav-text">Selesai</span><span class="badge badge-pill badge-danger" id="totalManifestSelesai">0</span>
                </a>
              </li>
            </ul>
          </div>
        </li>

        <li class="nav-item @if(Request::is('laporan-penjualan-pelanggan') || Request::is('laporan-penjualan-trekkers-link') || Request::is('laporan-fee-koordinator') || Request::is('laporan-produk-favorit')) active @else @endif">
          <a  class="nav-link" data-toggle="collapse" href="#reports" role="button" aria-expanded="false" aria-controls="reports">
            <span class="svg-icon nav-icon">
              <i class="fas fa-chart-line font-size-h4"></i>
            </span>
            <span class="nav-text">Laporan</span>
            <i class="fas fa-chevron-right fa-rotate-90"></i>
          </a>
          <div class="collapse nav-collapse @if(Request::is('laporan-penjualan-pelanggan') || Request::is('laporan-penjualan-trekkers-link') || Request::is('laporan-fee-koordinator') || Request::is('laporan-produk-favorit')) show @else @endif" id="reports" data-parent="#accordion">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a href="{{ url('/laporan-penjualan-pelanggan') }}" class="nav-link sub-nav-link @if(Request::is('laporan-penjualan-pelanggan')) active @else @endif">
                  <span class="svg-icon nav-icon d-flex justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                      </svg>
                  </span>
                  <span class="nav-text">Penjualan Per Pelanggan</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/laporan-penjualan-trekkers-link') }}" class="nav-link sub-nav-link @if(Request::is('laporan-penjualan-trekkers-link')) active @else @endif">
                  <span class="svg-icon nav-icon d-flex justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                      </svg>
                  </span>
                  <span class="nav-text">Penjualan Trekkers Link</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/laporan-fee-koordinator') }}" class="nav-link sub-nav-link @if(Request::is('laporan-fee-koordinator')) active @else @endif">
                  <span class="svg-icon nav-icon d-flex justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                      </svg>
                  </span>
                  <span class="nav-text">Fee Koordinator</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/laporan-produk-favorit') }}" class="nav-link sub-nav-link @if(Request::is('laporan-produk-favorit')) active @else @endif">
                  <span class="svg-icon nav-icon d-flex justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                      </svg>
                  </span>
                  <span class="nav-text">Produk Favorit</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item @if(Request::is('member-trekkers') || Request::is('member-verifikasi') || Request::is('admin-trekkers')) active @else @endif">
          <a  class="nav-link" data-toggle="collapse" href="#People" role="button" aria-expanded="false" aria-controls="People">
            <span class="svg-icon nav-icon">
              <i class="fas fa-user-friends font-size-h4"></i>
            </span>
            <span class="nav-text">Data User</span>
            <i class="fas fa-chevron-right fa-rotate-90"></i>
          </a>
          <div class="collapse nav-collapse @if(Request::is('admin-trekkers') || Request::is('member-trekkers') || Request::is('member-verifikasi')) show @else @endif" id="People" data-parent="#accordion">
            <div id="accordion2">
              <ul class="nav flex-column">
                <li class="nav-item @if(Request::is('admin-trekkers')) active @else @endif">
                  <a class="nav-link sub-nav-link" data-toggle="collapse" href="#adminWeb" role="button" aria-expanded="false" aria-controls="adminWeb">
                    <span class="svg-icon nav-icon d-flex justify-content-center">
                      <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
                        </svg>
                    </span>
                    <span class="nav-text">Admin Website</span>
                    <i class="fas fa-chevron-right fa-rotate-90"></i>
                  </a>
                  <div class="collapse nav-collapse @if(Request::is('admin-trekkers')) show @else @endif" id="adminWeb" data-parent="#accordion2">
                    <ul class="nav flex-column">
                      <li class="nav-item">
                        <a href="{{ url('/admin-trekkers') }}" class="nav-link mini-sub-nav-link @if(Request::is('admin-trekkers')) active @else @endif">
                          <span class="nav-text">List Data Admin</span>
                        </a>
                      </li>
                    </ul>
                  </div>	
                </li>
                
                <li class="nav-item @if(Request::is('member-trekkers') || Request::is('member-verifikasi')) active @else @endif">
                  <a class="nav-link sub-nav-link" data-toggle="collapse" href="#pelangganWeb" role="button" aria-expanded="false" aria-controls="pelangganWeb">
                    <span class="svg-icon nav-icon d-flex justify-content-center">
                      <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
                        </svg>
                    </span>
                    <span class="nav-text">Pelanggan Trekkers</span>
                    <i class="fas fa-chevron-right fa-rotate-90"></i>
                  </a>
                  <div class="collapse nav-collapse @if(Request::is('member-verifikasi') || Request::is('member-trekkers')) show @else @endif" id="pelangganWeb" data-parent="#accordion2">
                    <ul class="nav flex-column">
                      <li class="nav-item">
                        <a href="{{ url('/member-trekkers') }}" class="nav-link mini-sub-nav-link @if(Request::is('member-trekkers')) active @else @endif">
                          <span class="nav-text">List Data Pelanggan</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ url('/member-verifikasi') }}" class="nav-link mini-sub-nav-link @if(Request::is('member-verifikasi')) active @else @endif">
                          <span class="nav-text">Verifikasi Manual</span>
                        </a>
                      </li>
                    </ul>
                  </div>	
                </li>
              </ul> 
            </div>
          </div>
        </li>
            
        <li class="nav-item @if(Request::is('setting-slider') || Request::is('setting-poin') || Request::is('setting-cashback') || Request::is('setting-daily-visit') || Request::is('setting-group-pelanggan') || Request::is('setting-voucher') || Request::is('setting-bonus-pelanggan') || Request::is('setting-promo-barang') || Request::is('setting-url-sosmed')) active @else @endif">
          <a  class="nav-link" data-toggle="collapse" href="#setting" role="button" aria-expanded="false" aria-controls="setting">
            <span class="svg-icon nav-icon">
              <i class="fas fa-cogs font-size-h4"></i>
            </span>
            <span class="nav-text">Pengaturan</span>
            <i class="fas fa-chevron-right fa-rotate-90"></i>
          </a>
          <div class="collapse nav-collapse @if(Request::is('setting-slider') || Request::is('setting-poin') || Request::is('setting-cashback') || Request::is('setting-daily-visit') || Request::is('setting-group-pelanggan') || Request::is('setting-voucher') || Request::is('setting-bonus-pelanggan') || Request::is('setting-promo-barang') || Request::is('setting-url-sosmed')) show @else @endif" id="setting" data-parent="#accordion">
            <div id="accordion3">
              <ul class="nav flex-column">
                <li class="nav-item @if(Request::is('setting-slider')) active @else @endif">
                  <a  class="nav-link sub-nav-link" data-toggle="collapse" href="#settingB" role="button" aria-expanded="false" aria-controls="settingB">
                  <span class="svg-icon nav-icon d-flex justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                      </svg>
                  </span>
                    <span class="nav-text">Beranda</span>
                    <i class="fas fa-chevron-right fa-rotate-90"></i>
                  </a>
                  <div class="collapse nav-collapse @if(Request::is('setting-slider')) show @else @endif" id="settingB" data-parent="#accordion3">
                    <ul class="nav flex-column">
                      <li class="nav-item">
                        <a href="{{ url('/setting-slider') }}"  class="nav-link mini-sub-nav-link @if(Request::is('setting-slider')) active @else @endif">
                          <span class="nav-text">Slider</span>
                        </a>
                      </li>
                    </ul>
                  </div>	
                </li>
                <li class="nav-item @if(Request::is('setting-poin') ||Request::is('setting-cashback') || Request::is('setting-daily-visit')) active @else @endif">
                  <a  class="nav-link sub-nav-link" data-toggle="collapse" href="#settingW" role="button" aria-expanded="false" aria-controls="settingW">
                  <span class="svg-icon nav-icon d-flex justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                      </svg>
                  </span>
                    <span class="nav-text">Poin dan Cashback</span>
                    <i class="fas fa-chevron-right fa-rotate-90"></i>
                  </a>
                  <div class="collapse nav-collapse @if(Request::is('setting-poin') || Request::is('setting-cashback') || Request::is('setting-daily-visit')) show @else @endif" id="settingW" data-parent="#accordion3">
                    <ul class="nav flex-column">
                      <li class="nav-item">
                        <a href="{{ url('/setting-poin') }}" class="nav-link mini-sub-nav-link @if(Request::is('setting-poin')) active @else @endif">
                          <span class="nav-text">Poin</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ url('/setting-cashback') }}" class="nav-link mini-sub-nav-link @if(Request::is('setting-cashback')) active @else @endif">
                          <span class="nav-text">Cashback</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ url('/setting-daily-visit') }}" class="nav-link mini-sub-nav-link @if(Request::is('setting-daily-visit')) active @else @endif">
                          <span class="nav-text">Daily Visit</span>
                        </a>
                      </li>
                    </ul>
                  </div>	
                </li>
                <li class="nav-item @if(Request::is('setting-group-pelanggan') || Request::is('setting-voucher') || Request::is('setting-bonus-pelanggan') || Request::is('setting-promo-barang')) active @else @endif">
                  <a  class="nav-link sub-nav-link"  data-toggle="collapse" href="#settingA" role="button" aria-expanded="false" aria-controls="settingA">
                  <span class="svg-icon nav-icon d-flex justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                      </svg>
                  </span>
                    <span class="nav-text">Master</span>
                    <i class="fas fa-chevron-right fa-rotate-90"></i>
                  </a>
                  <div class="collapse nav-collapse @if(Request::is('setting-group-pelanggan') || Request::is('setting-voucher') || Request::is('setting-bonus-pelanggan') || Request::is('setting-promo-barang')) show @else @endif" id="settingA" data-parent="#accordion3">
                    <ul class="nav flex-column">
                      <li class="nav-item">
                        <a href="{{ url('/setting-group-pelanggan') }}" class="nav-link mini-sub-nav-link @if(Request::is('setting-group-pelanggan')) active @else @endif">
                          <span class="nav-text">Group Pelanggan</span>
                        </a>
                      </li>

                      <li class="nav-item">
                        <a href="{{ url('/setting-voucher') }}" class="nav-link mini-sub-nav-link @if(Request::is('setting-voucher')) active @else @endif">
                          <span class="nav-text">Voucher</span>
                        </a>
                      </li>
                      
                      <li class="nav-item">
                        <a href="{{ url('/setting-bonus-pelanggan') }}" class="nav-link mini-sub-nav-link @if(Request::is('setting-bonus-pelanggan')) active @else @endif">
                          <span class="nav-text">Bonus Penjualan</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ url('/setting-promo-barang') }}" class="nav-link mini-sub-nav-link @if(Request::is('setting-promo-barang')) active @else @endif">
                          <span class="nav-text">Promo Barang</span>
                        </a>
                      </li>
                    </ul>
                  </div>	
                </li>
                <li class="nav-item @if(Request::is('setting-url-sosmed')) active @else @endif">
                  <a  class="nav-link sub-nav-link" data-toggle="collapse" href="#settingUrl" role="button" aria-expanded="false" aria-controls="settingUrl">
                  <span class="svg-icon nav-icon d-flex justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                      </svg>
                  </span>
                    <span class="nav-text">Url Sosmed</span>
                    <i class="fas fa-chevron-right fa-rotate-90"></i>
                  </a>
                  <div class="collapse nav-collapse @if(Request::is('setting-url-sosmed')) show @else @endif" id="settingUrl" data-parent="#accordion3">
                    <ul class="nav flex-column">
                      <li class="nav-item">
                        <a href="{{ url('/setting-url-sosmed') }}"  class="nav-link mini-sub-nav-link @if(Request::is('setting-url-sosmed')) active @else @endif">
                          <span class="nav-text">Data Url</span>
                        </a>
                      </li>
                    </ul>
                  </div>	
                  <br>
                  <br>
                  <br>
                  <br>
                </li>
              </ul>
            </div>
          </div>
        </li>
        @endrole

        @role('WebAdmin')
        <li class="nav-item {{Request::is('/') ? 'active' : '' }}">
          <a href="{{ url('/') }}" class="nav-link">
            <span class="svg-icon nav-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                <polyline points="9 22 9 12 15 12 15 22"></polyline>
              </svg>
            </span>
            <span class="nav-text">
              Beranda
            </span>
          </a>
        </li>
        <li class="nav-item @if(Request::is('produk-all') || Request::is('produk-baru') || Request::is('produk-populer') || Request::is('produk/*')) active @else @endif">
          <a  class="nav-link" data-toggle="collapse"  href="javascript:void(0)" data-target="#catalog" role="button" aria-expanded="false" aria-controls="catalog">
            <span class="svg-icon nav-icon">
              <i class="fas fa-boxes font-size-h4"></i>
            </span>
            <span class="nav-text">Produk</span>
            <i class="fas fa-chevron-right fa-rotate-90"></i>
          </a>
          <div class="collapse nav-collapse @if(Request::is('produk-all') || Request::is('produk-baru') || Request::is('produk-populer') || Request::is('produk/*')) show @else @endif" id="catalog" data-parent="#accordion">
            <div id="accordion1">
              <ul class="nav flex-column">
                <li class="nav-item">
                  <a href="{{ url('/produk-all') }}" class="nav-link sub-nav-link {{Request::is('produk-all') ? 'active' : '' }}">
                    <span class="svg-icon nav-icon d-flex justify-content-center">
                      <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        </svg>
                    </span>
                    <span class="nav-text">Data Semua Produk</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('/produk-baru') }}" class="nav-link sub-nav-link {{Request::is('produk-baru') ? 'active' : '' }}">
                    <span class="svg-icon nav-icon d-flex justify-content-center">
                      <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        </svg>
                    </span>
                    <span class="nav-text">Produk Baru</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('/produk-populer') }}" class="nav-link sub-nav-link {{Request::is('produk-populer') ? 'active' : '' }}">
                    <span class="svg-icon nav-icon d-flex justify-content-center">
                      <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        </svg>
                    </span>
                    <span class="nav-text">Produk Populer</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </li>
        <li class="nav-item @if(Request::is('transaksi-baru') || Request::is('transaksi-baru/*') || Request::is('transaksi-selesai') || Request::is('transaksi-selesai/*') || Request::is('transaksi-batal') || Request::is('transaksi-batal/*')) active @else @endif">
          <a  class="nav-link" data-toggle="collapse" href="#transaksiReseller" role="button" aria-expanded="false" aria-controls="transaksiReseller">
            <span class="svg-icon nav-icon">
              <i class="fas fa-money-check-alt font-size-h4"></i>
            </span>
            <span class="nav-text">Transaksi Reseller</span>
            <i class="fas fa-chevron-right fa-rotate-90"></i>
          </a>
          <div class="collapse nav-collapse @if(Request::is('transaksi-baru') || Request::is('transaksi-baru/*') || Request::is('transaksi-selesai') || Request::is('transaksi-selesai/*') || Request::is('transaksi-batal')) || Request::is('transaksi-batal/*')) show @else @endif" id="transaksiReseller"  data-parent="#accordion">
            <div id="accordion2">
              <ul class="nav flex-column">
                <li class="nav-item">
                  <a href="{{ url('/transaksi-baru') }}" class="nav-link sub-nav-link @if(Request::is('transaksi-baru') || Request::is('transaksi-baru/*')) active @else @endif">
                    <span class="svg-icon nav-icon d-flex justify-content-center">
                      <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        </svg>
                    </span>
                    <span class="nav-text">Baru</span>
                    <span class="badge badge-pill badge-danger" id="transaksiBaru">0</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('/transaksi-selesai') }}" class="nav-link sub-nav-link @if(Request::is('transaksi-selesai') || Request::is('transaksi-selesai/*')) active @else @endif">
                    <span class="svg-icon nav-icon d-flex justify-content-center">
                      <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        </svg>
                    </span>
                    <span class="nav-text">Selesai</span>
                    <span class="badge badge-pill badge-danger" id="transaksiSelesai">0</span>
                  </a>
                </li>
                
                <li class="nav-item">
                  <a href="{{ url('/transaksi-batal') }}" class="nav-link sub-nav-link @if(Request::is('transaksi-batal') || Request::is('transaksi-batal/*')) active @else @endif">
                    <span class="svg-icon nav-icon d-flex justify-content-center">
                      <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        </svg>
                    </span>
                    <span class="nav-text">Batal</span>
                    <span class="badge badge-pill badge-danger" id="transaksiBatal">0</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </li>
        <li class="nav-item @if(Request::is('manifest-baru') || Request::is('manifest-baru/*') || Request::is('manifest-proses') || Request::is('manifest-proses/*') || Request::is('manifest-verifikasi-nota') || Request::is('manifest-verifikasi/*') || Request::is('manifest-selesai') || Request::is('manifest-selesai/*') || Request::is('manifest-batal') || Request::is('manifest-batal/*')) active @else @endif">
          <a  class="nav-link" data-toggle="collapse" href="#transaksiStockist" role="button" aria-expanded="false" aria-controls="transaksiStockist">
            <span class="svg-icon nav-icon">
              <i class="fas fa-money-check-alt font-size-h4"></i>
            </span>
            <span class="nav-text">Transaksi Stockist</span>
            <i class="fas fa-chevron-right fa-rotate-90"></i>
          </a>
          <div class="collapse nav-collapse @if(Request::is('manifest-baru') || Request::is('manifest-baru/*') || Request::is('manifest-proses') || Request::is('manifest-proses/*') || Request::is('manifest-verifikasi-nota') || Request::is('manifest-verifikasi/*') || Request::is('manifest-selesai') || Request::is('manifest-selesai/*') || Request::is('manifest-batal') || Request::is('manifest-batal/*')) show @else @endif" id="transaksiStockist"  data-parent="#accordion">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a href="{{ url('/manifest-baru') }}" class="nav-link sub-nav-link @if(Request::is('manifest-baru') || Request::is('manifest-baru/*')) active @else @endif">
                  <span class="svg-icon nav-icon d-flex justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                      </svg>
                  </span>
                  <span class="nav-text">Baru</span><span class="badge badge-pill badge-danger" id="totalManifestBaru">0</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/manifest-proses') }}" class="nav-link sub-nav-link @if(Request::is('manifest-proses') || Request::is('manifest-proses/*')) active @else @endif">
                  <span class="svg-icon nav-icon d-flex justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                      </svg>
                  </span>
                  <span class="nav-text">Proses</span><span class="badge badge-pill badge-danger" id="totalManifestProses">0</span>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="{{ url('/manifest-verifikasi-nota') }}" class="nav-link sub-nav-link @if(Request::is('manifest-verifikasi-nota') || Request::is('manifest-verifikasi/*')) active @else @endif">
                  <span class="svg-icon nav-icon d-flex justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                      </svg>
                  </span>
                  <span class="nav-text">Verifikasi Nota</span><span class="badge badge-pill badge-danger" id="totalManifestVerifikasiNota">0</span>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="{{ url('/manifest-selesai') }}" class="nav-link sub-nav-link @if(Request::is('manifest-selesai') || Request::is('manifest-selesai/*')) active @else @endif">
                  <span class="svg-icon nav-icon d-flex justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                      </svg>
                  </span>
                  <span class="nav-text">Selesai</span><span class="badge badge-pill badge-danger" id="totalManifestSelesai">0</span>
                </a>
              </li>
            </ul>
          </div>
        </li>

        <li class="nav-item @if(Request::is('laporan-penjualan-pelanggan') || Request::is('laporan-penjualan-trekkers-link') || Request::is('laporan-fee-koordinator') || Request::is('laporan-produk-favorit')) active @else @endif">
          <a  class="nav-link" data-toggle="collapse" href="#reports" role="button" aria-expanded="false" aria-controls="reports">
            <span class="svg-icon nav-icon">
              <i class="fas fa-chart-line font-size-h4"></i>
            </span>
            <span class="nav-text">Laporan</span>
            <i class="fas fa-chevron-right fa-rotate-90"></i>
          </a>
          <div class="collapse nav-collapse @if(Request::is('laporan-penjualan-pelanggan') || Request::is('laporan-penjualan-trekkers-link') || Request::is('laporan-fee-koordinator') || Request::is('laporan-produk-favorit')) show @else @endif" id="reports" data-parent="#accordion">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a href="{{ url('/laporan-penjualan-pelanggan') }}" class="nav-link sub-nav-link @if(Request::is('laporan-penjualan-pelanggan')) active @else @endif">
                  <span class="svg-icon nav-icon d-flex justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                      </svg>
                  </span>
                  <span class="nav-text">Penjualan Per Pelanggan</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/laporan-penjualan-trekkers-link') }}" class="nav-link sub-nav-link @if(Request::is('laporan-penjualan-trekkers-link')) active @else @endif">
                  <span class="svg-icon nav-icon d-flex justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                      </svg>
                  </span>
                  <span class="nav-text">Penjualan Trekkers Link</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/laporan-fee-koordinator') }}" class="nav-link sub-nav-link @if(Request::is('laporan-fee-koordinator')) active @else @endif">
                  <span class="svg-icon nav-icon d-flex justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                      </svg>
                  </span>
                  <span class="nav-text">Fee Koordinator</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/laporan-produk-favorit') }}" class="nav-link sub-nav-link @if(Request::is('laporan-produk-favorit')) active @else @endif">
                  <span class="svg-icon nav-icon d-flex justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                      </svg>
                  </span>
                  <span class="nav-text">Produk Favorit</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item @if(Request::is('member-trekkers') || Request::is('member-verifikasi') || Request::is('admin-trekkers')) active @else @endif">
          <a  class="nav-link" data-toggle="collapse" href="#People" role="button" aria-expanded="false" aria-controls="People">
            <span class="svg-icon nav-icon">
              <i class="fas fa-user-friends font-size-h4"></i>
            </span>
            <span class="nav-text">Data User</span>
            <i class="fas fa-chevron-right fa-rotate-90"></i>
          </a>
          <div class="collapse nav-collapse @if(Request::is('admin-trekkers') || Request::is('member-trekkers') || Request::is('member-verifikasi')) show @else @endif" id="People" data-parent="#accordion">
            <div id="accordion2">
              <ul class="nav flex-column">
                <li class="nav-item @if(Request::is('member-trekkers') || Request::is('member-verifikasi')) active @else @endif">
                  <a class="nav-link sub-nav-link" data-toggle="collapse" href="#pelangganWeb" role="button" aria-expanded="false" aria-controls="pelangganWeb">
                    <span class="svg-icon nav-icon d-flex justify-content-center">
                      <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
                        </svg>
                    </span>
                    <span class="nav-text">Pelanggan Trekkers</span>
                    <i class="fas fa-chevron-right fa-rotate-90"></i>
                  </a>
                  <div class="collapse nav-collapse @if(Request::is('member-verifikasi') || Request::is('member-trekkers')) show @else @endif" id="pelangganWeb" data-parent="#accordion2">
                    <ul class="nav flex-column">
                      <li class="nav-item">
                        <a href="{{ url('/member-trekkers') }}" class="nav-link mini-sub-nav-link @if(Request::is('member-trekkers')) active @else @endif">
                          <span class="nav-text">List Data Pelanggan</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ url('/member-verifikasi') }}" class="nav-link mini-sub-nav-link @if(Request::is('member-verifikasi')) active @else @endif">
                          <span class="nav-text">Verifikasi Manual</span>
                        </a>
                      </li>
                    </ul>
                  </div>	
                </li>
              </ul> 
            </div>
          </div>
        </li>
            
        <li class="nav-item @if(Request::is('setting-slider') || Request::is('setting-poin') || Request::is('setting-cashback') || Request::is('setting-daily-visit') || Request::is('setting-group-pelanggan') || Request::is('setting-voucher') || Request::is('setting-bonus-pelanggan') || Request::is('setting-promo-barang') || Request::is('setting-url-sosmed')) active @else @endif">
          <a  class="nav-link" data-toggle="collapse" href="#setting" role="button" aria-expanded="false" aria-controls="setting">
            <span class="svg-icon nav-icon">
              <i class="fas fa-cogs font-size-h4"></i>
            </span>
            <span class="nav-text">Pengaturan</span>
            <i class="fas fa-chevron-right fa-rotate-90"></i>
          </a>
          <div class="collapse nav-collapse @if(Request::is('setting-slider') || Request::is('setting-poin') || Request::is('setting-cashback') || Request::is('setting-daily-visit') || Request::is('setting-group-pelanggan') || Request::is('setting-voucher') || Request::is('setting-bonus-pelanggan') || Request::is('setting-promo-barang') || Request::is('setting-url-sosmed')) show @else @endif" id="setting" data-parent="#accordion">
            <div id="accordion3">
              <ul class="nav flex-column">
                <li class="nav-item @if(Request::is('setting-slider')) active @else @endif">
                  <a  class="nav-link sub-nav-link" data-toggle="collapse" href="#settingB" role="button" aria-expanded="false" aria-controls="settingB">
                  <span class="svg-icon nav-icon d-flex justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                      </svg>
                  </span>
                    <span class="nav-text">Beranda</span>
                    <i class="fas fa-chevron-right fa-rotate-90"></i>
                  </a>
                  <div class="collapse nav-collapse @if(Request::is('setting-slider')) show @else @endif" id="settingB" data-parent="#accordion3">
                    <ul class="nav flex-column">
                      <li class="nav-item">
                        <a href="{{ url('/setting-slider') }}"  class="nav-link mini-sub-nav-link @if(Request::is('setting-slider')) active @else @endif">
                          <span class="nav-text">Slider</span>
                        </a>
                      </li>
                    </ul>
                  </div>	
                </li>
                <li class="nav-item @if(Request::is('setting-url-sosmed')) active @else @endif">
                  <a  class="nav-link sub-nav-link" data-toggle="collapse" href="#settingUrl" role="button" aria-expanded="false" aria-controls="settingUrl">
                  <span class="svg-icon nav-icon d-flex justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                      </svg>
                  </span>
                    <span class="nav-text">Url Sosmed</span>
                    <i class="fas fa-chevron-right fa-rotate-90"></i>
                  </a>
                  <div class="collapse nav-collapse @if(Request::is('setting-url-sosmed')) show @else @endif" id="settingUrl" data-parent="#accordion3">
                    <ul class="nav flex-column">
                      <li class="nav-item">
                        <a href="{{ url('/setting-url-sosmed') }}"  class="nav-link mini-sub-nav-link @if(Request::is('setting-url-sosmed')) active @else @endif">
                          <span class="nav-text">Data Url</span>
                        </a>
                      </li>
                    </ul>
                  </div>	
                  <br>
                  <br>
                  <br>
                  <br>
                </li>
              </ul>
            </div>
          </div>
        </li>
        @endrole

        @role('GudangJadi')
        <li class="nav-item {{Request::is('/') ? 'active' : '' }}">
          <a href="{{ url('/') }}" class="nav-link">
            <span class="svg-icon nav-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                <polyline points="9 22 9 12 15 12 15 22"></polyline>
              </svg>
            </span>
            <span class="nav-text">
              Beranda
            </span>
          </a>
        </li>
        <li class="nav-item @if(Request::is('manifest-baru') || Request::is('manifest-baru/*') || Request::is('manifest-proses') || Request::is('manifest-proses/*') || Request::is('manifest-verifikasi-nota') || Request::is('manifest-verifikasi/*') || Request::is('manifest-selesai') || Request::is('manifest-selesai/*') || Request::is('manifest-batal') || Request::is('manifest-batal/*')) active @else @endif">
          <a  class="nav-link" data-toggle="collapse" href="#transaksiStockist" role="button" aria-expanded="false" aria-controls="transaksiStockist">
            <span class="svg-icon nav-icon">
              <i class="fas fa-money-check-alt font-size-h4"></i>
            </span>
            <span class="nav-text">Transaksi Stockist</span>
            <i class="fas fa-chevron-right fa-rotate-90"></i>
          </a>
          <div class="collapse nav-collapse @if(Request::is('manifest-baru') || Request::is('manifest-baru/*') || Request::is('manifest-proses') || Request::is('manifest-proses/*') || Request::is('manifest-verifikasi-nota') || Request::is('manifest-verifikasi/*') || Request::is('manifest-selesai') || Request::is('manifest-selesai/*') || Request::is('manifest-batal') || Request::is('manifest-batal/*')) show @else @endif" id="transaksiStockist"  data-parent="#accordion">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a href="{{ url('/manifest-baru') }}" class="nav-link sub-nav-link @if(Request::is('manifest-baru') || Request::is('manifest-baru/*')) active @else @endif">
                  <span class="svg-icon nav-icon d-flex justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                      </svg>
                  </span>
                  <span class="nav-text">Baru</span><span class="badge badge-pill badge-danger" id="totalManifestBaru">0</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/manifest-proses') }}" class="nav-link sub-nav-link @if(Request::is('manifest-proses') || Request::is('manifest-proses/*')) active @else @endif">
                  <span class="svg-icon nav-icon d-flex justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                      </svg>
                  </span>
                  <span class="nav-text">Proses</span><span class="badge badge-pill badge-danger" id="totalManifestProses">0</span>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="{{ url('/manifest-verifikasi-nota') }}" class="nav-link sub-nav-link @if(Request::is('manifest-verifikasi-nota') || Request::is('manifest-verifikasi/*')) active @else @endif">
                  <span class="svg-icon nav-icon d-flex justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                      </svg>
                  </span>
                  <span class="nav-text">Verifikasi Nota</span><span class="badge badge-pill badge-danger" id="totalManifestVerifikasiNota">0</span>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="{{ url('/manifest-selesai') }}" class="nav-link sub-nav-link @if(Request::is('manifest-selesai') || Request::is('manifest-selesai/*')) active @else @endif">
                  <span class="svg-icon nav-icon d-flex justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                      </svg>
                  </span>
                  <span class="nav-text">Selesai</span><span class="badge badge-pill badge-danger" id="totalManifestSelesai">0</span>
                </a>
              </li>
            </ul>
          </div>
        </li>

        <li class="nav-item @if(Request::is('laporan-penjualan-pelanggan') || Request::is('laporan-penjualan-trekkers-link') || Request::is('laporan-fee-koordinator') || Request::is('laporan-produk-favorit')) active @else @endif">
          <a  class="nav-link" data-toggle="collapse" href="#reports" role="button" aria-expanded="false" aria-controls="reports">
            <span class="svg-icon nav-icon">
              <i class="fas fa-chart-line font-size-h4"></i>
            </span>
            <span class="nav-text">Laporan</span>
            <i class="fas fa-chevron-right fa-rotate-90"></i>
          </a>
          <div class="collapse nav-collapse @if(Request::is('laporan-penjualan-pelanggan') || Request::is('laporan-penjualan-trekkers-link') || Request::is('laporan-fee-koordinator') || Request::is('laporan-produk-favorit')) show @else @endif" id="reports" data-parent="#accordion">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a href="{{ url('/laporan-penjualan-pelanggan') }}" class="nav-link sub-nav-link @if(Request::is('laporan-penjualan-pelanggan')) active @else @endif">
                  <span class="svg-icon nav-icon d-flex justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                      </svg>
                  </span>
                  <span class="nav-text">Penjualan Per Pelanggan</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/laporan-penjualan-trekkers-link') }}" class="nav-link sub-nav-link @if(Request::is('laporan-penjualan-trekkers-link')) active @else @endif">
                  <span class="svg-icon nav-icon d-flex justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                      </svg>
                  </span>
                  <span class="nav-text">Penjualan Trekkers Link</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/laporan-fee-koordinator') }}" class="nav-link sub-nav-link @if(Request::is('laporan-fee-koordinator')) active @else @endif">
                  <span class="svg-icon nav-icon d-flex justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                      </svg>
                  </span>
                  <span class="nav-text">Fee Koordinator</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/laporan-produk-favorit') }}" class="nav-link sub-nav-link @if(Request::is('laporan-produk-favorit')) active @else @endif">
                  <span class="svg-icon nav-icon d-flex justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="10px" height="10px" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                      </svg>
                  </span>
                  <span class="nav-text">Produk Favorit</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        @endrole
      </ul>
    </div>
  </div>
</div>