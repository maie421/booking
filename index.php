<?php

require_once "common/header.php";
?>
    <head>
        <link rel="stylesheet" type="text/css" href="./common/css/card.css">
        <link rel="stylesheet" type="text/css" href="./common/css/star.css">
    </head>
    <body>
    <div class="d-flex justify-content-center">
        <ul class="nav nav-tabs align-self-center">
            <li class="nav-item">
                <a class="nav-link active" href="#">모텔</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">호텔</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">펜션</a>
            </li>
        </ul>
    </div>


    <section class="main-content">
        <div class="container">
            <div class="row">
                <?php
                for ($i = 0; $i < 10; $i++) { ?>
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="food-card">
                            <div class="food-card_img">
                                <img src="https://a0.muscache.com/im/pictures/prohost-api/Hosting-607458038229062130/original/1e20dfc7-ea12-44b2-a837-2bdcd8502133.jpeg?im_w=720"
                                     alt="">
                                <a href="#"><i class="bi bi-heart" style="color:red"></i></a>
                                <!--                            <a href="#" ><i class="bi bi-suit-heart-fill" style="color:red"></i></i></a>-->
                            </div>
                            <div class="food-card_content">
                                <div class="food-card_title-section">
                                    <a href="#!" class="food-card_title">해운대</a>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-half"></i>
                                    <i class="bi bi-star"></i>
                                    <span">3.5 (3,000)</span>
                                </div>
                                <div class="food-card_bottom-section">
                                    <div class="space-between">
                                        <div>
                                            <span class="fa fa-fire"></span> 판매가 30.000
                                        </div>
                                        <div class="pull-right">
                                            <span class="badge badge-success">Veg</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                } ?>
            </div>
        </div>
    </section>
    </body>
<?php
require_once "common/footer.php";
?>