<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/cafe_management_system/assets/css/style.css">
    <title>Logging Out</title>
    
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            height: 100vh;
        }

        .loading-container {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .spinner {
            width: 50px;
            height: 50px;
            border: 5px solid rgba(0, 0, 0, 0.1);
            border-top-color: #4b2e0d;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin-bottom: 15px;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        h2 {
            color: #4b2e0d;
        }
    </style>

    <script>
        localStorage.removeItem("eatList");

        setTimeout(function() {
            window.location.href = "/cafe_management_system/index.php";
        }, 2000); 
    </script>
</head>
<body>
    <div class="loading-container">
        <div class="spinner"></div>
        <h2>Logging you out. Please wait...</h2>
    </div>
</body>
</html>
