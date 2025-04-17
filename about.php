<?php include("partial/session_check.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <title>About Us</title>
    <link rel = "icon" href ="assets/img/Logo.jpg" type = "image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <link rel="stylesheet" href="/cafe_management_system/assets/css/style.css">
</head>
<body>
    <?php
        include("partial/_dbconnect.php");
        include("partial/_nav.php");

        $sql = "SELECT COUNT(*) AS total_items FROM food_type";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $total_items = $row['total_items'];
    
    ?>

    <section id="hero">
        <div class="hero-container">
        <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">
            <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
            <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <div class="carousel-background"><img src="assets/img/slide-1.jpg" alt=""></div>
                <div class="carousel-container">
                <div class="carousel-content">
                    <h2 class="animate_animated animate_fadeInDown">Welcome to <span>CAFE HOUSE</span></h2>
                    <a href="index.php" class="btn-get-started animate_animated animate_fadeInUp scrollto">Get Started</a>
                </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="carousel-background"><img src="assets/img/slide-2.jpg" alt=""></div>
                <div class="carousel-container">
                <div class="carousel-content">
                    <h2 class="animate_animated animate_fadeInDown mb-0">Our Mission</h2>
                    <p class="animate_animated animate_fadeInUp">To be number one CAFE HOUSE</p>
                    <a href="index.php" class="btn-get-started animate_animated animate_fadeInUp scrollto">Get Started</a>
                </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="carousel-background"><img src="assets/img/slide-3.jpg" alt=""></div>
                <div class="carousel-container">
                <div class="carousel-content">
                    <h2 class="animate_animated animate_fadeInDown mb-0">Our Mission</h2>
                    <p class="animate_animated animate_fadeInUp">To be number one in providing exceptional food, drinks, and service, creating memorable experiences for every guest.</p>
                    <a href="index.php" class="btn-get-started animate_animated animate_fadeInUp scrollto">Get Started</a>
                </div>
                </div>
            </div>
            </div>

            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon icofont-thin-double-left" aria-hidden="true" style="font-size: 30px;"></span>
            <span class="carousel-control-prev-icon icofont-thin-double-left" aria-hidden="true" style="font-size: 30px;"></span>
            </a>

            <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon icofont-thin-double-right" aria-hidden="true" style="font-size: 30px;"></span>
            <span class="carousel-control-next-icon icofont-thin-double-right" aria-hidden="true" style="font-size: 30px;"></span>
            </a>

        </div>
        </div>
    </section>

    <main id="main">
        <section class="about" id="about">
            <div class="container4">
                <div class="section-title">
                    <h2>About Us</h2>
                </div>

                <div class="row4">
                    <div class="col-lg-6">
                        <h3>Welcome to <strong>CAFE WORLD</strong></h3>
                        <h3><strong>The Worldwide Leader in Food Delivery</strong></h3>
                    </div>

                    <div class="col-lg-6 pt-4 pt-lg-0 content">
                        <div class="skills-content">
                            <p><b>Rating: </b></p>
                            <div class="progress">
                                <span class="skill">5 Star <i class="val">93%</i></span>
                                <div class="progress-bar-wrap">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="93" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>

                            <div class="progress">
                                <span class="skill">4 Star <i class="val">90%</i></span>
                                <div class="progress-bar-wrap">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>

                            <div class="progress">
                                <span class="skill">3 Star <i class="val">30%</i></span>
                                <div class="progress-bar-wrap">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>

                            <div class="progress">
                                <span class="skill">2 Star <i class="val">5%</i></span>
                                <div class="progress-bar-wrap">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>

                            <div class="progress">
                                <span class="skill">1 Star <i class="val">0%</i></span>
                                <div class="progress-bar-wrap">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="counts section-bg" id="section1">
            <div class="container4">
                <div class="row4 no-gutters">
                    
                    <div class="col-lg-3 col-mb-6 d-md-flex align-items-md-stretch">
                        <div class="count-box">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg_logo">
                            <path d="M464 256A208 208 0 1 0 48 256a208 208 0 1 0 416 0zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm177.6 62.1C192.8 334.5 218.8 352 256 352s63.2-17.5 78.4-33.9c9-9.7 24.2-10.4 33.9-1.4s10.4 24.2 1.4 33.9c-22 23.8-60 49.4-113.6 49.4s-91.7-25.5-113.6-49.4c-9-9.7-8.4-24.9 1.4-33.9s24.9-8.4 33.9 1.4zM144.4 208a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zm192-32a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/></svg>                            
                             <span data-ceil="232" class="numbers">232</span>
                            <p><strong>Happy Customers</strong></p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-mb-6 d-md-flex align-items-md-stretch">
                        <div class="count-box">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg_logo">
                                <path d="M0 96C0 60.7 28.7 32 64 32l132.1 0c19.1 0 37.4 7.6 50.9 21.1L289.9 96 448 96c35.3 0 64 28.7 64 64l0 256c0 35.3-28.7 64-64 64L64 480c-35.3 0-64-28.7-64-64L0 96zM64 80c-8.8 0-16 7.2-16 16l0 320c0 8.8 7.2 16 16 16l384 0c8.8 0 16-7.2 16-16l0-256c0-8.8-7.2-16-16-16l-161.4 0c-10.6 0-20.8-4.2-28.3-11.7L213.1 87c-4.5-4.5-10.6-7-17-7L64 80z"/>
                            </svg>
                            <span data-ceil="<?php echo $total_items; ?>" class="numbers"><?php echo $total_items; ?></span>
                            <p><strong>Items</strong></p>
                        </div>
                    </div>


                    <div class="col-lg-3 col-mb-6 d-md-flex align-items-md-stretch">
                        <div class="count-box">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg_logo">
                            <path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/></svg>                            
                            <span data-ceil="1463" class="numbers">1,463</span>
                            <p><strong>Hours Of Support</strong></p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-mb-6 d-md-flex align-items-md-stretch">
                        <div class="count-box">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg_logo">
                        <path d="M96 128l0-57.8c0-13.3 8.3-25.3 20.8-30l96-36c7.2-2.7 15.2-2.7 22.5 0l96 36c12.5 4.7 20.8 16.6 20.8 30l0 57.8-.3 0c.2 2.6 .3 5.3 .3 8l0 40c0 70.7-57.3 128-128 128s-128-57.3-128-128l0-40c0-2.7 .1-5.4 .3-8l-.3 0zm48 48c0 44.2 35.8 80 80 80s80-35.8 80-80l0-16-160 0 0 16zM111.9 327.7c10.5-3.4 21.8 .4 29.4 8.5l71 75.5c6.3 6.7 17 6.7 23.3 0l71-75.5c7.6-8.1 18.9-11.9 29.4-8.5C401 348.6 448 409.4 448 481.3c0 17-13.8 30.7-30.7 30.7L30.7 512C13.8 512 0 498.2 0 481.3c0-71.9 47-132.7 111.9-153.6zM208 48l0 16-16 0c-4.4 0-8 3.6-8 8l0 16c0 4.4 3.6 8 8 8l16 0 0 16c0 4.4 3.6 8 8 8l16 0c4.4 0 8-3.6 8-8l0-16 16 0c4.4 0 8-3.6 8-8l0-16c0-4.4-3.6-8-8-8l-16 0 0-16c0-4.4-3.6-8-8-8l-16 0c-4.4 0-8 3.6-8 8z"/></svg>
                            <span data-ceil="15" class="numbers">15</span>
                            <p><strong>Hard Workers</strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="quality-certification">
            <div class="container">
                <div class="section-title">
                    <h2>Quality Certification</h2>
                </div>
                <div class="row">
                    <div class="col-lg-6" style="font-size: 18px;">
                        <p>At CAFE WORLD, we take pride in offering high-quality food and beverages. We adhere to the highest standards of quality control to ensure that every item served meets our customers' expectations. Our commitment to quality is backed by various certifications, which validate our dedication to providing the best experience for you. Our certification includes food safety certifications, industry-standard hygiene practices, and compliance with health and safety regulations.</p>
                        <p><strong>We are certified by:</strong></p>
                        <ul>
                            <li>ISO 9001:2015 - Quality Management System</li>
                            <li>ISO 22000:2005 - Food Safety Management</li>
                            <li>Local Health and Safety Certification</li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <img src="/cafe_management_system/assets/img/about_quality.jpg" alt="Quality Certification" class="img-fluid">
                    </div>
                </div>
            </div>
        </section>

        <section class="why-choose-us">
            <div class="container">
                <div class="section-title">
                    <h2>Why Choose Us?</h2>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <h3>We Provide Unmatched Quality and Service</h3>
                        <p>At CAFE WORLD, we are committed to providing the highest quality food and exceptional service. Our experienced chefs use only the freshest ingredients to create mouthwatering dishes that you will love. We believe that food should not only taste amazing but also be made with care and attention to detail.</p>
                        <p>Here are a few reasons why you should choose us:</p>
                        <ul>
                            <li><strong>Fresh Ingredients:</strong> We source only the finest ingredients to ensure our food is always fresh and delicious.</li>
                            <li><strong>Experienced Chefs:</strong> Our team of skilled chefs bring years of expertise in crafting both traditional and innovative dishes.</li>
                            <li><strong>Customer-Centric Approach:</strong> Your satisfaction is our top priority. We go the extra mile to ensure every visit is a delightful experience.</li>
                            <li><strong>Wide Variety:</strong> From hearty meals to light bites, we offer a broad menu with options for all tastes and preferences.</li>
                            <li><strong>Affordable Prices:</strong> We believe in offering high-quality food without breaking the bank. Enjoy a great meal at reasonable prices.</li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <img src="/cafe_management_system/assets/img/choose_us.jpg" alt="Why Choose Us" class="img-fluid">
                    </div>
                </div>
            </div>
        </section>

</section>

    </main>

    <?php
        include("partial/_footer.php");
    ?>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>         
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
</body>
</html>