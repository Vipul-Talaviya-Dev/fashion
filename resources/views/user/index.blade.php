@extends('user.layouts.main')

@section('title', 'Online Shopping')

@section('css')
<link href="/front/css/slick.css" rel="stylesheet" type="text/css" property="" media="all" />
<style type="text/css">
/*.vip {
  position: relative;
}

.slide__caption {
  top: 55%;
  text-align: center;
  position: absolute;
  width: 100%;
  z-index: 83;
  color: #e22020;
  font-size: -webkit-xxx-large;
  font-weight: 800;
}*/
.btn-danger {
        background-color: #d0a65e;
        border-color: #d0a65e;
    }
    .btn-danger:hover, .btn-danger:focus, .btn-danger.focus, .btn-danger:active, .btn-danger.active, .open > .dropdown-toggle.btn-danger {
      background-color: #d0a65e;
        border-color: #d0a65e;
    }
    .close {
     color: #fff;
     font-weight: inherit;  
     opacity: 1; 
     font-size: 16px;
}

#indexModal .modal-content {
  width: 50%;margin-left: 30%;margin-top: 20%;
}
@media (min-width: 320px) and (max-width: 480px) {
  #indexModal .modal-content {
    width: auto;margin-left: 0;margin-top: 0;
  }
}
</style>
@endsection

@section('content')
<!-- banner -->
<div class="">
  <div class="bannerImg sliderfig" style="margin: 1em 0 0;">
    <ul id="banner">      
      @foreach($banners as $banner)
        <li title="{{ $banner->name }}" style="padding: 0px;">
          <a href="{{ $banner->url }}" class="vip">
            <!-- <div class="slide__caption text-center">{{ $banner->description }}</div> -->
            <img src="{{ \Cloudder::secureShow($banner->image) }}" alt="{{ $banner->name }}" class="img-responsive" />
          </a>
        </li>
      @endforeach
    </ul>
  </div>
</div>

