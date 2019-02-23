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
        var byNow = $(this).attr("data-byNow");
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
			    success: function (data) {
                 if (data.status) {
                    $('.backetItem').html(data.totalItem);
                    $('.your-cart').html('');
                    $(".your-cart").load('/carts');
                    setTimeout(function myFunction() {
                        $("#cartLoad").modal();
                        $("#cartLoad").show();
                        hide_loader();
                    }, 3000);
                 } else {
                    toastr.warning(data.error);
                }
            }
        });
        }
    });
    // Remove Cart Item
    $("body").on("click", ".removeItem", function() {
        $(".your-cart").html('');
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
                  $(".your-cart").load('/carts');
                    setTimeout(function myFunction() {
                        $('.modal-backdrop').remove();
                        /*$(document).ajaxComplete(function() {
                            $('#preloader').css('display','none');
                        });*/
                        $("#cartLoad").modal();
                        $("#cartLoad").show();
                        hide_loader();
                    }, 4000);
              }
              // hide_loader();
          }
      });
    });

    $("body").on("click", ".cart-list", function() {
        $(".your-cart").html('');
        show_loader();
        /*$.ajaxSetup ({
            cache: false
        });*/
        $(".your-cart").load('/carts');
        setTimeout(function myFunction() {
            /*$(document).ajaxComplete(function() {
                $('#preloader').css('display','none');
            });*/
            $("#cartLoad").modal();
            $("#cartLoad").show();
            hide_loader();
        }, 3000);
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
        var fn = $(".fName").val();
        var ln = $(".lName").val();
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
        if (fn == "") {
            $(".fName").after('<span class="has-error">Enter First Name</span>');
            b = true
        }
        if (ln == "") {
            $(".lName").after('<span class="has-error">Enter Last Name</span>');
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
                data: {"name": fn+' '+ln, "email": d, "password": a, "mobile": c},
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

    // Address Add
    $("body").on("click", ".createAddress", function() {
        $(".has-error").remove();
        var n = $("input[name='name']").val();
        var m = $("input[name='mobile']").val();
        var p = $("input[name='pincode']").val();
        var c = $("input[name='city']").val();
        var s = $("input[name='state']").val();
        var a = $("input[name='address']").val();
        var a1 = $("input[name='address1']").val();
        var r = $(".redirect").val();
        var t = $('meta[name="csrf-token"]').attr('content');
        var b = false;
        if (n == "" || m == "" || p == "" || c == "" || s == "" || a == "" || r == "") {
            alert('Kindly All Field Required!');
            b = true;
        }
        if(b == false) {
            show_loader();
            $.ajax({
                url: "/create-address",
                headers: {
                    'X-CSRF-TOKEN': t
                },
                dataType: "json",
                type: "POST",
                data: {"name": n, "mobile": m, "address": a, "address1": a1, "pincode": p, "city": c, "state": s},
                success: function(res) {
                    hide_loader();
                    if(res.status == false) {
                        toastr.warning(res.error);
                    }
                    if(res.status == true) {
                        toastr.success(res.success);
                        location.reload();
                    }
                }
            });
        }
    });
});

$(document).ready(function () {
    $("body").on("click", ".btn-number", function(e) {
        e.preventDefault();
        fieldName = $(this).attr('data-field');
        type      = $(this).attr('data-type');
        var input = $("input[name='"+fieldName+"']");
        var price = document.getElementById('product_subtotal1'+fieldName).innerHTML;
        var currentVal = parseInt(input.val());
        if (!isNaN(currentVal)) {
            if(type == 'minus') {
                if(currentVal > input.attr('min')) {
                    input.val(currentVal - 1).change();
                    document.getElementById('product_subtotal'+fieldName).innerHTML = price *(currentVal - 1);
                    $('.error-'+fieldName).remove();
                } 
                if(parseInt(input.val()) == input.attr('min')) {
                    $('.error-'+fieldName).remove();
                    $(this).attr('disabled', true);
                }

            } else if (type == 'plus') {
                if(currentVal < input.attr('max')) {
                    input.val(currentVal + 1).change();
                    document.getElementById('product_subtotal'+fieldName).innerHTML = price *(currentVal + 1);
                }
                if(parseInt(input.val()) == input.attr('max')) {
                    $('.error-'+fieldName).remove();
                    $('.max-qty-reach-'+fieldName).after('<span class="input-error error-'+fieldName+'" style="color: red;">Max Quantity Reach</span>');
                    $(this).attr('disabled', true);
                }
            }
        } else {
            input.val(0);
        }
        //total of selling price
        var sum = 0;
        $('.sellingprice').each(function(){
            sum += parseInt($(this).text());  
        });
        document.getElementById('total').innerHTML = sum;
        //final amount
        document.getElementById('finalPrice').innerHTML = parseInt(sum);
    });

    $("body").on("focusin", ".input-number", function(){
        $(this).data('oldValue', $(this).val());
    });
    $("body").on("change", ".input-number", function() {
        minValue =  parseInt($(this).attr('min'));
        maxValue =  parseInt($(this).attr('max'));
        valueCurrent = parseInt($(this).val());
        name = $(this).attr('name');
        if(valueCurrent >= minValue) {
            $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
        } 
        if(valueCurrent <= maxValue) {
            $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
        } 
    });
});
