<?php include("partial/session_check.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Search Coffee</title>
    <link rel="icon" href="assets/img/Logo.jpg" type="image/x-icon">

    <link rel="stylesheet" href="/cafe_management_system/assets/css/style.css">
</head>

<body>
    <?php 
        include("partial/_dbconnect.php");
        include("partial/_nav.php");
    ?>

    <div class="search-container">
        <h1 style="text-align: center;">Search for items</h1>
        <form class="form-inline" id="searchForm">
            <div class="input-group">
                <input type="search" class="form-control" id="searchInput" name="search" placeholder="Search here..." style="width: 600px;">
                <div class="input-group-append">
                    <span class="input-group-text1">
                        <i class="fas fa-search"></i>
                    </span>
                </div>
            </div>
        </form>
    </div>

    <div class="container2 my-4">
        <div class="row" id="searchResults">
            <p class="alert alert-info">Please enter a Food name to search.</p>
        </div>
    </div>

    <?php
        require("partial/_footer.php");
    ?>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#searchInput').keyup(function () {
                const searchQuery = $(this).val().trim();
                if (searchQuery) {
                    $.ajax({
                        url: 'search.php',
                        type: 'GET',
                        data: { search: searchQuery, submitSearch: true },
                        success: function (response) {
                            $('#searchResults').html(response);
                        },
                        error: function () {
                            $('#searchResults').html('<p class="alert alert-danger">An error occurred while fetching results.</p>');
                        }
                    });
                } else {
                    $('#searchResults').html('<p class="alert alert-info">Please enter a Food name to search.</p>');
                }
            });
        });
    </script>
</body>

</html>