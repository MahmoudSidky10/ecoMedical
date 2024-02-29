@section("js")
    <script>

        // Fire Alert
        function fireAlert(status, msg, time = 1500) {
            Swal.fire({
                position: 'top-start',
                icon: status,
                title: msg,
                showConfirmButton: false,
                timer: time
            })
        }

        // Wishlist Function ..

        function removeItemFromWishList(item_id) {
            // remove with Ajax ....
            $.post("{{url("/removeItemFromWishList")}}",
                {
                    item_id: item_id,
                    _token: "{{csrf_token()}}"
                },
                function () {
                    $("#product-item-" + item_id).remove()
                    decreaseWishListCount(item_id)
                });
        }

        function storeItemIntoWishList(item_id) {
            $.post("{{url("/storeItemIntoWishList")}}",
                {
                    item_id: item_id,
                    _token: "{{csrf_token()}}"
                },
                function (data) {
                    if (data.status == "create") {
                        increaseWishListCount(item_id)
                    } else {
                        decreaseWishListCount(item_id)
                    }
                });
        }

        function increaseWishListCount(item_id) {
            var wishListCount = $("#wishListCount").text();
            $("#wishListCount").removeClass("hide")
            var integer = parseInt(wishListCount, 10);
            $("#wishListCount").text(integer + 1);
            $(".btn-wishlist-product-" + item_id).removeClass("w-icon-heart")
            $(".btn-wishlist-product-" + item_id).addClass("w-icon-heart-full")
            $(".btn-wishlist-product-" + item_id).css("color", "#42a4e8")

            fireAlert("success", "المنتج قد نم اضافتها لقائمة الغسيل الخاصة بك .");
        }

        function decreaseWishListCount(item_id) {
            var wishListCount = $("#wishListCount").text();
            if (wishListCount > 1) {
                $("#wishListCount").text(wishListCount - 1)
            } else {
                $("#wishListCount").addClass("hide")
                $("#wishListCount").text("0")
            }
            $(".btn-wishlist-product-" + item_id).removeClass("w-icon-heart-full")
            $(".btn-wishlist-product-" + item_id).addClass("w-icon-heart")
            $(".btn-wishlist-product-" + item_id).css("color", "black")

            fireAlert("success", "تمت إزالة المنتج من قائمة الرغبات الخاصة بك.");
        }

        // =========================================================//

        // Compare Function ..

        function removeItemFromCompareList(item_id) {
            $.post("{{url("/removeItemFromCompareList")}}",
                {
                    item_id: item_id,
                    _token: "{{csrf_token()}}"
                },
                function () {
                    decreaseCompareCount(item_id);
                    $(".comp-prod-" + item_id).remove();
                });

        }

        function storeItemIntoCompareList(item_id) {
            $.post("{{url("/storeItemIntoCompareList")}}",
                {
                    item_id: item_id,
                    _token: "{{csrf_token()}}"
                },
                function (data) {
                    if (data.status == "create") {
                        increaseCompareCount(item_id)
                    } else {
                        decreaseCompareCount(item_id)
                    }
                });
        }

        function increaseCompareCount(item_id) {
            var CompageCount = $("#compareCount").text();
            $("#compareCount").removeClass("hide")
            var integer = parseInt(CompageCount, 10);
            $("#compareCount").text(integer + 1);
            $(".btn-compare-product-" + item_id).addClass("w-icon-check-solid")
            $(".btn-compare-product-" + item_id).removeClass("w-icon-compare")
            $(".btn-compare-product-" + item_id).css("color", "#42a4e8")

            fireAlert("success", "تمت إضافة المنتج إلى قائمة المقارنة الخاصة بك.");
        }

        function decreaseCompareCount(item_id) {
            var CompageCount = $("#compareCount").text();
            if (CompageCount > 1) {
                $("#compareCount").text(CompageCount - 1)
            } else {
                $("#compareCount").addClass("hide")
                $("#compareCount").text("0")
            }
            $(".btn-compare-product-" + item_id).removeClass("w-icon-check-solid")
            $(".btn-compare-product-" + item_id).addClass("w-icon-compare")
            $(".btn-compare-product-" + item_id).css("color", "black")

            fireAlert("success", "تمت إزالة المنتج من قائمة المقارنة الخاصة بك.");
        }

        // ====================================================== //

        // Filter Category products ( filter page ) ...
        $("#filter-show-numbers").on("change", function () {
            $("#filter-form").submit()
        });
        $("#filter-orderBy").on("change", function () {
            $("#filter-form").submit()
        });
        $("#filter-byCategoryFilter").on("change", function () {
            $("#filter-form").submit()
        });

        // =================================================================== //

        // Cart

        function removeItemFromCartList(item_id) {
            $.post("{{url("/removeItemFromCartList")}}",
                {
                    item_id: item_id,
                    _token: "{{csrf_token()}}"
                },
                function () {
                    decreaseCartCount(item_id);
                    $(".cart-prod-" + item_id).remove();
                });
        }

        function storeItemIntoCart(item_id) {

            var optionsId = [];
            $(".product-variations .option-cla").each(function () {
                optionsId.push($(this).data("id"));
            });
            $.post("{{url("/storeItemIntoCart")}}",
                {
                    item_id: item_id,
                    optionsId: optionsId,
                    _token: "{{csrf_token()}}"
                },
                function (data) {
                    if (data.status == "create") {
                        increaseCartCount(item_id)
                    } else {
                        decreaseCartCount(item_id)
                    }
                });
        }

        function increaseCartCount(item_id) {
            var CartCount = $("#cartCount").text();
            $("#cartCount").removeClass("hide")
            var integer = parseInt(CartCount, 10);
            $("#cartCount").text(integer + 1);

            $(".cart-btn-icon").removeClass("w-icon-cart");
            $(".cart-btn-icon").addClass("w-icon-check");

            $(".cart-btn-txt").text("{{__("language.remove_from_cart")}}");

            fireAlert("success", "تمت إضافة المنتج إلى قائمة سلة التسوق الخاصة بك.");
        }

        function decreaseCartCount(item_id) {
            var CartCount = $("#cartCount").text();
            if (CartCount > 1) {
                $("#cartCount").text(CartCount - 1)
            } else {
                $("#cartCount").addClass("hide")
                $("#cartCount").text("0")
            }

            $(".cart-btn-icon").removeClass("w-icon-check");
            $(".cart-btn-icon").addClass("w-icon-cart");

            $(".cart-btn-txt").text("{{__("language.add_to_cart")}}");

            fireAlert("success", "تمت إزالة المنتج من قائمة سلة التسوق الخاصة بك.");
        }

        function quantityPlusAction(item_id, price, max) {
            var value = parseInt(document.getElementById('number-' + item_id).value, 10);
            if (value == max) {
                document.getElementById('number-' + item_id).value = max;
                fireAlert("error", "هذا المنتج لديه الحد الأقصى لإضافته إلى سلة التسوق الخاصة بك.", 2500);
            } else {
                value = isNaN(value) ? 0 : value;
                value++;
                document.getElementById('number-' + item_id).value = value;

                // call Ajax to plus one cart product count in db ...
                $.post("{{url("/updateItemCountIntoCart")}}",
                    {
                        item_id: item_id,
                        count: value,
                        _token: "{{csrf_token()}}"
                    },
                    function () {
                        var fullPrice = price * value;
                        $("#cart-product-amount-" + item_id).text(fullPrice);
                        updateCartTotalPrice()
                    });
            }
        }

        function quantityMinusAction(item_id, price) {

            var value = parseInt(document.getElementById('number-' + item_id).value, 10);
            if (value == 1) {
                document.getElementById('number-' + item_id).value = 1;
                fireAlert("error", "هذا المنتج لديه الحد الأدنى لإضافته إلى سلة التسوق الخاصة بك.", 2500);
            } else {
                value = isNaN(value) ? 0 : value;
                value < 1 ? value = 1 : '';
                value--;
                document.getElementById('number-' + item_id).value = value;
                // call Ajax to plus one cart product count in db ...
                $.post("{{url("/updateItemCountIntoCart")}}",
                    {
                        item_id: item_id,
                        count: value,
                        _token: "{{csrf_token()}}"
                    },
                    function () {
                        var fullPrice = price * value;
                        $("#cart-product-amount-" + item_id).text(fullPrice);
                        updateCartTotalPrice();
                    });

            }
        }

        function removeCouponCodeApply() {
            $("#code").val("");
            $(".done_discount").addClass("hide");
        }

        function updateCartTotalPrice() {
            var sum = 0;
            $('.cart-sub-amount').each(function () {
                sum += parseFloat($(this).text());  // Or this.innerHTML, this.innerText
            });
            $("#cart-total-price").text(sum);
            $("#cart-sub-price").text(sum);

            removeCouponCodeApply()
        }

        function updateProductPrice(option_id, property_id, isHasSale, price, price_sale) {

            var hasClassSta = false;
            if ($(".options-" + option_id).hasClass("option-cla")) {
                var hasClassSta = true;
            } else {
                var hasClassSta = false;
            }

            $(".prop-options-" + property_id).removeClass("option-cla");

            if (hasClassSta == true) {
                $(".options-" + option_id).removeClass("option-cla");
            } else {
                $(".options-" + option_id).addClass("option-cla");
            }

            var sum = 0;
            $(".product-variations .option-cla").each(function () {
                sum += $(this).data("price");
            });
            $("#product-final-price").removeClass("hide");

            if (isHasSale) {
                price = price_sale;
            }
            $("#product-final-price").text((sum + price) + '{{$setting->app_currency}}');
        }


        function checkCouponCode() {
            var code = $("#code").val();
            var price = $("#cart-total-price").text();
            // call ajax to check code ...
            $.post("{{url("/checkCouponCode")}}",
                {
                    code: code,
                    _token: "{{csrf_token()}}"
                },
                function (data, status) {
                    if (data.status == true) {
                        var discount = data.item.discount;
                        var discountValue = price * (discount / 100);
                        $("#cart-sub-price").text(price - discountValue);
                        $("#couponId").val(data.item.id);
                        $(".done_discount").removeClass("hide");
                        $(".error_discount").addClass("hide");
                    } else {
                        $(".done_discount").addClass("hide");
                        $(".error_discount").removeClass("hide");
                    }
                });

        }


    </script>
@endsection