<html>
  <head>
    <!-- 	Meta Data	 -->
		<meta charset="UTF-8">
		<meta name="author" content="Van N">
		<meta name="keywords" content="immaculata, ics2o">
		<meta name="DESCRIPTION" content="Viewable movies in PHP">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="./fav_index/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="./fav_index/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="./fav_index/favicon-16x16.png" />
    <link rel="manifest" href="./fav_index/site.webmanifest" />
    <!-- Website title -->
    <title>Movie Theater Website in PHP</title>
    <!-- Links to style.css file -->
		<link rel="stylesheet" href="./css/style.css">
  </head>
  <body>
		<!-- Heading and paragraph -->
    <?php
			echo '<center><h1>Movie Theater Website in PHP</h1></center><br>';
			echo "<p>Enter your below!</p>";
		?>
		<!-- Text field and button (Takes Input) -->
		<form method = "post">
      Age: <input type="number" step="1" min="1" name="age"> <br>
			<br><br>
			<input type ="submit" name ="submit"  value="Submit">
		<!-- Takes in user's age and outputs back what movies they can watch -->
		<?php
      // If Button clicked
			if(isset($_POST['submit'])) {
        // Ensures input field is not empty
        if($_POST['age'] != "") {
          // Constants
          define("R_RATED", 18);
          define("PG_THIRTEEN", 13);
          define("PG_RATED_ALONE", 10);

          // Variables
          $age = $_POST['age']; 
          
          // IF the user can see a R-rated movie alone (18+)
          if ($age >= R_RATED) {
            echo "<br><h4>You can see R-rated movies alone! Since you are " . $age . " years old.</h4>";
            // IF the user can see a PG-13 movie alone (13+)
          } else if ($age >= PG_THIRTEEN) {
            echo "<br><h4>You can see PG-13 movies alone! Since you are " . $age . " years old.</h4>";
            // IF the user can see a PG or G rated movie (10+)
          } else if ($age >= PG_RATED_ALONE) {
            echo "<br><h4>You can see PG or G rated movies alone! Since you are " . $age . " years old.</h4>";
            // ELSE statement for if the user is less than 10 years old
          } else {
            echo "<br><h4>You cannot see a movie alone! Since you are less than 10 years old.</h4>";
          }
          // ELSE the user did not input anything and pressed the submit button
        } else {
          echo "<h4>Please fill the input field.</h4>";
        }
			}
		?>
  </body>
</html>