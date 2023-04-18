<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('home') }}">
        <i class=" fas fa-building"></i><span>Dashboard</span>
    </a>
</li>

<li class="menu-header">Accounts</li>


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
            <a class="nav-link" href="{{ route('cashBook') }}"><i class="fas fa-file-pdf"></i><span>Cash Book</span></a>
        </li>
        <li class="side-menus {{ Request::is('bankTransactions*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('bankTransactions.index') }}"><i class="fas fa-building"></i><span>Bank Transactions</span></a>
        </li>

        <li class="side-menus {{ Request::is('cashHands*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('cashHands.index') }}"><i class="fas fa-building"></i><span>Cash Hands</span></a>
        </li>






