<!DOCTYPE html>
<html lang="en">
    <?php require('../config/autoload.php'); ?>

    <?php
    $dao = new DataAccess();
    ?>
<head>
   
    <style> 
    body {
    background-image: url('https://abmatic.ai/hubfs/Imported_Blog_Media/a%20testimonial%20with%20a%20person%20in%20front%20in%20flat%20illustration%20style%20with%20gradients%20and%20white%20background_compressed%2064aed785-6fd3-4e68-aa8b-cded135557db.jpg');
    background-repeat: no-repeat;
    background-size:1500px 700px;
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;}
.review-container {
            width: 100%;
            max-width: 400px;
            background-color:whitesmoke;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        .rating-stars {
            display: flex;
            justify-content: center;
            gap: 5px;
        }
        .rating-stars input {
            display: none;
        }
        .rating-stars label {
            font-size: 30px;
            color: #ccc;
            cursor: pointer;
        }
        .rating-stars input:checked ~ label,
        .rating-stars label:hover,
        .rating-stars label:hover ~ label {
            color: #4CAF50; /* Green color for selected stars */
        }
        .feedback-input {
            width: 100%;
            margin-top: 10px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            resize: none;
        }
        .submit-button {
            width: 100%;
            margin-top: 20px;
            padding: 12px;
            font-size: 18px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .submit-button:hover {
            background-color: #45a049;
        }
        .review-table {
            width: 100%;
            max-width: 400px;
            margin-top: 30px;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        .review-table th, .review-table td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
        .stars-display {
            color:yellow;
        }</style>
</head>

<body>


 
    <?php
include("dbcon.php"); // Include your database connection
	
// Handle the review submission
if (isset($_POST['submit_review'])) {
    $review = $_POST['review'];
    $semail = $_POST['semail'];
    $rating = $_POST['rating'];

    // Basic sanitation
    $review = htmlspecialchars($review);
    $semail = filter_var($semail, FILTER_SANITIZE_EMAIL);
    $rating = intval($rating); // Ensure rating is an integer

    // Prepared statement to insert the review
    $stmt = $conn->prepare("INSERT INTO reviews (review, semail, rating) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $review, $semail, $rating);
    
    if ($stmt->execute()) {
        echo "<script>alert('Review submitted successfully!');</script>";
    } else {
        echo "<script>alert('Error submitting review: " . $conn->error . "');</script>";
    }
    $stmt->close();
}

// Fetch reviews for display
$sql = "SELECT review, semail, rating FROM reviews";
$result = $conn->query($sql);
?>


    <div class="review-container">
    <h2><i>How was your learning,rate us</h2>
    <form method="POST" action="">
        <div class="rating-stars">
            <input type="radio" id="star1" name="rating" value="1" required>
            <label for="star1">★</label>
            <input type="radio" id="star2" name="rating" value="2">
            <label for="star2">★</label>
            <input type="radio" id="star3" name="rating" value="3">
            <label for="star3">★</label>
            <input type="radio" id="star4" name="rating" value="4">
            <label for="star4">★</label>
            <input type="radio" id="star5" name="rating" value="5">
            <label for="star5">★</label>
        </div>
        <textarea name="review" class="feedback-input" placeholder="Write your feedback (optional)"></textarea>
        <textarea name="email" class="feedback-input" placeholder="Enter your email id"></textarea>
        <button type="submit" name="submit_review" class="submit-button">Submit review</button>
    </form>
</div>