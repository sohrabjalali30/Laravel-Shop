
<header id="header">
    <div id="header-wrap">
        <div class="container">
            <div class="header-row" >
                <!--Logo-->
                <div id="logo" class="div_logo">
                    <a href="{{url('/')}}">
                        <img class="logo-default" srcset="images/YouShopLogo.png, images/logo@2x.png 2x" src="images/YouShopLogo.png">
                        <img class="logo-dark" srcset="images/YouShopLogo.png, images/logo-dark@2x.png 2x" src="images/YouShopLogo.png" >
                    </a>
                </div>
                <div class="header-misc">
                <!--cart-icon-->
                    <div id="top-cart" class="header-misc-icon d-none d-sm-block">
                        <a href="{{url('mycart')}}" id="fas fa-shopping-basket">
                            <i class="fas fa-shopping-basket" ></i>
                            <span class="top-cart-number">{{$count}}</span>
                        </a>
                    </div>
                </div>
                <div class="primary-menu-trigger">
                    <button class="cnvs-hamburger" type="button" title="Open Mobile Menu">
                        <span class="cnvs-hamburger-box"><span class="cnvs-hamburger-inner"></span></span>
                    </button>
                </div>
                <!--Meno-main-->
                <nav class="primary-menu">
                    <ul class="menu-container">
                        <li class="menu-item current"><a class="menu-link" href="{{url('/')}}"><div>Home</div></a></li>
                        <li class="menu-item"><a class="menu-link" href="{{'shop'}}"><div>Shop</div></a></li>
                        <li class="menu-item"><a class="menu-link" href="{{'blog'}}"><div>Blog</div></a></li>
                        <li class="menu-item"><a class="menu-link" href="{{'contact'}}"><div>Contact</div></a></li>
                        <li class="menu-item"><a class="menu-link" href="{{'my_orders'}}"><div>My Oreders</div></a></li>
                    </ul>
                </nav>
                <form class="top-search-open" action="{{url('search')}}" method="get">
                    <input type="text" name="search" class="form-control" value placeholder="Search" autocomplete="on">
                </form>
            </div>
        </div>
    </div>
</header>
