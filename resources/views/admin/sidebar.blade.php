<nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
        <div class="avatar"><img src="/images/YouShopLogo.png" alt="..." class="img-fluid rounded-circle"></div>
        <div class="title">
            <h1 class="h5">Admin User</h1>
            <p>You Shop</p>
        </div>
    </div>
    <!-- Sidebar Navidation Menus-->
    <ul class="list-unstyled">
        <li ><a href="{{url('admin/dashboard')}}"> Home </a></li>
        <li><a href={{url('view_orders')}}> Orders </a></li>
        <li>
            <a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse">Products</a>

            <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="{{url('new_product')}}">New Product</a></li>
                <li><a href="{{url('all_products')}}">All Products</a></li>
                <li><a href="#">Command Product</a></li>
            </ul>
        </li>
        <li><a href={{url('view_category')}}> Category </a></li>
        <li><a href={{url('view_products')}}>  </a></li>
        <li><a href={{url('view_articels')}} aria-expanded="false" data-toggle="collapse">Articels </a>
        </li>
    </ul>
</nav>
