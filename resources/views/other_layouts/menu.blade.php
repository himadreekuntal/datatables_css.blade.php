<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('home') }}">
        <i class=" fas fa-building"></i><span>Dashboard</span>
    </a>
</li>

<li class="menu-header">L/C</li>


        <li class="side-menus {{ Request::is('lCDetails*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('lCDetails.index') }}"><i class="fas fa-building"></i><span>L/C Opening</span></a>
        </li>

        <li class="side-menus {{ Request::is('reportLC*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('reportLC') }}"><i class="fas fa-file-pdf"></i><span>LC Reports</span></a>
        </li>


<li class="menu-header">Tender</li>

        <li class="side-menus {{ Request::is('tenders*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('tenders.index') }}"><i class="fas fa-building"></i><span>Tenders</span></a>
        </li>

        <li class="side-menus {{ Request::is('bankGurantees*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('bankGurantees.index') }}"><i class="fas fa-building"></i><span>Bank Gurantees</span></a>
        </li>

        <li class="side-menus {{ Request::is('performanceGurantees*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('performanceGurantees.index') }}"><i class="fas fa-building"></i><span>Performance Gurantees</span></a>
        </li>


<li class="menu-header">Online Marketing</li>

        <li class="side-menus {{ Request::is('customerEmails*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('customerEmails.index') }}"><i class="fas fa-building"></i><span>Create Group</span></a>
        </li>
        <li class="side-menus {{ Request::is('customerEmailDetails*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('customerEmailDetails.index') }}"><i class="fas fa-building"></i><span>Customer Details</span></a>
        </li>


<li class="menu-header">For Website Backend</li>

        <li class="side-menus {{ Request::is('productDescriptions*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('productDescriptions.index') }}"><i class="fas fa-building"></i><span>Product Descriptions</span></a>
        </li>
