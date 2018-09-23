<div class="sidebar sidebar-main">
    <div class="sidebar-content">
        <div class="sidebar-user">
            <div class="category-content">
                <div class="media">
                    <a href="javascript:void(0);" class="media-left"><img src="/assets/images/images (11).jpg" class="img-circle img-sm" alt=""></a>
                    <div class="media-body">
                        <span class="media-heading text-semibold">{{ ucwords(Session::get('admin')->name)}}</span>
                        <div class="text-size-mini text-muted"></div>
                    </div>
                    <div class="media-right media-middle">
                        <ul class="icons-list">
                            <li><a href="javascript:void(0);"><i class="icon-cog3"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">
                    <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
                    <li class="active"><a href="{{ route('admin.dashboard') }}"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
                    <li>
                        <a href="javascript:void(0);"><i class="icon-basket"></i> <span>Product</span></a>
                        <ul>
                            <li><a href="{{ route('admin.colors') }}"><i class="icon-droplet"></i> Color</a></li>
                            <li><a href="{{ route('admin.sizes') }}"><i class="icon-height"></i> Size</a></li>
                            <li><a href="{{ route('admin.brands') }}"><i class="icon-price-tags"></i> Brand</a></li>
                            <li><a href="{{ route('admin.categories') }}"><i class="icon-price-tags"></i> Category</a></li>
                            <li><a href="javascript:void(0);"><i class="icon-price-tags"></i> Attribute</a></li>
                            <li><a href="javascript:void(0);"><i class="icon-price-tags"></i>Attribute Value</a></li>
                            <li><a href="javascript:void(0);"><i class="icon-basket"></i> Product</a></li>
                        </ul>
                    </li>
                        <li><a href="{{ route('admin.offers') }}"><i class="icon-gift"></i> <span>Offers</span></a></li>
                        <li>
                            <a href="javascript:void(0);"><i class="icon-bag"></i> <span>Order's</span></a>
                            <ul>
                                <li><a href="javascript:void(0);"><i class="icon-bag"></i> Order</a></li>
                                <li><a href="javascript:void(0);"><i class="icon-cart-add"></i> Assign
                                Order</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);"><i class="icon-tree6"></i> <span>Module</span></a>
                            <ul>
                                <li><a href="{{ route('admin.banners') }}"><i class="icon-stack3"></i> Banner</a></li>
                                <li><a href="javascript:void(0);"><i class="icon-stack3"></i> Ad's</a></li>
                                <li><a href="javascript:void(0);"><i class="icon-stack3"></i> Module</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);"><i class="icon-users2"></i> <span>User</span></a>
                            <ul>
                                <li><a href="javascript:void(0);"><i class="icon-users"></i> Customer</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);"><i class="icon-balance"></i> <span>FashHunt</span></a>
                            <ul>
                                <li><a href="javascript:void(0);"><i class="icon-balance"></i> Backend</a></li>
                                <li><a href="javascript:void(0);"><i class="icon-coin-dollar"></i> Payout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>