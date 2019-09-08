<div class="sidebar sidebar-main">
    <div class="sidebar-content">
        <!-- <div class="sidebar-user">
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
        </div> -->
        <?php
            $admin  = \Session::get('admin');
            if($admin->modules_id != null) {
                $moduleIds = explode(',', $admin->modules_id);
            } else {
                if($admin->role == 1) {
                    $moduleIds = \App\Models\Module::pluck('id')->toArray();
                } else {
                    $moduleIds = [];
                }
            }
        ?>

        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">
                    <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
                    @if($admin->role == 1)
                    <li class="active"><a href="{{ route('admin.subAdmins') }}"><i class="icon-home4"></i> <span>Sub Admin</span></a></li>
                    @endif
                    @if(in_array(1, $moduleIds))
                    <li class=""><a href="{{ route('admin.dashboard') }}"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
                    @endif
                    @if(in_array(2, $moduleIds))
                    <li><a href="{{ route('admin.appContent') }}"><i class="fa fa-cog"></i> <span>App Content</span></a></li>
                    @endif
                    @if(in_array(3, $moduleIds))
                    <li><a href="{{ route('admin.colors') }}"><i class="icon-droplet"></i> Color</a></li>
                    @endif
                    @if(in_array(4, $moduleIds))
                    <li><a href="{{ route('admin.sizes') }}"><i class="icon-height"></i> Size</a></li>
                    @endif
                    @if(in_array(5, $moduleIds))
                    <li><a href="{{ route('admin.categories') }}"><i class="icon-price-tags"></i> Category</a></li>
                    @endif
                    @if(in_array(17, $moduleIds))
                    <li><a href="{{ route('admin.productTypes') }}"><i class="icon-basket"></i> <span>Product Type</span></a></li>
                    @endif
                    @if(in_array(6, $moduleIds))
                    <li><a href="{{ route('admin.products') }}"><i class="icon-basket"></i> Product</a></li>
                    @endif
                    @if(in_array(7, $moduleIds))
                    <li><a href="{{ route('admin.orders') }}"><i class="icon-bag"></i> Order</a></li>
                    @endif
                    @if(in_array(8, $moduleIds))
                    <!-- <li><a href="javascript:void(0);"><i class="icon-cart-add"></i> Assign Order</a></li> -->
                    @endif
                    @if(in_array(9, $moduleIds))
                    <li><a href="{{ route('admin.banners') }}"><i class="icon-stack3"></i> Banner</a></li>
                    @endif
                    @if(in_array(10, $moduleIds))
                    <li><a href="{{ route('admin.windowImages') }}"><i class="icon-stack3"></i> Home Images</a></li>
                    @endif
                    @if(in_array(11, $moduleIds))
                    <li><a href="{{ route('admin.users') }}"><i class="icon-users"></i> User</a></li>
                    @endif
                    @if(in_array(12, $moduleIds))
                    <li><a href="{{ route('admin.offers') }}"><i class="icon-gift"></i> <span>Offers</span></a></li>
                    @endif
                    @if(in_array(13, $moduleIds))
                    <li><a href="{{ route('admin.contacts') }}"><i class="icon-phone"></i> <span>Contacts</span></a></li>
                    @endif
                    @if(in_array(14, $moduleIds))
                    <li><a href="{{ route('admin.content.edit', ['id' => 1]) }}"><i class="fa fa-cog"></i> <span>About</span></a></li>
                    @endif
                    @if(in_array(15, $moduleIds))
                    <li><a href="{{ route('admin.content.edit', ['id' => 2]) }}"><i class="fa fa-cog"></i> <span>FAQ</span></a></li>
                    @endif
                    @if(in_array(16, $moduleIds))
                        <li>
                            <a href="javascript:void(0);"><i class="fa fa-cog"></i> <span>Condition Modules</span></a>
                            <ul>
                                <li><a href="{{ route('admin.content.edit', ['id' => 3]) }}"><i class="fa fa-cog"></i> <span>Term & Condition</span></a></li>
                                <li><a href="{{ route('admin.content.edit', ['id' => 4]) }}"><i class="fa fa-cog"></i> <span>Privacy Policy</span></a></li>
                                <li><a href="{{ route('admin.content.edit', ['id' => 5]) }}"><i class="fa fa-cog"></i> <span>Return Policy</span></a></li>
                            </ul>
                        </li>
                    @endif
                    @if(in_array(18, $moduleIds))
                        <li><a href="{{ route('admin.contantImportForm') }}"><i class="fa fa-cog"></i> <span>Contact Import</span></a></li>
                    @endif
                    @if(false)
                    <li>
                        <a href="javascript:void(0);"><i class="icon-basket"></i> <span>Product</span></a>
                        <ul>
                            <li><a href="{{ route('admin.colors') }}"><i class="icon-droplet"></i> Color</a></li>
                            <li><a href="{{ route('admin.sizes') }}"><i class="icon-height"></i> Size</a></li>
                            <!-- <li><a href="{{ route('admin.brands') }}"><i class="icon-price-tags"></i> Brand</a></li> -->
                            <li><a href="{{ route('admin.categories') }}"><i class="icon-price-tags"></i> Category</a></li>
                            <li><a href="{{ route('admin.products') }}"><i class="icon-basket"></i> Product</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);"><i class="icon-bag"></i> <span>Order's</span></a>
                        <ul>
                            <li><a href="{{ route('admin.orders') }}"><i class="icon-bag"></i> Order</a></li>
                            <li><a href="javascript:void(0);"><i class="icon-cart-add"></i> Assign
                            Order</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);"><i class="icon-tree6"></i> <span>Module</span></a>
                        <ul>
                            <li><a href="{{ route('admin.banners') }}"><i class="icon-stack3"></i> Banner</a></li>
                            <li><a href="{{ route('admin.windowImages') }}"><i class="icon-stack3"></i> Home Images</a></li>
                            <!-- <li><a href="javascript:void(0);"><i class="icon-stack3"></i> Module</a></li> -->
                        </ul>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>