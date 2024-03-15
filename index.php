<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>External API Example</title>
    <style>
        body {
            background-image: url('https://ssb.wiki.gallery/images/thumb/8/86/SSBU-Battlefield.png/1200px-SSBU-Battlefield.png');
            background-size: cover; /* Cover the entire background */
            background-position: center; /* Center the background */
            background-repeat: no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: white; /* Text color for better readability */
            font-family: Arial, sans-serif; /* Use a common font */
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            text-decoration: none;
            color: white;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin: 25px;
        }

        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Adjust the alpha value to control darkness */
            z-index: -1; /* Place the overlay behind other content */
        }

        .content {
            text-align: center;
        }

        .character-image {
            width: 200px; /* Adjust size as needed */
            height: auto;
            margin-top: 20px;
            border-radius: 50%; /* Make the character image round */
        }

        .battleInfo {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }

        .characterInfo {
            margin-left: 20px; /* Add space between image and character info */
            text-align: left; /* Align character info text to the left */
        }

        .charName {
            margin: 0; /* Remove default margin */
            font-size: 24px; /* Increase font size */
        }

        .row {
            display: flex;
            margin-top: 10px; /* Add space between rows */
        }

        .bodyText {
            margin: 0; /* Remove default margin */
            padding-right: 20px; /* Add space between text */
        }
    </style>
</head>
<body>
    <div class="content">
        <h1 class="heading">Welcome to the Thunder Dome!</h1>

        <?php
        // Replace 'YOUR_API_ENDPOINT' with the actual API endpoint
        $selectedNum = rand(0, 826);
        $api_endpoint = 'https://rickandmortyapi.com/api/character/' . $selectedNum;

        // Make request to the API
        $response = file_get_contents($api_endpoint);

        // Check if response is successful
        if ($response === false) {
            echo '<p>Error retrieving data from the API.</p>';
        } else {
            // Decode JSON response
            $data = json_decode($response, true);

            // Check if decoding was successful
            if ($data === null) {
                echo '<p>Error decoding JSON data.</p>';
            } else {
                // Display the retrieved information
                $health = rand(1, 10);
                $power = rand(1, 10);
                $intelligence = rand(1, 10);
                $luck = rand(1, 10);
                echo '<h1 class="heading">You will be fighting:</h1>';
                echo '<div class="battleInfo">';
                echo '<img class="character-image" src="' . $data['image'] . '" alt="Character Image">';
                echo '<div class="characterInfo">';
                echo '<h2 class="charName">' . $data['name'] . '</h2>';
                echo '<div class="row">';
                echo '<p class="bodyText"> Health: ' . $health . '</p>';
                echo '<p class="bodyText"> Power: ' . $power . '</p>';
                echo '</div>';
                echo '<div class="row">';
                echo '<p class="bodyText"> Intelligence: ' . $intelligence . '</p>';
                echo '<p class="bodyText"> Luck: ' . $luck . '</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        }
        ?>
        <button class = "button"onclick="window.location.reload();" style="cursor: pointer;">Generate New Character</button>
    
    </div>
</body>
</html>
