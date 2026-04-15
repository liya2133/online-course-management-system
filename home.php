

	



<?php require('../config/autoload.php'); ?>
<?php
$dao=new DataAccess();



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDUCAZONE - Online Course Academy</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            text-align: center;
            background-color: white;
        }
        header {
            background-color: white;
            width: 100%;
            max-height: 950px;
            object-fit: cover;
            
        }
        .banner {
            width: 100%;
            max-height: 950px;
            object-fit: cover;
        }
        .content {
            padding: 20px;
        }
        .button {
            background-color: #008CBA;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
            display: inline-block;
        }
        footer {
            margin-top: 20px;
            padding: 10px;
            background-color: #333;
            color: white;
        }
        {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
 
        .container {
            max-width: 800px;
            padding: 20px;
            color: #fff;
            border-radius: 8px;
            text-align: center;
            margin-bottom: 20px;
        }
        h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
            color: black;
        }
        h1 span {
            color: #f76c6c;
            font-weight: bold;
        }
        p {
            font-size: 1.1rem;
            margin: 10px 0 20px;
            align-items: center;
            justify-content: center;
            color: black;
        }
        .search-container {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        input[type="text"] {
            padding: 10px;
            font-size: 1rem;
            width: 60%;
            border: none;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }
        button {
            padding: 10px 20px;
            font-size: 1rem;
            color: #fff;
            background-color: #f76c6c;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }
        button:hover {
            background-color: #e65c5c;
        }
        .logo {
            margin-top: 20px;
        }
        /* Customer Reviews Section */
        .reviews-container {
            max-width: 800px;
            padding: 20px;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 8px;
            color: #333;
            margin-top: 20px;
            text-align: left;
        }
        .review {
            margin-bottom: 15px;
        }
        .review h3 {
            font-size: 1.2rem;
            color: #f76c6c;
            margin-bottom: 5px;
        }
        .review p {
            font-size: 1rem;
            color: #666;
        }
        .review span {
            font-size: 0.9rem;
            color: #999;
        }
        /* Responsive styling */
        @media (max-width: 600px) {
            h1 {
                font-size: 2rem;
            }
            input[type="text"], button {
                width: 100%;
            }
        }
        .results-container {
            max-width: 800px;
            padding: 20px;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 8px;
            color: #333;
            margin-top: 20px;
            text-align: left;
        }
        .course-item {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        .course-item:last-child {
            border-bottom: none;
        }
        .course-title {
            font-weight: bold;
            font-size: 1.2rem;
            color: #333;
        }
        .course-description {
            font-size: 1rem;
            color: #666;
        }
   
    </style>
</head>
<body>
    <header>
        <h1>Welcome to EDUCAZONE</h1>
        <p>Your gateway to online learning and skill development,anytime anywhere</p>
        <a href="registration1.php" class="button">Get Started</a> <!-- Link to main page -->
    </header>
    <img src="https://www.shutterstock.com/shutterstock/photos/1968636727/display_1500/stock-vector-communication-meeting-online-class-dialog-conversation-on-an-online-forum-and-internet-chatting-1968636727.jpg"alt="EDUCAZONE Academy" class="banner"> <!-- Replace with your banner image -->

    <div class="content">
        <h2>Start Your Learning Journey Today!</h2>
        <p>Join us for a transformative learning experience that empowers you with the skills you need to succeed.</p>
        <p>Explore a variety of courses designed to enhance your knowledge and career opportunities.</p>
    </div>

</head>
<body>
    <div class="container">
        <h1>Bring your <span>goals</span> into <span>focus</span></h1>
        <p>EDUCAZONE offers online courses and programs that prepare you for every career moment</p>

        <form action="courses.php" method="POST" class="search-container">
            <input type="text" name="search" placeholder="Search our courses">
            <button type="submit">Search</button>
        </form>
        
    <!-- Customer Reviews Section -->
    <div class="reviews-container">
        <h2>What Our Students Say</h2>
        <img src="student1.jpg" alt="">
        <div class="review">
            <h3>MARIA GRAZIA PALATTY</h3>
            <p>"EDUCAZONE's courses have been instrumental in helping me advance my career. The content is clear, engaging, and directly applicable to my work."</p>
            <span>⭐⭐⭐⭐⭐</span>
        </div>
        <img src="C:\wamp64\www\project\user\liya.png" alt="">
        <div class="review">
            <h3>LIYA SEBASTIAN</h3>
            <p>"The flexible schedule and variety of topics make EDUCAZONE a perfect fit for anyone looking to upskill. Highly recommend!"</p>
            <span>⭐⭐⭐⭐⭐</span>
        </div>
        <img src="alan.png" alt="">
        <div class="review">
            <h3>ALAN S ALUKKA</h3>
            <p>"I love the community and support provided by EDUCAZONE. The mentors are knowledgeable and always willing to help."</p>
            <span>⭐⭐⭐⭐⭐</span>
        </div>
    </div>
</body>
</html>

</body>
</html>