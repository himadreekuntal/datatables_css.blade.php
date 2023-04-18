

<li class="side-menus {{ Request::is('/home') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('home') }}" >
        <i class=" fas fa-building"></i><span>Dashboard</span>
    </a>
</li>
<li class="menu-header"> Inventory</li>
        <li class="side-menus {{ Request::is('categories*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('categories.index') }}"><i class="fab fa-cuttlefish"></i><span>Categories</span></a>
        </li>
        <li class="side-menus {{ Request::is('brands*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('brands.index') }}"><i class="fab fa-bootstrap"></i><span>Brands</span></a>
        </li>

        <li class="side-menus {{ Request::is('products*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('products.index') }}"><i class="fab fa-product-hunt"></i><span>Products</span></a>
        </li>

<li class="menu-header"> Sales</li>

          <li class="side-menus {{ Request::is('sales*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('sales.index') }}" data-toggle="tooltip1" title="Sales" ><i class="fas fa-cash-register"></i><span>Sales</span></a>
          </li>

<li class="menu-header"> Quotations</li>
         <li class="side-menus {{ Request::is('quotations*') ? 'active' : '' }}">
                   <a class="nav-link" href="{{ route('quotations.index') }}" data-toggle="tooltip2" title="Quotation"><i class="fas fa-file-invoice"></i><span>Quotations</span></a>
          </li>

<li class="menu-header">Customer Details</li>

        <li class="side-menus {{ Request::is('customers*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('customers.index') }}"><i class="fas fa-building"></i><span>Customers</span></a>
        </li>

