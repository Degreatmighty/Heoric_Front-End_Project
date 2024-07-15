document.addEventListener("DOMContentLoaded", function() {
    var slides = document.querySelector('.slider_items_wrapper').children;
    var prevSlide = document.querySelector('.left_slide_control');
    var nextSlide = document.querySelector('.right_slide_control');
    var totalSlide = slides.length;
    var index = 0;

    nextSlide.onclick = function () {
        next("next");
    }

    prevSlide.onclick = function () {
        next("prev");
    }

    function next(direction) {
        if (direction == "next") {
            index++;
            if (index == totalSlide) {
                index = 0;
            }
        } else {
            if (index == 0) {
                index = totalSlide - 1;       
            } else {
                index--;
            }
        }

        for (var i = 0; i < totalSlide; i++) {
            slides[i].classList.remove("active");
        }
        slides[index].classList.add("active");
    }

    // =============== EVENT FOR MENU BAR =========

    var hamburger_menu = document.getElementById("hamburger_menu_icon");

    if (hamburger_menu) {
        hamburger_menu.addEventListener("click", function() {
            var menu_items = document.getElementById("media_menu");
            if (menu_items) {
                menu_items.classList.toggle("display");
            }
        });
    }
});
