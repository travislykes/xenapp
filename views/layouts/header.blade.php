<header class="site-header">
    <!-- Mobile header -->
    <div id="mnmd-mobile-header" class="mobile-header visible-xs visible-sm">
        <div class="mobile-header__inner mobile-header__inner--flex">
            <div class="header-branding header-branding--mobile mobile-header__section text-left">
                <div class="header-logo header-logo--mobile flexbox__item text-left">
                    <a href="index.html">
                        <img src="images/Logo.png" alt="logo">
                    </a>
                </div>
            </div>
            <div class="mobile-header__section text-right">
                <button type="submit" class="mobile-header-btn js-search-dropdown-toggle">
                    <i class="mdicon mdicon-search mdicon--last hidden-xs"></i>
                    <i class="mdicon mdicon-search visible-xs-inline-block"></i>
                </button>
                <a href="#mnmd-offcanvas-primary"
                   class="offcanvas-menu-toggle mobile-header-btn js-mnmd-offcanvas-toggle">
                    <i class="mdicon mdicon-menu mdicon--last hidden-xs"></i>
                    <i class="mdicon mdicon-menu visible-xs-inline-block"></i>
                </a>
            </div>
        </div>
    </div><!-- Mobile header -->

    <!-- Navigation bar -->
    <nav class="navigation-bar navigation-bar--fullwidth hidden-xs hidden-sm js-sticky-header-holder">
        <div class="container">
            <div class="navigation-bar__inner">
                <div class="navigation-bar__section">
                    <a href="#mnmd-offcanvas-primary" class="offcanvas-menu-toggle navigation-bar-btn js-mnmd-offcanvas-toggle hidden-lg hidden-md hidden-sm hidden-xs">
                        <i class="mdicon mdicon-menu"></i>
                    </a>
                    <a href="./index.html">
                        <img src="images/Logo.png" alt="logo">
                    </a>
                </div>
                <div class="navigation-wrapper navigation-bar__section text-right js-priority-nav">
                    <ul id="menu-main-menu" class="navigation navigation--main navigation--inline">
                        <li class="menu-item">
                            <a href="/">Home</a>
                        </li>
                        @if(empty($_SESSION['id']))
                        <li class="menu-item">
                            <a href="login">Login</a>
                        </li>
                        @else
                        </li> <li class="menu-item">
                            <a href="#">Create Article</a>
                        </li>
                        </li> <li class="menu-item">
                            <a href="/logout">Logout</a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div><!-- .navigation-bar__inner -->

        </div><!-- .container -->
    </nav><!-- Navigation-bar -->
</header>
