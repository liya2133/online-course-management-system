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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer Reviews</title>
    <style>
   
   body {
    background-image: url('https://c8.alamy.com/comp/2C587JX/customer-review-form-to-leave-comment-and-rate-a-service-or-goods-2C587JX.jpg');
    background-repeat: no-repeat;
    background-size:1600px 900px;
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}
        .review-container {
            width: 100%;
            max-width: 400px;
            background-color: #fff;
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
            color: #4CAF50;
        }
    </style>
</head>
<body>



<div class="review-table-container">
    <h1><i>Customer Reviews</i></h1>
    <table class="review-table">
        <tr>
            <th>Review</th>
            <th>Rating</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $stars = str_repeat('★', $row['rating']) . str_repeat('☆', 5 - $row['rating']);
                echo "<tr>
                        <td>" . htmlspecialchars($row['review']) . "</td>
                        <td class='stars-display'>" . $stars . "</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='2'>No reviews found.</td></tr>";
        }
        ?>
    </table>
</div>

<?php
// Close the database connection
$conn->close();
?>
</body>
</html>
