<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('home') }}">
        <i class=" fas fa-building"></i><span>Dashboard</span>
    </a>
</li>

<li class="menu-header">Tax Setting</li>



<li class="side-menus {{ Request::is('taxes*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('taxes.index') }}"><i class="fas fa-building"></i><span>Taxes</span></a>
</li>


<li class="menu-header">HRM</li>


        <li class="side-menus {{ Request::is('departments*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('departments.index') }}"><i class="fas fa-building"></i><span>Departments</span></a>
        </li>
        <li class="side-menus {{ Request::is('designations*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('designations.index') }}"><i class="fas fa-building"></i><span>Designations</span></a>
        </li>
        <li class="side-menus {{ Request::is('employees*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('employees.index') }}"><i class="fas fa-building"></i><span>Employees</span></a>
        </li>

<li class="menu-header">Roles & Permission</li>

        <li class="side-menus {{ Request::is('users*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('users.index') }}"><i class="fas fa-user-cog"></i><span>Users</span></a>
        </li>
        <li class="side-menus {{ Request::is('roles*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('roles.index') }}"><i class="fas fa-user-lock"></i><span>Roles</span></a>
        </li>

        <li class="side-menus {{ Request::is('permissions*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('permissions.index') }}"><i class="fas fa-building"></i><span>Permissions</span></a>
        </li>



<li class="menu-header">Leave Management</li>

        <li class="side-menus {{ Request::is('leaveCategories*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('leaveCategories.index') }}"><i class="fas fa-building"></i><span>Leave Categories</span></a>
        </li>
        <li class="side-menus {{ Request::is('employeeLeaves*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('employeeLeaves.index') }}"><i class="fas fa-building"></i><span>Employee Leaves</span></a>
        </li>

        <li class="side-menus {{ Request::is('reportLeave*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('reportLeave') }}"><i class="fas fa-building"></i><span>Leave Report</span></a>
        </li>


<li class="menu-header">Employee Salary</li>

<li class="side-menus {{ Request::is('employeeSalaries*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('employeeSalaries.index') }}"><i class="fas fa-building"></i><span>Employee Salaries</span></a>
</li>



<li class="side-menus {{ Request::is('monthlySalaries*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('monthlySalaries.index') }}"><i class="fas fa-building"></i><span>Monthly Salaries</span></a>
</li>

<li class="menu-header">Advance Payment</li>
<li class="side-menus {{ Request::is('advancePayments*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('advancePayments.index') }}"><i class="fas fa-building"></i><span>Advance Payments</span></a>
</li>

