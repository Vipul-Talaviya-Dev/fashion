<div class="header">
    <div class="container">
        <div class="w3l_login">
            @if(!\Auth::check())
                <a href="javascript:void(0);" class="loginModel"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a>
            @else
                <a href="{{ route('user.myAccount') }}"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a>
            @endif
        </div>
        <div class="w3l_logo">
            <h1><a href="{{ route('user.index') }}">Women's Fashion<span>For Fashion Lovers</span></a></h1>
        </div>
        <div class="search">
            <input class="search_box" type="checkbox" id="search_box">
            <label class="icon-search" for="search_box"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></label>
            <div class="search_form">
                <form action="#" method="post">
                    <input type="text" name="Search" placeholder="Search...">
                    <input type="submit" value="Send">
                </form>
            </div>
        </div>
        <div class="cart box_1">
            <a href="{{ route('user.cart') }}">
                <div class="total">
                <!--<span class="simpleCart_total"></span>--> (<span id="backetItem" class="backetItem">{{ ((\Session::get('cart') =="") ? 0 : count(\Session::get('cart'))) }}</span> items)</div>
                <img src="/front/images/bag.png" alt="" />
            </a>
            <p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>
            <div class="clearfix"> </div>
        </div>  
        <div class="clearfix"> </div>
    </div>
</div>
<div class="navigation">
    <div class="container">
        <nav class="navbar navbar-default">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header nav_2">
                <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div> 
            <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="{{ route('user.index') }}" class="act">Home</a></li>   
                    <!-- Mega Menu -->
                    <?php
                        $categories = \App\Models\Category::parents()->active()->get(['id', 'name', 'parent_id', 'slug']);
                    ?>
                    @foreach($categories as $category)
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">{{ $category->name }} <b class="caret"></b></a>
                        <ul class="dropdown-menu multi-column columns-3" style="margin-left: 130px;">
                            <div class="row">
                            <?php
                                $subCategories = \App\Models\Category::active()->where('parent_id', $category->id)->get(['id', 'name', 'parent_id', 'slug']);
                            ?>          
                                @foreach($subCategories as $subCategory)
                                <div class="col-sm-3">
                                    <ul class="multi-column-dropdown">
                                        <!-- <h6><a href="{{ route('user.products', ['mainCategory' => $category->slug, 'subCategory' => $subCategory->slug])}}">{{ $subCategory->name }}</a></h6> -->
                                        <a href="{{ route('user.products', ['mainCategory' => $category->slug, 'subCategory' => $subCategory->slug, 'thirdCategory' => 'all'])}}"><h6>{{ $subCategory->name }}</h6></a>
                                        <?php
                                            $thirdCategories = \App\Models\Category::active()->where('parent_id', $subCategory->id)->get(['id', 'name', 'parent_id', 'slug']);
                                        ?>
                                        @foreach($thirdCategories as $thirdCategory)
                                        <li><a href="{{ route('user.products', ['mainCategory' => $category->slug, 'subCategory' => $subCategory->slug, 'thirdCategory' => $thirdCategory->slug])}}">{{ $thirdCategory->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endforeach
                                <!-- <div class="clearfix"></div> -->
                            </div>
                        </ul>
                    </li>
                    @endforeach
                    <!-- <li><a href="about.html">About Us</a></li> -->
                    <!-- <li><a href="short-codes.html">Short Codes</a></li> -->
                    <li><a href="{{ route('user.contact') }}">Contact Us</a></li>
                </ul>
            </div>
        </nav>
    </div>
</div>