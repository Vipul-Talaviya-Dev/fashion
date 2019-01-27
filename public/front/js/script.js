function show_loader() {
    $(".loader").css("display", "block")
}

function hide_loader(a) {
    setTimeout(function() {
        $(".loader").fadeOut("slow")
    }, a)
}

function page_redirect(b, a) {
    window.setTimeout(function() {
        window.location.href = b
    }, a)
}

function isNumberKey(b) {
    var a = (b.which) ? b.which : event.keyCode;
    if (a != 46 && a != 45 && a > 31 && (a < 48 || a > 57)) {
        return false
    }
    return true
}

function max_length(c, b, a) {
    b = b || event;
    a = a;
    if (b.keyCode === 13) {
        event.preventDefault()
    }
    if (c.value.length >= a && b.keyCode > 46) {
        return false
    }
    return true
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
    /**
     * [Check Email on type]
     * @return {[type]}
     */
     $("body").on("keyup", ".keyup-email", function() {
        $(".has-error").remove();
        var a = $(this).val();
        var b = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        if (!b.test(a)) {
            $(this).after('<span class="has-error">Please Enter Valid Email Address.</span>')
        }
    });
    /**
     * Login
     */
     $("body").on("click", "#userLogin", function() {
        $(".has-error").remove();
        var b = $(".email").val();
        var a = $(".password").val();
        var r = $(".redirect").val();
        var t = $('meta[name="csrf-token"]').attr('content');
        var c = false;
        if (b == "") {
            $(".email").after('<span class="has-error">Enter Email Address</span>');
            c = true
        }
        if (a == "") {
            $(".password").after('<span class="has-error">Enter Password</span>');
            c = true
        }
        if (c == false) {
            show_loader();
            $.ajax({
                url: "/login",
                headers: {
                    'X-CSRF-TOKEN': t
                },
                dataType: "json",
                type: "POST",
                data: {"email": b, "password": a},
                success: function(res) {
                    hide_loader();
                    if(res.status == false) {
                        toastr.warning(res.error);
                    }
                    if(res.status == true) {
                        toastr.success(res.success);
                        if(r) {
                            page_redirect(r);
                        } else {
                            page_redirect('/my-account');
                        }
                    }
                }
            });
        }
    });
     $("body").on("click", "#signUp", function() {
        $(".has-error").remove();
        var c = $(".signupMobile").val();
        var d = $(".signupEmail").val();
        var a = $(".signupPassword").val();
        var cP = $(".confirmPassword").val();
        var n = $(".signupName").val();
        var r = $(".redirect").val();
        var t = $('meta[name="csrf-token"]').attr('content');
        var reg = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        var mobile_no_reg = /^[789][0-9]{9}$/;
        var b = false;
        if (!mobile_no_reg.test(c) || c == "" || c.length < 10) {
            $(".signupMobile").after('<span class="has-error">Please Enter Valid Mobile No</span>');
            b = true
        }
        if (a != cP) {
            $(".confirmPassword").after('<span class="has-error">Password and confirm password do not match</span>');
            b = true
        }
        if (!reg.test(d) || d == "") {
            $(".signupEmail").after('<span class="has-error">Enter Email Address</span>');
            b = true
        }
        if (a == "") {
            $(".signupPassword").after('<span class="has-error">Enter Password</span>');
            b = true
        }
        if (n == "") {
            $(".signupName").after('<span class="has-error">Enter Name</span>');
            b = true
        }
        if (b == false) {
            show_loader();
            $("#otp").html("");
            $.ajax({
                url: "/signUpCheck",
                headers: {
                    'X-CSRF-TOKEN': t
                },
                dataType: "json",
                type: "POST",
                data: {"name": n, "email": d, "password": a, "mobile": c},
                success: function(res) {
                    hide_loader();
                    if(res.status == false) {
                        toastr.warning(res.error);
                    }
                    if(res.status == true) {
                        $("#registrationCheck").hide();
                        $("#otp").html(res.otp);
                        $("#otpDiv").show();
                    }
                }
            });
        }
    });
     
     $("body").on("click", "#otpBtn", function() {
        $(".has-error").remove();
        var n = $(".otp").val();
        var r = $(".redirect").val();
        var t = $('meta[name="csrf-token"]').attr('content');
        var b = false;
        if (n == "") {
            $(".otp").after('<span class="has-error">Enter Otp</span>');
            b = true
        }
        if(b == false) {
            show_loader();
            $.ajax({
                url: "/signUp",
                headers: {
                    'X-CSRF-TOKEN': t
                },
                dataType: "json",
                type: "POST",
                data: {"otp": n},
                success: function(res) {
                    hide_loader();
                    if(res.status == false) {
                        toastr.warning(res.error);
                    }
                    if(res.status == true) {
                        toastr.success(res.success);
                        if(r) {
                            page_redirect(r);
                        } else {
                            page_redirect('/my-account');
                        }
                    }
                }
            });
        }
    });

 });
