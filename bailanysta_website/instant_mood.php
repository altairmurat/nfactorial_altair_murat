<?php
session_start();
require_once 'db/config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$randomgrat = $conn->query("SELECT content FROM gratitude_entries ORDER BY RAND() LIMIT 1");
if ($randomgrat->num_rows>0) {
    $row = $randomgrat->fetch_assoc();
}
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
  <title>Instant mood</title>
  <link rel="stylesheet" href="css/style.css">
  <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .quote {
            margin-bottom: 15px;
            padding: 10px;
            border-left: 4px solid #f39c12;
            font-style: italic;
        }
        .quote p {
            margin: 0;
        }
    </style>
</head>
<body>
<div class="container" id="quote-container">
  <h2>your message:</h2>
  <p id="quote"></p>
  
  
  <script>
        const url = 'https://quotes-inspirational-quotes-motivational-quotes.p.rapidapi.com/quote?token=ipworld.info';
        const options = {
            method: 'GET',
            headers: {
                'x-rapidapi-key': 'fdf7f010c3mshbfe467460d8e45ep1f4af9jsn0fca83ef7987',
                'x-rapidapi-host': 'quotes-inspirational-quotes-motivational-quotes.p.rapidapi.com'
            }
        };

        // Function to fetch a random quote from the API
        async function fetchQuote() {
            try {
                const response = await fetch(url, options);
                console.log('Response Status:', response.status); // Log the response status

                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }

                const result = await response.json(); // Parse the response as JSON
                console.log('API Response:', result); // Log the full response to inspect its structure

                // Check if the response contains a quote
                if (result && result.text) {
                    const quoteText = result.text;
                    document.getElementById('quote').innerText = `quote of the day: "${quoteText}"`;
                } else {
                    // If no quote is returned, show an error message
                    document.getElementById('quote').innerText = 'Error: Could not fetch a valid quote.';
                }
            } catch (error) {
                console.error('Error fetching quote:', error);
                document.getElementById('quote').innerText = 'Sorry, could not fetch a quote at this time.';
            }
        }

        // Call the function to fetch a quote when the page loads
        fetchQuote();

        // Add event listener to the button to fetch a new random quote
        document.getElementById('new-quote-button').addEventListener('click', fetchQuote);
    </script>
  <p>gratitude of random user: <?= $row['content'] ?></p>
  <a href="dashboard.php">back</a>
</div>
</body>
</html>
