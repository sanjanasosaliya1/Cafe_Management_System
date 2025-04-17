<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="/cafe_management_system/assets/css/style.css">
</head>
<body>
   <!----------Footer section Start---------->
   <?php
        $sql = "SELECT * FROM site";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);

        $systemName = $row['system_name'];
        $address = $row['address'];
        $email = $row['email'];
        $contact = $row['contact'];
    ?>

    <div class="section12">
        <div class="footerdiv">
            <div class="footermapimg">
                <div class="footerimgmap">
                    <img src="assets/img/footer-map.png" class="map_img">
                </div>
            </div>
            <div class="footerflex">
                <div class="tarn_logo_footer">
                    <div class="highlighted_title" style="text-align: center;">
                        <?php echo $systemName;?>
                    </div>

                    <div class="tarn-logo">
                        <a href="index.php">
                            <img src="/cafe_management_system/assets/img/logo2.jpg" />
                        </a>
                    </div>
                    <div class="tarn_logo_details">      
                        Our Cafe simplifies orders, billing, and inventory for efficient service.
                    </div>
                    
                </div>
                <div class="explore">
                    <div class="highlighted_title">
                        Explore
                    </div>
                    <div class="link_details"><a href="index.php">Home</a></div>
                    <div class="link_details"><a href="about.php">About Us</a></div>
                    <div class="link_details"><a href="viewOrder.php">Your Orders</a></div>
                    <div class="link_details"><a href="contact.php">Contact</a></div>
                    <div class="link_details"><a href="searchItems.php">Search Item</a></div>

                </div>
                
                <div class="addresses">
                    <div class="highlighted_title">
                        Address
                    </div>
                    <div class="logoaddress">
                        <div class="addlogimg">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="addressimg">
                                <path
                                    d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z" />
                            </svg>
                        </div>
                        <div class="link_details_"><?php echo $address;?></div>
                    </div>
                    <div class="logoaddress">
                        <div class="addlogimg">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="addressimg">
                                <path
                                    d="M280 0C408.1 0 512 103.9 512 232c0 13.3-10.7 24-24 24s-24-10.7-24-24c0-101.6-82.4-184-184-184c-13.3 0-24-10.7-24-24s10.7-24 24-24zm8 192a32 32 0 1 1 0 64 32 32 0 1 1 0-64zm-32-72c0-13.3 10.7-24 24-24c75.1 0 136 60.9 136 136c0 13.3-10.7 24-24 24s-24-10.7-24-24c0-48.6-39.4-88-88-88c-13.3 0-24-10.7-24-24zM117.5 1.4c19.4-5.3 39.7 4.6 47.4 23.2l40 96c6.8 16.3 2.1 35.2-11.6 46.3L144 207.3c33.3 70.4 90.3 127.4 160.7 160.7L345 318.7c11.2-13.7 30-18.4 46.3-11.6l96 40c18.6 7.7 28.5 28 23.2 47.4l-24 88C481.8 499.9 466 512 448 512C200.6 512 0 311.4 0 64C0 46 12.1 30.2 29.5 25.4l88-24z" />
                            </svg>
                        </div>
                        <div class="link_details_hover"><?php echo $contact;?></div>
                    </div>
                    <div class="logoaddress">
                        <div class="addlogimg">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="addressimg">
                                <path
                                    d="M64 112c-8.8 0-16 7.2-16 16v22.1L220.5 291.7c20.7 17 50.4 17 71.1 0L464 150.1V128c0-8.8-7.2-16-16-16H64zM48 212.2V384c0 8.8 7.2 16 16 16H448c8.8 0 16-7.2 16-16V212.2L322 328.8c-38.4 31.5-93.7 31.5-132 0L48 212.2zM0 128C0 92.7 28.7 64 64 64H448c35.3 0 64 28.7 64 64V384c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V128z" />
                            </svg>
                        </div>
                        <div class="link_details_hover"><?php echo $email;?></div>
                    </div>

                    <div class="footer_logo">
                        <div class="square_logo">
                            <a href="http://www.facebook.com" target="_blank" rel="noopener noreferrer">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="logosvg">
                                    <path
                                        d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z" />
                                </svg>
                            </a>
                        </div>
                        <div class="square_logo">
                            <a href="http://www.twitter.com" target="_blank" rel="noopener noreferrer">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="logosvg">
                                    <path
                                        d="M459.4 151.7c.3 4.5 .3 9.1 .3 13.6 0 138.7-105.6 298.6-298.6 298.6-59.5 0-114.7-17.2-161.1-47.1 8.4 1 16.6 1.3 25.3 1.3 49.1 0 94.2-16.6 130.3-44.8-46.1-1-84.8-31.2-98.1-72.8 6.5 1 13 1.6 19.8 1.6 9.4 0 18.8-1.3 27.6-3.6-48.1-9.7-84.1-52-84.1-103v-1.3c14 7.8 30.2 12.7 47.4 13.3-28.3-18.8-46.8-51-46.8-87.4 0-19.5 5.2-37.4 14.3-53 51.7 63.7 129.3 105.3 216.4 109.8-1.6-7.8-2.6-15.9-2.6-24 0-57.8 46.8-104.9 104.9-104.9 30.2 0 57.5 12.7 76.7 33.1 23.7-4.5 46.5-13.3 66.6-25.3-7.8 24.4-24.4 44.8-46.1 57.8 21.1-2.3 41.6-8.1 60.4-16.2-14.3 20.8-32.2 39.3-52.6 54.3z" />
                                </svg>
                            </a>
                        </div>
                        <div class="square_logo">
                            <a href="http://www.instagram.com" target="_blank" rel="noopener noreferrer">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="logosvg">
                                    <path
                                        d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" />
                                </svg>
                            </a>
                        </div>
                        <div class="square_logo">
                            <a href="http://www.linkedin.com" target="_blank" rel="noopener noreferrer">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="logosvg">
                                    <path
                                        d="M100.3 448H7.4V148.9h92.9zM53.8 108.1C24.1 108.1 0 83.5 0 53.8a53.8 53.8 0 0 1 107.6 0c0 29.7-24.1 54.3-53.8 54.3zM447.9 448h-92.7V302.4c0-34.7-.7-79.2-48.3-79.2-48.3 0-55.7 37.7-55.7 76.7V448h-92.8V148.9h89.1v40.8h1.3c12.4-23.5 42.7-48.3 87.9-48.3 94 0 111.3 61.9 111.3 142.3V448z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="map">
                 <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4274.364678592217!2d72.78421690276834!3d21.15801559707634!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04df184811243%3A0x7d3bbfaeb9dd9862!2sJ.P.Dawar%20Institute%20Of%20Technology%2C%20Sardar%20Vallabhbhai%20Nat&#39;l%20Inst%20of%20Technology%20Rd%2C%20SVNIT%20Campus%2C%20Athwa%2C%20Surat%2C%20Gujarat%20395007!5e0!3m2!1sen!2sin!4v1739549227815!5m2!1sen!2sin" width="300" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>                </div>
                </div>
        </div> 
        <div class="footer container-fluid text-light" style="padding: 10px;">
            <p class="py-2 mb-0"><center style="color: #4b2e0d;">Copyright © 2025 Designed by <a href="#" style="color: black;">@SilentZone</a></center></p>
        </div>
    </div>
    
    <!----------Footer section End---------->    
</body>
</html>
