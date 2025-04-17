<?php include("partial/session_check.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <title>Home</title>

    <link rel="stylesheet" href="/cafe_management_system/assets/css/style.css">

    <link rel="icon" href="assets/img/Logo.jpg" type="image/x-icon">

    <style>
        nav.sticky {
            background-color: rgb(234, 227, 224);
            position: fixed;
            box-shadow: 0px 0px 4px rgba(128, 128, 128, 0.358);
            transition: 0.6s;
            width: 100%;
            z-index: 999;
        }
        
    </style>
</head>

<body>
    <?php include 'partial/_dbconnect.php'; ?>
    <?php include 'partial/_nav.php'; ?>

    <div class="banner">
        <img src="/cafe_management_system/assets/img/indeximg.jpg" alt="Cafe Banner">
        <div class="text-overlay">
            <h1>Welcome to Our Café</h1>
            <p>Discover the finest blends, delicious treats, and the perfect atmosphere for coffee lovers.</p>
            <a href="#categories" class="btn">Explore Now</a>
        </div>
    </div>

    <div class="container" id="categories">
        <div class="center-container">
            All Categories
        </div>

        <div class="row">
            <?php
            $sql = "SELECT * FROM categories";

            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_array($result)) {
                $id = $row['category_id'];
                $cat = $row['category_name'];
                $desc = $row['category_desc'];
                $pic = $row['category_img'];

                echo '<div class="card">
                            <img src="/cafe_management_system/img/' . $pic . '" alt="' . $cat . '">
                            <div class="card-body">
                                <h5 class="card-title"><a href="view-food-list.php?catid=' . $id . '">' . $cat . '</a></h5>
                                <p class="card-text">' . substr($desc, 0, 30) . '...</p>
                                <a href="view-food-list.php?catid=' . $id . '" class="btn">View All</a>
                            </div>
                        </div>';
            }
            ?>
        </div>
    </div>

    <div class="video-section">
        <video autoplay muted loop playsinline>
            <source src="/cafe_management_system/assets/img/video.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    <!----------Team member section Start---------->

    <div class="container">
        <div class="textandimg-with-ring">
            <div class="rotate_ring">
                <img src="/cafe_management_system/assets/img/star-icon.png" />
            </div>
            <div class="heading-normal-txt">
                TEAM MEMBERS
            </div>
        </div>
        <div class="center-headings">
            Our Awesome Team
        </div>
        <div class="center-secondary-headings">
            Our team at the café is passionate about crafting delightful experiences, serving delicious flavors with warmth and care.
        </div>
        <div class="blocks-line-4grid">
            <div class="team_member_block1">
                <div class="team_member_block1_img">
                    <div class="teamimgdiv">
                        <img src="/cafe_management_system/assets/img/team1.jpg" class="teamimg">
                    </div>
                    <div class="team_member_logo">
                        <div class="round_logo">
                            <a href="http://www.facebook.com" target="_blank" rel="noopener noreferrer">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="logosvgimg">
                                    <path
                                        d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z" />
                                </svg>
                            </a>
                        </div>
                        <div class="round_logo">
                            <a href="http://www.twitter.com" target="_blank" rel="noopener noreferrer">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="logosvgimg">
                                    <path
                                        d="M459.4 151.7c.3 4.5 .3 9.1 .3 13.6 0 138.7-105.6 298.6-298.6 298.6-59.5 0-114.7-17.2-161.1-47.1 8.4 1 16.6 1.3 25.3 1.3 49.1 0 94.2-16.6 130.3-44.8-46.1-1-84.8-31.2-98.1-72.8 6.5 1 13 1.6 19.8 1.6 9.4 0 18.8-1.3 27.6-3.6-48.1-9.7-84.1-52-84.1-103v-1.3c14 7.8 30.2 12.7 47.4 13.3-28.3-18.8-46.8-51-46.8-87.4 0-19.5 5.2-37.4 14.3-53 51.7 63.7 129.3 105.3 216.4 109.8-1.6-7.8-2.6-15.9-2.6-24 0-57.8 46.8-104.9 104.9-104.9 30.2 0 57.5 12.7 76.7 33.1 23.7-4.5 46.5-13.3 66.6-25.3-7.8 24.4-24.4 44.8-46.1 57.8 21.1-2.3 41.6-8.1 60.4-16.2-14.3 20.8-32.2 39.3-52.6 54.3z" />
                                </svg>
                            </a>
                        </div>
                        <div class="round_logo">
                            <a href="http://www.instagram.com" target="_blank" rel="noopener noreferrer">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="logosvgimg">
                                    <path
                                        d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" />
                                </svg>
                            </a>
                        </div>
                        <div class="round_logo">
                            <a href="http://www.linkedin.com" target="_blank" rel="noopener noreferrer">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="logosvgimg">
                                    <path
                                        d="M100.3 448H7.4V148.9h92.9zM53.8 108.1C24.1 108.1 0 83.5 0 53.8a53.8 53.8 0 0 1 107.6 0c0 29.7-24.1 54.3-53.8 54.3zM447.9 448h-92.7V302.4c0-34.7-.7-79.2-48.3-79.2-48.3 0-55.7 37.7-55.7 76.7V448h-92.8V148.9h89.1v40.8h1.3c12.4-23.5 42.7-48.3 87.9-48.3 94 0 111.3 61.9 111.3 142.3V448z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="team_member_block1_img_title">
                    Merv Adrian
                </div>
                <div class="team_member_block1_img_subtext">
                    CEO & Founder
                </div>
            </div>
            <div class="team_member_block1">
                <div class="team_member_block1_img">
                    <div class="teamimgdiv">
                        <img src="/cafe_management_system/assets/img/team2.jpg" class="teamimg">
                    </div>
                    <div class="team_member_logo">
                        <div class="round_logo">
                            <a href="http://www.facebook.com" target="_blank" rel="noopener noreferrer">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="logosvgimg">
                                    <path
                                        d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z" />
                                </svg>
                            </a>
                        </div>
                        <div class="round_logo">
                            <a href="http://www.twitter.com" target="_blank" rel="noopener noreferrer">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="logosvgimg">
                                    <path
                                        d="M459.4 151.7c.3 4.5 .3 9.1 .3 13.6 0 138.7-105.6 298.6-298.6 298.6-59.5 0-114.7-17.2-161.1-47.1 8.4 1 16.6 1.3 25.3 1.3 49.1 0 94.2-16.6 130.3-44.8-46.1-1-84.8-31.2-98.1-72.8 6.5 1 13 1.6 19.8 1.6 9.4 0 18.8-1.3 27.6-3.6-48.1-9.7-84.1-52-84.1-103v-1.3c14 7.8 30.2 12.7 47.4 13.3-28.3-18.8-46.8-51-46.8-87.4 0-19.5 5.2-37.4 14.3-53 51.7 63.7 129.3 105.3 216.4 109.8-1.6-7.8-2.6-15.9-2.6-24 0-57.8 46.8-104.9 104.9-104.9 30.2 0 57.5 12.7 76.7 33.1 23.7-4.5 46.5-13.3 66.6-25.3-7.8 24.4-24.4 44.8-46.1 57.8 21.1-2.3 41.6-8.1 60.4-16.2-14.3 20.8-32.2 39.3-52.6 54.3z" />
                                </svg>
                            </a>
                        </div>
                        <div class="round_logo">
                            <a href="http://www.instagram.com" target="_blank" rel="noopener noreferrer">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="logosvgimg">
                                    <path
                                        d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" />
                                </svg>
                            </a>
                        </div>
                        <div class="round_logo">
                            <a href="http://www.linkedin.com" target="_blank" rel="noopener noreferrer">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="logosvgimg">
                                    <path
                                        d="M100.3 448H7.4V148.9h92.9zM53.8 108.1C24.1 108.1 0 83.5 0 53.8a53.8 53.8 0 0 1 107.6 0c0 29.7-24.1 54.3-53.8 54.3zM447.9 448h-92.7V302.4c0-34.7-.7-79.2-48.3-79.2-48.3 0-55.7 37.7-55.7 76.7V448h-92.8V148.9h89.1v40.8h1.3c12.4-23.5 42.7-48.3 87.9-48.3 94 0 111.3 61.9 111.3 142.3V448z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="team_member_block1_img_title">
                    Kirk Borne
                </div>
                <div class="team_member_block1_img_subtext">
                    Manager
                </div>
            </div>
            <div class="team_member_block1">
                <div class="team_member_block1_img">
                    <div class="teamimgdiv">
                        <img src="/cafe_management_system/assets/img/team3.jpg" class="teamimg">
                    </div>
                    <div class="team_member_logo">
                        <div class="round_logo">
                            <a href="http://www.facebook.com" target="_blank" rel="noopener noreferrer">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="logosvgimg">
                                    <path
                                        d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z" />
                                </svg>
                            </a>
                        </div>
                        <div class="round_logo">
                            <a href="http://www.twitter.com" target="_blank" rel="noopener noreferrer">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="logosvgimg">
                                    <path
                                        d="M459.4 151.7c.3 4.5 .3 9.1 .3 13.6 0 138.7-105.6 298.6-298.6 298.6-59.5 0-114.7-17.2-161.1-47.1 8.4 1 16.6 1.3 25.3 1.3 49.1 0 94.2-16.6 130.3-44.8-46.1-1-84.8-31.2-98.1-72.8 6.5 1 13 1.6 19.8 1.6 9.4 0 18.8-1.3 27.6-3.6-48.1-9.7-84.1-52-84.1-103v-1.3c14 7.8 30.2 12.7 47.4 13.3-28.3-18.8-46.8-51-46.8-87.4 0-19.5 5.2-37.4 14.3-53 51.7 63.7 129.3 105.3 216.4 109.8-1.6-7.8-2.6-15.9-2.6-24 0-57.8 46.8-104.9 104.9-104.9 30.2 0 57.5 12.7 76.7 33.1 23.7-4.5 46.5-13.3 66.6-25.3-7.8 24.4-24.4 44.8-46.1 57.8 21.1-2.3 41.6-8.1 60.4-16.2-14.3 20.8-32.2 39.3-52.6 54.3z" />
                                </svg>
                            </a>
                        </div>
                        <div class="round_logo">
                            <a href="http://www.instagram.com" target="_blank" rel="noopener noreferrer">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="logosvgimg">
                                    <path
                                        d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" />
                                </svg>
                            </a>
                        </div>
                        <div class="round_logo">
                            <a href="http://www.linkedin.com" target="_blank" rel="noopener noreferrer">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="logosvgimg">
                                    <path
                                        d="M100.3 448H7.4V148.9h92.9zM53.8 108.1C24.1 108.1 0 83.5 0 53.8a53.8 53.8 0 0 1 107.6 0c0 29.7-24.1 54.3-53.8 54.3zM447.9 448h-92.7V302.4c0-34.7-.7-79.2-48.3-79.2-48.3 0-55.7 37.7-55.7 76.7V448h-92.8V148.9h89.1v40.8h1.3c12.4-23.5 42.7-48.3 87.9-48.3 94 0 111.3 61.9 111.3 142.3V448z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="team_member_block1_img_title">
                    Carla Gentry
                </div>
                <div class="team_member_block1_img_subtext">
                    Head Chef
                </div>
            </div>
            <div class="team_member_block1">
                <div class="team_member_block1_img">
                    <div class="teamimgdiv">
                        <img src="/cafe_management_system/assets/img/team4.jpg" class="teamimg">
                    </div>
                    <div class="team_member_logo">
                        <div class="round_logo">
                            <a href="http://www.facebook.com" target="_blank" rel="noopener noreferrer">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="logosvgimg">
                                    <path
                                        d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z" />
                                </svg>
                            </a>
                        </div>
                        <div class="round_logo">
                            <a href="http://www.twitter.com" target="_blank" rel="noopener noreferrer">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="logosvgimg">
                                    <path
                                        d="M459.4 151.7c.3 4.5 .3 9.1 .3 13.6 0 138.7-105.6 298.6-298.6 298.6-59.5 0-114.7-17.2-161.1-47.1 8.4 1 16.6 1.3 25.3 1.3 49.1 0 94.2-16.6 130.3-44.8-46.1-1-84.8-31.2-98.1-72.8 6.5 1 13 1.6 19.8 1.6 9.4 0 18.8-1.3 27.6-3.6-48.1-9.7-84.1-52-84.1-103v-1.3c14 7.8 30.2 12.7 47.4 13.3-28.3-18.8-46.8-51-46.8-87.4 0-19.5 5.2-37.4 14.3-53 51.7 63.7 129.3 105.3 216.4 109.8-1.6-7.8-2.6-15.9-2.6-24 0-57.8 46.8-104.9 104.9-104.9 30.2 0 57.5 12.7 76.7 33.1 23.7-4.5 46.5-13.3 66.6-25.3-7.8 24.4-24.4 44.8-46.1 57.8 21.1-2.3 41.6-8.1 60.4-16.2-14.3 20.8-32.2 39.3-52.6 54.3z" />
                                </svg>
                            </a>
                        </div>
                        <div class="round_logo">
                            <a href="http://www.instagram.com" target="_blank" rel="noopener noreferrer">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="logosvgimg">
                                    <path
                                        d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" />
                                </svg>
                            </a>
                        </div>
                        <div class="round_logo">
                            <a href="http://www.linkedin.com" target="_blank" rel="noopener noreferrer">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="logosvgimg">
                                    <path
                                        d="M100.3 448H7.4V148.9h92.9zM53.8 108.1C24.1 108.1 0 83.5 0 53.8a53.8 53.8 0 0 1 107.6 0c0 29.7-24.1 54.3-53.8 54.3zM447.9 448h-92.7V302.4c0-34.7-.7-79.2-48.3-79.2-48.3 0-55.7 37.7-55.7 76.7V448h-92.8V148.9h89.1v40.8h1.3c12.4-23.5 42.7-48.3 87.9-48.3 94 0 111.3 61.9 111.3 142.3V448z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="team_member_block1_img_title">
                    Marie Curie
                </div>
                <div class="team_member_block1_img_subtext">
                    Support
                </div>
            </div>
        </div>
    </div>
    <!----------Team member section End---------->

    <div class="slider-cont">
        <div class="textandimg-with-ring">
            <div class="rotate_ring">
                <img src="/cafe_management_system/assets/img/star-icon.png" />
            </div>
            <div class="heading-normal-txt">
                VLOGS
            </div>
        </div>
        <div class="center-headings">
            Our Awesome Vlogs
        </div>
        <div class="center-secondary-headings">
            Explore our innovative cafe management system designed to streamline operations, enhance customer experience, and boost efficiency.
        </div>
        <div class="slider-container">
            <button class="arrow left" onclick="moveSlider('left')">←</button>
            <div class="slider">
                <iframe src="https://www.youtube.com/embed/bs9ap6wqNB4" title="Video 1" allowfullscreen></iframe>
                <iframe src="https://www.youtube.com/embed/vf6ZfimBtwQ" title="Video 2" allowfullscreen></iframe>
                <iframe src="https://www.youtube.com/embed/woZjRWsSOiw" title="Video 3" allowfullscreen></iframe>
                <iframe src="https://www.youtube.com/embed/_ed7wrFUx04" title="Video 4" allowfullscreen></iframe>
                <iframe src="https://www.youtube.com/embed/kJjIPfcuoks" title="Video 5" allowfullscreen></iframe>
                <iframe src="https://www.youtube.com/embed/ihJYJqY6P0k" title="Video 6" allowfullscreen></iframe>
                <iframe src="https://www.youtube.com/embed/lDbwjtUIz74" title="Video 7" allowfullscreen></iframe>
            </div>
            <button class="arrow right" onclick="moveSlider('right')">→</button>
        </div>
    </div>

    <div class="quality_assured">
        <div class="quality_container">
            <div class="textandimg-with-ring">
                <div class="rotate_ring">
                    <img src="/cafe_management_system/assets/img/star-icon.png" />
                </div>
                <div class="heading-normal-txt">
                    OUALITY
                </div>
            </div>
            <div class="center-headings">
                Quality Assured
            </div>
            <div class="center-secondary-headings">
                Ensuring every customer receives a consistent, high-quality experience through efficient order management, accurate billing, and a seamless service flow.            </div>
            <div class="blocks-line-3grid">
                <div class="quality_block1">
                    <div class="quality_block1_img">
                        <div class="teamimgdiv">
                            <img src="/cafe_management_system/assets/img/quality_1.jpg" class="teamimg"  style="border-radius: 50%;">
                        </div>
                    </div>
                    <div class="team_member_block1_img_title">
                        Finest Ingredients
                    </div>
                    <div class="team_member_block1_img_subtext">
                        Made from the finest quality ingredients, to give you an authentic taste, every single time.
                    </div>
                </div>
                <div class="quality_block1">
                    <div class="quality_block1_img">
                        <div class="teamimgdiv">
                            <img src="/cafe_management_system/assets/img/quality_2.jpg" class="teamimg"  style="border-radius: 50%;">
                        </div>
                    </div>
                    <div class="team_member_block1_img_title">
                        Fresh Items
                    </div>
                    <div class="team_member_block1_img_subtext">
                        Our items is mixed on demand, so that items served to you is always hot and fresh.
                    </div>
                </div>
                <div class="quality_block1">
                    <div class="quality_block1_img">
                        <div class="teamimgdiv">
                            <img src="/cafe_management_system/assets/img/quality_3.jpg" class="teamimg"  style="border-radius: 50%;">
                        </div>
                    </div>
                    <div class="team_member_block1_img_title">
                        Safety & Quality Standard
                    </div>
                    <div class="team_member_block1_img_subtext">
                        Our kitchens follow the highest safety and quality standards, which are fully compliant with fssai guidelines.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <button id="scrollBtn" onclick="scrollToTop()">⬆</button>

    <?php require 'partial/_footer.php'; ?>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>

    <script>
        const scrollButton = document.getElementById("scrollBtn");
        window.onscroll = function() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                scrollButton.style.display = "block";
            } else {
                scrollButton.style.display = "none";
            }
        };

        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        }

        const slider = document.querySelector('.slider');
        const sliderContainer = document.querySelector('.slider-container');
        let scrollPosition = 0;

        function moveSlider(direction) {
            const slideWidth = slider.children[0].offsetWidth + 10;
            const maxScroll = slider.scrollWidth - sliderContainer.offsetWidth;

            if (direction === 'right') {
                if (scrollPosition < maxScroll) {
                    scrollPosition = Math.min(scrollPosition + slideWidth, maxScroll);
                }
            } else if (direction === 'left') {
                if (scrollPosition > 0) {
                    scrollPosition = Math.max(scrollPosition - slideWidth, 0);
                }
            }

            slider.style.transform = `translateX(-${scrollPosition}px)`;
        }
    </script>
</body>

</html>