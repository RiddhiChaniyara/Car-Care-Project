<?php
// Database connection
$host = "localhost";
$dbname = "car care";  // Ensure your database name is correct
$username = "root";  // Update if using different username
$password = "";  // Add your password if applicable

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get data from the request
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $rating = isset($_POST['rating_data']) ? intval($_POST['rating_data']) : 0;
        $review = isset($_POST['user_review']) ? trim($_POST['user_review']) : '';
        $user_name = isset($_POST['user_name']) ? trim($_POST['user_name']) : '';

        if ($rating > 0 && !empty($review) && !empty($user_name)) {
            // Prepare SQL statement
            $stmt = $pdo->prepare("INSERT INTO reviews (rating, review, username) VALUES (:rating, :review, :username)");
            $stmt->execute([
                ':rating' => $rating,
                ':review' => $review,
                ':username' => $user_name
            ]);

            echo "Thank you for your review!";
        } else {
            echo "Please provide a valid rating, review, and username.";
        }
    }
} catch (PDOException $e) {
    echo "Database connection failed: " . $e->getMessage();
}
?>
