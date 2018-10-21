function show_loader() {
    $(".loader").css("display", "block")
}

function hide_loader(a) {
    setTimeout(function() {
        $(".loader").fadeOut("slow")
    }, a)
}

$(document).ready(function() {
    $("body").on("click", ".item_add", function() {
        var p = $(".varselected").attr("data-product");
        var v = $(".varselected").attr("data-variation");
        // var q = $(".qty").val();
        if (typeof p === "undefined" || typeof v === "undefined") {
            toastr.warning("Select Size.");
            return false
        }
        if (!p) {
            toastr.warning("Select Size");
            return false
        } else {
            show_loader();
            $.ajaxSetup({
                cache: false
            });
            $.ajax({
			    type: 'GET',
			    url: '/product/add/to/cart/item?product_id='+p+'&variation_id='+v,
			    // data: {'product_id': p, 'variation_id': v },
			    success: function (data) {
			        if (data.status) {
			            $('.backetItem').html(data.totalItem);
			        } else {
			        	toastr.warning(data.error);
			        }
			        hide_loader();
			    }
			});
        }
    });
    // Remove Cart Item
    $("body").on("click", ".removeItem", function() {
    	var id = $(this).attr("data-id");
    	show_loader();
        $.ajaxSetup({
            cache: false
        });
        $.ajax({
		    type: 'GET',
		    url: '/product/add/to/cart/item?removeCartId='+id,
		    success: function (data) {
		        if (data.status) {
		            $('.backetItem').html(data.totalItem);
		            window.location.reload();
		        }
		        hide_loader();
		    }
		});
    });
});
