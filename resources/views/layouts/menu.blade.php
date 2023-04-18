<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('home') }}">
        <i class=" fas fa-building"></i><span>Dashboard</span>
    </a>
</li>
<li class="menu-header">Sales & Inventory</li>

<li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-boxes"></i><span>Inventory</span></a>
                <ul class="dropdown-menu">
                    <li class="side-menus {{ Request::is('categories*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('categories.index') }}"><i class="fab fa-cuttlefish"></i><span>Categories</span></a>
                    </li>
                    <li class="side-menus {{ Request::is('brands*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('brands.index') }}"><i class="fab fa-bootstrap"></i><span>Brands</span></a>
                    </li>

                    <li class="side-menus {{ Request::is('products*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('products.index') }}"><i class="fab fa-product-hunt"></i><span>Products</span></a>
                    </li>
                </ul>
</li>

  <li class="side-menus {{ Request::is('sales*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('sales.index') }}" data-toggle="tooltip1" title="Sales" ><i class="fas fa-cash-register"></i><span>Sales</span></a>
  </li>

 <li class="side-menus {{ Request::is('quotations*') ? 'active' : '' }}">
           <a class="nav-link" href="{{ route('quotations.index') }}" data-toggle="tooltip2" title="Quotation"><i class="fas fa-file-invoice"></i><span>Quotations</span></a>
  </li>

<li class="menu-header">Roles & Permission</li>

<li class="nav-item dropdown">
     <a href="#" class="nav-link has-dropdown"><i class="fas fa-users"></i><span>Roles & Permission</span></a>
     <ul class="dropdown-menu">
        <li class="side-menus {{ Request::is('users*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('users.index') }}"><i class="fas fa-user-cog"></i><span>Users</span></a>
        </li>
        <li class="side-menus {{ Request::is('roles*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('roles.index') }}"><i class="fas fa-user-lock"></i><span>Roles</span></a>
        </li>
    </ul>
</li>
<li class="menu-header">Customer Details</li>
<li class="nav-item dropdown">
<a href="#" class="nav-link has-dropdown"><i class="fas fa-users"></i><span>Customers</span></a>
<ul class="dropdown-menu">
    <li class="side-menus {{ Request::is('customers*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('customers.index') }}"><i class="fas fa-building"></i><span>Customers</span></a>
    </li>
</ul>
</li>
<li class="menu-header">Reports</li>
<li class="nav-item dropdown">
<a href="#" class="nav-link has-dropdown"><i class="fas fa-file-pdf"></i><span>Reports</span></a>
<ul class="dropdown-menu">
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

</ul>
</li>





<li class="menu-header">L/C</li>
<li class="nav-item dropdown">
<a href="#" class="nav-link has-dropdown"><i class="fas fa-file-pdf"></i><span>L/C</span></a>
<ul class="dropdown-menu">

    <li class="side-menus {{ Request::is('lCDetails*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('lCDetails.index') }}"><i class="fas fa-building"></i><span>L/C Opening</span></a>
    </li>

    <li class="side-menus {{ Request::is('reportLC*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('reportLC') }}"><i class="fas fa-file-pdf"></i><span>LC Reports</span></a>
    </li>
</ul>
</li>

<li class="menu-header">Accounts</li>
<li class="nav-item dropdown">
 <a href="#" class="nav-link has-dropdown"><i class="fas fa-file-pdf"></i><span>Expenditure</span></a>
    <ul class="dropdown-menu">

        <li class="side-menus {{ Request::is('expenditureLists*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('expenditureLists.index') }}"><i class="fas fa-building"></i><span>Expenditure</span></a>
        </li>

        <li class="side-menus {{ Request::is('dailyExpenditures*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('dailyExpenditures.index') }}"><i class="fas fa-building"></i><span>Daily Expenditures</span></a>
        </li>

        <li class="side-menus {{ Request::is('reportExpense*') ? 'active' : '' }}">
             <a class="nav-link" href="{{ route('reportExpense') }}"><i class="fas fa-file-pdf"></i><span>Expense Reports</span></a>
        </li>
        <li class="side-menus {{ Request::is('reportBalance*') ? 'active' : '' }}">
             <a class="nav-link" href="{{ route('reportBalance') }}"><i class="fas fa-file-pdf"></i><span>Balance Sheet</span></a>
        </li>
        <li class="side-menus {{ Request::is('cashBook*') ? 'active' : '' }}">
             <a class="nav-link" href="{{ route('cashBook') }}"><i class="fas fa-file-pdf"></i><span>Cach Book</span></a>
        </li>
    </ul>
</li>


