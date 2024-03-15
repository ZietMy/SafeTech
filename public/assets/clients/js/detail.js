//
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
$(document).ready(function () {
    $(document).on("click", ".qty-btn-plus", function () {
        var $input = $(this).siblings(".input-qty");
        var newValue = parseInt($input.val()) + 1;
        $input.val(newValue);
    });

    $(document).on("click", ".qty-btn-minus", function () {
        var $input = $(this).siblings(".input-qty");
        var newValue = parseInt($input.val()) - 1;
        if (newValue >= 0) {
            $input.val(newValue);
        }
    });
});
