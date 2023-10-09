(function ($) {
    "use strict";

    var fullHeight = function () {
        $(".js-fullheight").css("height", $(window).height());
        $(window).resize(function () {
            $(".js-fullheight").css("height", $(window).height());
        });
    };
    fullHeight();

    var owl = $(".featured-carousel");

    $(".featured-carousel").owlCarousel({
        animateOut: "fadeOut",
        center: false,
        items: 1,
        loop: true,
        stagePadding: 0,
        margin: 0,
        smartSpeed: 1500,
        autoplay: false,
        dots: false,
        nav: false,
        navText: [
            '<span class="icon-keyboard_arrow_left">',
            '<span class="icon-keyboard_arrow_right">',
        ],
    });

    $(".thumbnail li").each(function (slide_index) {
        $(this).click(function (e) {
            owl.trigger("to.owl.carousel", [slide_index, 1500]);
            e.preventDefault();
        });
    });

    owl.on("changed.owl.carousel", function (event) {
        $(".thumbnail li").removeClass("active");
        $(".thumbnail li")
            .eq(event.item.index - 2)
            .addClass("active");
    });
})(jQuery);

// JS Functions

const colorSwatches = document.querySelectorAll(".color-swatch");
let selectedSwatch = null;

colorSwatches.forEach((swatch) => {
    swatch.addEventListener("click", () => {
        if (selectedSwatch) {
            // Hide the checkmark icon on the previously selected swatch
            const prevCheckmarkIcon =
                selectedSwatch.querySelector(".checkmark-icon");
            prevCheckmarkIcon.style.display = "none";
        }

        // Remove 'selected' class from all swatches
        colorSwatches.forEach((sw) => {
            sw.classList.remove("selected");
        });

        // Add 'selected' class to the clicked swatch
        swatch.classList.add("selected");

        // Show the checkmark icon in the selected swatch
        const checkmarkIcon = swatch.querySelector(".checkmark-icon");
        checkmarkIcon.style.display = "inline-block";

        // Update the selected swatch
        selectedSwatch = swatch;
    });
});