<li class="side-menus {{ Request::is('bankTransactions*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('bankTransactions.index') }}"><i class="fas fa-building"></i><span>Bank Transactions</span></a>
</li>

<li class="menu-header">HRM</li>
<li class="nav-item dropdown">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-file-pdf"></i><span>HRM</span></a>
    <ul class="dropdown-menu">

        <li class="side-menus {{ Request::is('departments*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('departments.index') }}"><i class="fas fa-building"></i><span>Departments</span></a>
        </li>
        <li class="side-menus {{ Request::is('designations*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('designations.index') }}"><i class="fas fa-building"></i><span>Designations</span></a>
        </li>
        <li class="side-menus {{ Request::is('employees*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('employees.index') }}"><i class="fas fa-building"></i><span>Employees</span></a>
        </li>
    </ul>
</li>

<li class="nav-item dropdown">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-file-pdf"></i><span>Leave Attendance</span></a>
    <ul class="dropdown-menu">
        <li class="side-menus {{ Request::is('leaveCategories*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('leaveCategories.index') }}"><i class="fas fa-building"></i><span>Leave Categories</span></a>
        </li>
        <li class="side-menus {{ Request::is('employeeLeaves*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('employeeLeaves.index') }}"><i class="fas fa-building"></i><span>Employee Leaves</span></a>
        </li>

        <li class="side-menus {{ Request::is('reportLeave*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('reportLeave') }}"><i class="fas fa-building"></i><span>Leave Report</span></a>
        </li>

    </ul>
</li>



<li class="menu-header">Tender</li>
<li class="nav-item dropdown">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-file-pdf"></i><span>Tender</span></a>
    <ul class="dropdown-menu">
        <li class="side-menus {{ Request::is('tenders*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('tenders.index') }}"><i class="fas fa-building"></i><span>Tenders</span></a>
        </li>

        <li class="side-menus {{ Request::is('bankGurantees*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('bankGurantees.index') }}"><i class="fas fa-building"></i><span>Bank Gurantees</span></a>
        </li>

        <li class="side-menus {{ Request::is('performanceGurantees*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('performanceGurantees.index') }}"><i class="fas fa-building"></i><span>Performance Gurantees</span></a>
        </li>
    </ul>
</li>



<li class="menu-header">Online Marketing</li>
<li class="nav-item dropdown">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-file-pdf"></i><span>Online Marketing</span></a>
    <ul class="dropdown-menu">
        <li class="side-menus {{ Request::is('customerEmails*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('customerEmails.index') }}"><i class="fas fa-building"></i><span>Create Group</span></a>
        </li>
        <li class="side-menus {{ Request::is('customerEmailDetails*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('customerEmailDetails.index') }}"><i class="fas fa-building"></i><span>Customer Details</span></a>
        </li>

    </ul>
</li>


<li class="menu-header">For Website Backend</li>
<li class="nav-item dropdown">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-file-pdf"></i><span>For Website Backend</span></a>
    <ul class="dropdown-menu">
        <li class="side-menus {{ Request::is('productDescriptions*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('productDescriptions.index') }}"><i class="fas fa-building"></i><span>Product Descriptions</span></a>
        </li>
    </ul>
</li>
<!--

<li class="side-menus {{ Request::is('educationEmployees*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('educationEmployees.index') }}"><i class="fas fa-building"></i><span>Education Employees</span></a>
</li>
-->




<li class="side-menus {{ Request::is('taxes*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('taxes.index') }}"><i class="fas fa-building"></i><span>Taxes</span></a>
</li>

<li class="side-menus {{ Request::is('taxDetails*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('taxDetails.index') }}"><i class="fas fa-building"></i><span>Tax Details</span></a>
</li>

<li class="side-menus {{ Request::is('employeeSalaries*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('employeeSalaries.index') }}"><i class="fas fa-building"></i><span>Employee Salaries</span></a>
</li>

<li class="side-menus {{ Request::is('advancePayments*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('advancePayments.index') }}"><i class="fas fa-building"></i><span>Advance Payments</span></a>
</li>

<li class="side-menus {{ Request::is('advancePaymentDetails*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('advancePaymentDetails.index') }}"><i class="fas fa-building"></i><span>Advance Payment Details</span></a>
</li>

<li class="side-menus {{ Request::is('monthlySalaries*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('monthlySalaries.index') }}"><i class="fas fa-building"></i><span>Monthly Salaries</span></a>
</li>


<li class="side-menus {{ Request::is('cashHands*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('cashHands.index') }}"><i class="fas fa-building"></i><span>Cash Hands</span></a>
</li>

<li class="side-menus {{ Request::is('permissions*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('permissions.index') }}"><i class="fas fa-building"></i><span>Permissions</span></a>
</li>

