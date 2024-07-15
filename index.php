<!DOCTYPE html>
<html lang="en">
<?php require "includes/head.php"; ?>
<body>

    <?php require "includes/header.php"; ?> 
   
    <div class="slider_container">
        <figure>
            <img src="images/slider/slider1.jpg" alt="" srcset="">
            <img src="images/slider/slider2.jpg" alt="" srcset="">
            <img src="images/slider/slider3.jpg" alt="" srcset="">
            <img src="images/slider/slider4.jpg" alt="" srcset="">
            <img src="images/slider/slider1.jpg" alt="" srcset="">
        </figure>
    </div>


    <div class="slider_2_container">
        <div class="slider_items_wrapper">
            <div class="slider_items active">
                <img src="images/slider/slider1.jpg" alt="" srcset="">
                <p class="slider_caption">Slider 1</p>
            </div>

            <div class="slider_items">
                <img src="images/slider/slider2.jpg" alt="" srcset="">
                <p class="slider_caption">Slider 2</p>
            </div>

            <div class="slider_items">
                <img src="images/slider/slider3.jpg" alt="" srcset="">
                <p class="slider_caption">Slider 3</p>
            </div>

            <div class="slider_items">
                <img src="images/slider/slider4.jpg" alt="" srcset="">
                <p class="slider_caption">Slider 4</p>
            </div>
        </div>

        <!-- =========== Slider Control ============ -->
        <i class="left_slide_control"><</i>
        <i class="right_slide_control">></i>

    </div>

    
    <div class="homepage_container">
    
        <div class="product_container">
            <div class="products">
                <img src="images/products/ac.jpg" alt="" srcset="">
                <h4>Air Conditional</h4>
            </div>

            <div class="products">
                <img src="images/products/tv.jpg" alt="" srcset="">
                <h4>Smart Led Tv</h4>
            </div>

            <div class="products">
                <img src="images/products/stove.jpg" alt="" srcset="">
                <h4>An Electric Stove</h4>
            </div>

            <div class="products">
                <img src="images/products/microwave.jpg" alt="" srcset="">
                <h4>Microwave</h4>
            </div>
        </div>

        <div class="product_container">
           <div class="products">
                <img src="images/products/iron.jpg" alt="" srcset="">
                <h4>Electric Pressing Iron</h4>
            </div>
            
            <div class="products">
                <img src="images/products/gen.jpg" alt="" srcset="">
                <h4>A Generator</h4>
            </div>

            <div class="products">
                <img src="images/products/fridge.jpg" alt="" srcset="">
                <h4>A Fridge</h4>
            </div>

            <div class="products">
                <img src="images/products/fan.jpg" alt="" srcset="">
                <h4>A Ceiling Fan</h4>
            </div>
        </div>

        <div class="product_btn_wrapper">
            <a href="products.php">
                <button type="submit" class="product_btn">More Products >></button>
            </a>
        </div>

    </div>

   

    <?php require "includes/footer.php"; ?>

    <script src="javaScript/main.js"></script>
</body>
</html>