<!-- special-deals -->
<section class="banner-home-bottom text-center">  
  <div class="home-page">
    <div class="col-sm-12">
      <br><br>
      <h2 class="title"><span>NEW SEASON</span> bestsellers</h2>
      <div class="sub-title">&nbsp;</div>
    </div>
    <ul class="clearfix shop-by-occasion-banner">
      <div>
        @if(isset($windowImages[1]))
          <li class="col-sm-6 wow fadeInUp animated padd-5 row-1 animated" data-wow-delay="150ms" style="visibility: visible; animation-delay: 150ms;">        
            <a href="{{ $windowImages[1]['url'] }}" class="w3agile_special_deals_grid_left_grid">
              <img src="{{ $windowImages[1]['image'] }}" class="img-responsive"> 
              <h4>
                <span class="jockey-one">{{ $windowImages[1]['title'] }}</span>
              </h4>
              <!-- <div class="shop-now">Shop Now</div> -->
            </a>
          </li>
          @endif
          @if(isset($windowImages[2]))
          <li class="col-sm-6 wow fadeInUp animated padd-5 animated" data-wow-delay="150ms" style="visibility: visible; animation-delay: 150ms;">        
            <a href="{{ $windowImages[2]['url'] }}" class="w3agile_special_deals_grid_left_grid">
              <img src="{{ $windowImages[2]['image'] }}" class="img-responsive"> 
              <h4>
                <span class="jockey-one"> {{ $windowImages[2]['title'] }}</span>
              </h4>
              <!-- <div class="shop-now">Shop Now</div> -->
            </a>
          </li>
          @endif
        </div>
        <div class="clearfix"></div>
        <div>
          @if(isset($windowImages[3]))
          <li class="col-sm-6 wow fadeInUp animated padd-5 animated" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms;">        
            <a href="{{ $windowImages[3]['url'] }}" class="w3agile_special_deals_grid_left_grid">
              <img src="{{ $windowImages[3]['image'] }}" class="img-responsive"> 
              <h4>
                <span class="jockey-one"> {{ $windowImages[3]['title'] }}</span>
              </h4>
              <!-- <div class="shop-now">Shop Now</div> -->
            </a>
          </li>
          @endif
          @if(isset($windowImages[4]))
          <li class="col-sm-6 wow fadeInUp animated padd-5 animated" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms;">        
            <a href="{{ $windowImages[4]['url'] }}" class="w3agile_special_deals_grid_left_grid">
              <img src="{{ $windowImages[4]['image'] }}" class="img-responsive">
              <h4>
                <span class="jockey-one">{{ $windowImages[4]['title'] }}</span>
              </h4> 
              <!-- <div class="shop-now">Shop Now</div> -->
            </a>
          </li>
          @endif
        </div>
        <div class="clearfix"></div>
        <div>
          @if(isset($windowImages[5]))
          <li class="col-sm-6 wow fadeInUp animated padd-5 animated" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms;">        
            <a href="{{ $windowImages[5]['url'] }}" class="w3agile_special_deals_grid_left_grid">
              <img src="{{ $windowImages[5]['image'] }}" class="img-responsive"> 
              <h4>
                <span class="jockey-one">{{ $windowImages[5]['title'] }}</span>
              </h4>
              <!-- <div class="shop-now">Shop Now</div> -->
            </a>
          </li>
          @endif
          @if(isset($windowImages[6]))
          <li class="col-sm-6 wow fadeInUp animated padd-5 animated" data-wow-delay="450ms" style="visibility: visible; animation-delay: 450ms;">        
            <a href="{{ $windowImages[6]['url'] }}" class="w3agile_special_deals_grid_left_grid">
              <img src="{{ $windowImages[6]['image'] }}" class="img-responsive"> 
              <h4>
                <span class="jockey-one">{{ $windowImages[6]['title'] }}</span>
              </h4>
              <!-- <div class="shop-now">Shop Now</div> -->
            </a>
          </li>
          @endif
        </div>
        <div class="clearfix"></div>
        <div>
          @if(isset($windowImages[7]))
          <li class="col-sm-6 wow fadeInUp animated padd-5 animated" data-wow-delay="450ms" style="visibility: visible; animation-delay: 450ms;">        
            <a href="{{ $windowImages[7]['url'] }}" class="w3agile_special_deals_grid_left_grid">
              <img src="{{ $windowImages[7]['image'] }}" class="img-responsive"> 
              <h4>
                <span class="jockey-one">{{ $windowImages[7]['title'] }}</span>
              </h4>
              <!-- <div class="shop-now">Shop Now</div> -->
            </a>
          </li>
          @endif
          @if(isset($windowImages[8]))
          <li class="col-sm-6 wow fadeInUp animated padd-5 animated" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms;">        
            <a href="{{ $windowImages[8]['url'] }}" class="w3agile_special_deals_grid_left_grid">
              <img src="{{ $windowImages[8]['image'] }}" class="img-responsive"> 
              <h4>
                <span class="jockey-one"> {{ $windowImages[8]['title'] }}</span>
              </h4>
              <!-- <div class="shop-now">Shop Now</div> -->
            </a>
          </li>
          @endif
        </div>
        <div class="clearfix"></div>
        <div>
          @if(isset($windowImages[9]))
          <li class="col-sm-6 wow fadeInUp animated padd-5 animated" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms;">        
            <a href="{{ $windowImages[9]['url'] }}" class="w3agile_special_deals_grid_left_grid">
              <img src="{{ $windowImages[9]['image'] }}" class="img-responsive">
              <h4>
                <span class="jockey-one">{{ $windowImages[9]['title'] }}</span>
              </h4> 
              <!-- <div class="shop-now">Shop Now</div> -->
            </a>
          </li>
          @endif
          @if(isset($windowImages[10]))
          <li class="col-sm-6 wow fadeInUp animated padd-5 animated" data-wow-delay="150ms" style="visibility: visible; animation-delay: 150ms;">        
            <a href="{{ $windowImages[10]['url'] }}" class="w3agile_special_deals_grid_left_grid">
              <img src="{{ $windowImages[10]['image'] }}" class="img-responsive"> 
              <h4>
                <span class="jockey-one">{{ $windowImages[10]['title'] }}</span>
              </h4>
              <!-- <div class="shop-now">Shop Now</div> -->
            </a>
          </li>
          @endif
        </div>
    </ul>
  </div>
  <a href="{{ route('user.products') }}"><div class="more-product">Load More</div></a><p><br></p>
</section>


<div id="indexModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-center"></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <h5 class="text-center" style="margin-top: 5px;line-height: 1.3;">Website is under testing. Only company’s employee can generate the order. Other order will be strictly neglected.! Thanks.</h5>
        </div>
      </div>
      <div class="modal-footer">
        <a href="javascript:void(0);" class="btn btn-danger close">Close</a>
      </div>
    </div>
  </div>
</div>
<!-- //special-deals -->
@endsection

@section('js')
<script src="/front/js/slick.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(window).load(function() {
      $('#banner').slick({
        dots: false,
        infinite: false,
        autoplay: true,
        autoplaySpeed: 5000,
      });
      $(".slide__caption").css('position', 'absolute');
      $(".slick-arrow").html('');
      $('#indexModal').modal();
      $("body").on("click", ".close", function() {
        $('#indexModal').modal("hide");
      });
    });
</script>
@endsection
