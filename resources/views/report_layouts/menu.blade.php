<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('home') }}">
        <i class=" fas fa-building"></i><span>Dashboard</span>
    </a>
</li>

<li class="menu-header">Reports</li>

        <li class="side-menus {{ Request::is('reports*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('reports.index') }}"><i class="fas fa-file-pdf"></i><span>Sales Reports</span></a>
        </li>
        <li class="side-menus {{ Request::is('reportStock*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('reportStock') }}"><i class="fas fa-file-pdf"></i><span>Stock Reports</span></a>
        </li>
        <br>
        <li class="side-menus {{ Request::is('reportProduct*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('reportProduct') }}"><i class="fas fa-file-pdf"></i><span>Product Wise Sale Reports</span></a>
        </li>
        <br>
        <li class="side-menus {{ Request::is('stockFiles*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('stockFiles.index') }}"><i class="fas fa-file-pdf"></i><span>Monthly Stock Report</span></a>
        </li>
