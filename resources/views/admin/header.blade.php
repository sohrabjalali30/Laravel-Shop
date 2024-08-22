<header class="header">
    <nav class="navbar navbar-expand-lg">
        <div class="search-panel">
            <div class="search-inner d-flex align-items-center justify-content-center">
                <div class="close-btn">Close <i class="fa fa-close"></i></div>
                <form id="searchForm" action="#">
                    <div class="form-group">
                        <input type="search" name="search" placeholder="What are you searching for...">
                        <button type="submit" class="submit">Search</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="container-fluid d-flex align-items-center justify-content-between">
            <div class="navbar-header">
                <!-- Navbar Header--><a href="index.html" class="navbar-brand">
                    <div class="brand-text brand-big visible text-uppercase"><strong class="text-primary">Panel</strong><strong>Admin</strong></div>
                    <div class="brand-text brand-sm"><strong class="text-primary">P</strong><strong>A</strong></div></a>
                <!-- Sidebar Toggle Btn-->
                <button class="sidebar-toggle"><i class="fa fa-long-arrow-left"></i></button>
            </div>
<!--Logout-btn-->
                <div class="list-inline-item logout" >
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <input type="submit" value="Logout" style="padding:10px;margin: 5px;background: #1FA463!important;color: white!important;border-radius: 5px;border: grey 1px solid">
                    </form>
            </div>
        </div>
    </nav>
</header>
