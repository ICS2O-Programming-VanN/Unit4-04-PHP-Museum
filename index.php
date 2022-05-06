<html>
  <head>
    <!-- 	Meta Data	 -->
		<meta charset="UTF-8">
		<meta name="author" content="Van N">
		<meta name="keywords" content="immaculata, ics2o">
		<meta name="DESCRIPTION" content="Museum Admission Website, with PHP">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="./fav_index/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="./fav_index/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="./fav_index/favicon-16x16.png" />
    <link rel="manifest" href="./fav_index/site.webmanifest" />
    <!-- Website title -->
    <title>Museum Admission Website, with PHP</title>
    <!-- Links to style.css file -->
		<link rel="stylesheet" href="./css/style.css">
  </head>
  <body>
		<!-- Heading and paragraph -->
    <?php
			echo '<center><h1>Museum Admission Website, with PHP</h1></center><br>';
			echo "<p>Enter your below!</p>";
		?>
		<!-- Text field and button (Takes Input) -->
		<form method = "post">
      Age: <input type="number" step="1" min="1" name="age"> <br>
			<br><br>
      <!-- Drop Down Menu -->
      <p>Enter the day!</p>
      <label for="day">Day:</label>
      <select name="day" id="day">
        <option value="">[Day of the Week]</option>
        <option value="Sunday">Sunday</option>
        <option value="Monday">Monday</option>
        <option value="Tuesday">Tuesday</option>
        <option value="Wednesday">Wednesday</option>
        <option value="Thursday">Thursday</option>
        <option value="Friday">Friday</option>
        <option value="Saturday">Saturday</option>
      </select>
      <br><br>
			<input type ="submit" name ="submit"  value="Submit">
    </form>
		<!-- Takes in user's age and outputs back what movies they can watch -->
		<?php
      // If Button clicked
			if(isset($_POST['submit'])) {
        // Ensures input field is not empty
        if($_POST['age'] != "") {
          // Constants
          define("CHILD_FREE", 5);
          define("SENIOR_FREE", 95);
          define("STUDENT_DISCOUNT_MIN", 12);
          define("STUDENT_DISCOUNT_MAX", 21);

          // Variables
          $age = $_POST['age'];
          $day = $_POST['day'];
          
          // IF the user can see a R-rated movie alone (18+)
          if ($age < CHILD_FREE or $age > SENIOR_FREE) {
            echo "<br><h4>The cost is Free for you! Since you are " . $age . " years old.</h4>";
            // IF the user can see a PG-13 movie alone (13+)
          } else if ((($day == "Tuesday") or ($day == "Thursday")) or
                     (($age >= STUDENT_DISCOUNT_MIN) and ($age <= STUDENT_DISCOUNT_MAX))) {
            echo "<br><h4>You get a discount! (Student Pricing)</h4>";
            // IF the user can see a PG or G rated movie (10+)
          } else if ($day != "") {
            echo "<br><h4>You have to pay regular price.</h4>";
            // ELSE statement for if the user is less than 10 years old
          } else {
            echo "<br><h4>Please enter a valid day.</h4>";
          }
          // ELSE the user did not input anything and pressed the submit button
        } else {
          echo "<h4>Please fill out a valid age!</h4>";
        }
			}
		?>
  </body>
</html>