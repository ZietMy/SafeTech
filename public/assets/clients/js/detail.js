//
$(document).ready(function () {
    $(".increment-btn").click(function (e) {
        e.preventDefault();

        var qty = $(this).closest(".product-data").find(".input-qty").val();
        var availableQty = $(".available-qty").val();
        var availableQty = parseInt($(".available-qty").text(), 10);
            availableQty = isNaN(availableQty) ? 0 : availableQty;
        var value = parseInt(qty, 10);
        value = isNaN(value) ? 0 : value;
        if (value <  availableQty) {
            value++;
            $('.quantityBuy').val(value)
            $(this).closest(".product-data").find(".input-qty").val(value);
        }
    });

    $(".decrement-btn").click(function (e) {
        e.preventDefault();
        var qty = $(this).closest(".product-data").find(".input-qty").val();
        var value = parseInt(qty, 10);
        value = isNaN(value) ? 0 : value;
        if (value > 1) {
            value--;
            $('.quantityBuy').val(value);
            $(this).closest(".product-data").find(".input-qty").val(value);
        }
    });
    // $('.addToCartBtn').click(function(e){
    //     e.preventDefault();
    //     var qty = $(this).closest(".product-data").find(".input-qty").val();
    //     var pro_id = $(this).val();
    //     var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    //     $.ajax({
    //         method: "POST",
    //         url: "http://127.0.0.1:8000/cart/store",
    //         headers: {
    //             'X-CSRF-TOKEN': CSRF_TOKEN // Thêm CSRF token vào header của request
    //         },
    //         data: {
    //             "_token": CSRF_TOKEN,
    //             "product_id":pro_id,
    //             "quantity_purchase": qty,
    //         },
    //         success: function(response){
    //             // alertify.success(response['message'])
    //             // console.log(response);
    //         }
    //     })
    // });
        
});

const heartDOM = document.querySelector(".js-heart");
let liked = false;
heartDOM.onclick = (event) => {
    liked = !liked;
    const target = event.currentTarget;

    if (liked) {
        target.classList.remove("far");
        target.classList.add("fas", "pulse");
    } else {
        target.classList.remove("fas");
        target.classList.add("far");
    }
};

heartDOM.addEventListener("animationend", (event) => {
    event.currentTarget.classList.remove("pulse");
});

