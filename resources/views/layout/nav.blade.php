<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MENU</li>
    @if (auth()->user()->level==1)
    <li class="{{request()->is('/')?'active': ''}}"><a href="/"><i class="fa fa-home"></i> <span>Home</span></a></li>
    <li class="{{request()->is('barang')?'active': ''}}"><a href="/barang"><i class="fa fa-user-circle"></i> <span>Data Barang</span></a></li>
    <li class="{{request()->is('supplier')?'active': ''}}"><a href="/supplier"><i class="fa fa-users nav-icon"></i> <span>Data Supplier</span></a></li>
    <li class="{{request()->is('transaksi')?'active': ''}}"><a href="/transaksi"><i class="fa fa-id-card"></i> <span>Data Transaksi</span></a></li>
    <li class="{{request()->is('pembayaran')?'active': ''}}"><a href="/pembayaran"><i class="fa fa-calendar"></i> <span>Data Pembayaran</span></a></li>
    <li class="{{request()->is('pembeli')?'active': ''}}"><a href="/pembeli"><i class="fa fa-users nav-icon"></i> <span>Data Pembeli</span></a></li>

    @elseif (auth()->user()->level==2)
    <li class="{{request()->is('/')?'active': ''}}"><a href="/"><i class="fa fa-home"></i> <span>Home</span></a></li>
    <li class="{{request()->is('supplier')?'active': ''}}"><a href="/supplier"><i class="fa fa-users nav-icon"></i> <span>Data Supplier</span></a></li>
    <li class="{{request()->is('barang')?'active': ''}}"><a href="/barang"><i class="fa fa-user-circle"></i> <span>Data Barang</span></a></li>

    @elseif (auth()->user()->level==3)
    <li class="{{request()->is('/')?'active': ''}}"><a href="/"><i class="fa fa-home"></i> <span>Home</span></a></li>
    <li class="{{request()->is('pembeli')?'active': ''}}"><a href="/pembeli"><i class="fa fa-users nav-icon"></i> <span>Data Pembeli</span></a></li>
    <li class="{{request()->is('barang')?'active': ''}}"><a href="/barang"><i class="fa fa-user-circle"></i> <span>Data Barang</span></a></li>
    <li class="{{request()->is('transaksi')?'active': ''}}"><a href="/transaksi"><i class="fa fa-id-card"></i> <span>Data Transaksi</span></a></li>
    <li class="{{request()->is('pembayaran')?'active': ''}}"><a href="/pembayaran"><i class="fa fa-calendar"></i> <span>Data Pembayaran</span></a></li>

    @endif
    {{-- <li class="{{request()->is('/')?'active': ''}}"><a href="/"><i class="fa fa-home"></i> <span>Home</span></a></li>
    <li class="{{request()->is('barang')?'active': ''}}"><a href="/barang"><i class="fa fa-user-circle"></i> <span>Data Barang</span></a></li>
    <li class="{{request()->is('supplier')?'active': ''}}"><a href="/supplier"><i class="fa fa-users nav-icon"></i> <span>Data Supplier</span></a></li>
    <li class="{{request()->is('transaksi')?'active': ''}}"><a href="/transaksi"><i class="fa fa-id-card"></i> <span>Data Transaksi</span></a></li>
    <li class="{{request()->is('pembayaran')?'active': ''}}"><a href="/pembayaran"><i class="fa fa-calendar"></i> <span>Data Pembayaran</span></a></li>
    <li class="{{request()->is('pembeli')?'active': ''}}"><a href="/pembeli"><i class="fa fa-users nav-icon"></i> <span>Data Pembeli</span></a></li> --}}
</ul>
