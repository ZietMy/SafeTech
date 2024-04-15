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
            $(this).closest(".product-data").find(".input-qty").val(value);
        }
    });
    $('.addToCartBtn').click(function(e){
        e.preventDefault();
        var qty = $(this).closest(".product-data").find(".input-qty").val();
        var pro_id = $(this).val();
        $.ajax({
            method: "POST",
            url: "cart/store",
            data: {
                "product_id":pro_id,
                "quantity_purchase": qty,

            }
        })
    })
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
