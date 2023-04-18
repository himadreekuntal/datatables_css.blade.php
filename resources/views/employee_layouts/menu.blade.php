<li class="side-menus {{ Request::is('employee/home') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('employee.home') }}">
        <i class=" fas fa-building"></i><span>Dashboard</span>
    </a>
</li>


  <li class="side-menus {{ Request::is('employee/leave*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('employee.leave') }}" data-toggle="tooltip1" title="Sales" ><i class="fas fa-cash-register"></i><span>Attendance Leave</span></a>
  </li>

<li class="side-menus {{ Request::is('employee/advance-payment*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('employee.advance-payment') }}">
        <i class=" fas fa-building"></i><span>Request for Advance Payment</span>
    </a>
</li>



