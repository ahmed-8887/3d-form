<?php
session_start();

// Check if the user is actually logged in
if (!isset($_SESSION['user_email'])) {
    // If not logged in, redirect them back to the login page
    header("Location: login2.html");
    exit();
}

$userEmail = $_SESSION['user_email'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Welcome</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;800&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Outfit', sans-serif;
        }

        body {
            background: #0f172a;
            color: #ffffff;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
        }

        /* Nav Bar */
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 50px;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, #3b82f6, #ec4899);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .logout-btn {
            padding: 10px 20px;
            background: rgba(236, 72, 153, 0.2);
            border: 1px solid #ec4899;
            color: #ec4899;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: 0.3s;
        }

        .logout-btn:hover {
            background: #ec4899;
            color: white;
            box-shadow: 0 0 15px rgba(236, 72, 153, 0.5);
        }

        /* Main Content area */
        .hero {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 50px;
            position: relative;
        }

        .hero h1 {
            font-size: 4rem;
            font-weight: 800;
            margin-bottom: 20px;
            z-index: 10;
            text-shadow: 0 10px 20px rgba(0,0,0,0.5);
        }

        .hero p {
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.7);
            max-width: 600px;
            z-index: 10;
            margin-bottom: 40px;
        }

        /* 3D Glass Dashboard Cards */
        .card-container {
            display: flex;
            gap: 30px;
            z-index: 10;
        }

        .dashboard-card {
            width: 250px;
            height: 150px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 16px;
            backdrop-filter: blur(20px);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            transition: 0.3s;
            cursor: pointer;
            box-shadow: 0 15px 25px rgba(0,0,0,0.2);
        }

        .dashboard-card:hover {
            transform: translateY(-10px);
            background: rgba(255, 255, 255, 0.1);
            border-color: rgba(59, 130, 246, 0.5);
            box-shadow: 0 20px 30px rgba(59, 130, 246, 0.2);
        }

        .card-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: #3b82f6;
            margin-bottom: 10px;
        }

        .card-value {
            font-size: 2rem;
            font-weight: 800;
        }

        /* Background floating shapes */
        .shape {
            position: absolute;
            filter: blur(100px);
            z-index: 0;
            border-radius: 50%;
        }

        .shape-1 {
            width: 400px;
            height: 400px;
            background: #3b82f6;
            top: 10%;
            left: -10%;
            animation: float 8s infinite alternate;
        }

        .shape-2 {
            width: 300px;
            height: 300px;
            background: #8b5cf6;
            bottom: -10%;
            right: 10%;
            animation: float 10s infinite alternate-reverse;
        }

        @keyframes float {
            0% { transform: translateY(0) scale(1); }
            100% { transform: translateY(-50px) scale(1.2); }
        }
    </style>
</head>
<body>
    <div class="shape shape-1"></div>
    <div class="shape shape-2"></div>

    <nav>
        <div class="logo">MyApp 3D</div>
        <a href="logout.php" class="logout-btn">Log Out</a>
    </nav>

    <div class="hero">
        <h1>Welcome Back, <br> <span style="color: #3b82f6;"><?php echo htmlspecialchars(explode('@', $userEmail)[0]); ?>!</span></h1>
        <p>You have successfully logged into the secure system. Here is your personalized dashboard with live data.</p>

        <div class="card-container">
            <div class="dashboard-card">
                <div class="card-title">Profile Status</div>
                <div class="card-value">Active</div>
            </div>
            <div class="dashboard-card">
                <div class="card-title">Messages</div>
                <div class="card-value">14</div>
            </div>
            <div class="dashboard-card">
                <div class="card-title">Total Views</div>
                <div class="card-value">8,042</div>
            </div>
        </div>
    </div>
</body>
</html>
