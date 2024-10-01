<li class="nav-item {{ Request::is('admin*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.home') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Home</span>
    </a>
</li>
<li class="nav-item {{ Request::is('users*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('users.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Users</span>
    </a>
</li>
<li class="nav-item {{ Request::is('parcels*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('parcels.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Parcels</span>
    </a>
</li>
<li class="nav-item {{ Request::is('invoices*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('invoices.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Invoices</span>
    </a>
</li>
<li class="nav-item {{ Request::is('tickets*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('tickets.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Tickets</span>
    </a>
</li>
@can(config('const.admin.role.ADMINISTRATOR'))
<li class="nav-item {{ Request::is('admins*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admins.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Admins</span>
    </a>
</li>
@endcan
