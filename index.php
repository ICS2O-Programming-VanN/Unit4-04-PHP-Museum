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
      echo "<p>This website will tell you the price of admission depending on age and the day of the week!</p>";
      echo "<p>People ages less than 5 or older than 95 gets in free!</p>";
      echo "<p>Students ages between 12 and 21 get a discounted price regardless of the day!</p>";
      echo "<p>Discounted Prices are also given on Tuesdays and Thursdays!</p>";
      echo "<p>Enter your age and the day of the week below!</p>";
		?>
		<!-- Text field and button (Takes Input) -->
		<form method = "post">
      Age: <input type="number" step="1" min="1" name="age"> <br>
			<br><br>
      <!-- Drop Down Menu -->
      <p>Select the day!</p>
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
		<!-- Takes in user's age and day of week and outputs back cost -->
		<?php
      // If Button clicked
			if(isset($_POST['submit'])) {
        // Ensures input field (for age) is not empty
        if($_POST['age'] != "") {
          // Constants
          define("CHILD_FREE", 5);
          define("SENIOR_FREE", 95);
          define("STUDENT_DISCOUNT_MIN", 12);
          define("STUDENT_DISCOUNT_MAX", 21);

          // Variables
          $age = $_POST['age'];
          $day = $_POST['day'];
          
          // IF the user gets in free (Age 1-4 & 95++)
          if ($age < CHILD_FREE or $age > SENIOR_FREE) {
            echo "<br><h4>The cost is Free for you! Since you are " . $age . " years old.</h4>";
            // IF the user gets a discounted price
          } else if ((($day == "Tuesday") or ($day == "Thursday")) or
                     (($age >= STUDENT_DISCOUNT_MIN) and ($age <= STUDENT_DISCOUNT_MAX))) {
            echo "<br><h4>You get a discount! (Student Pricing)</h4>";
            // IF they selected a day and they aren't getting a discounted or free entry, they pay the regular fee
          } else if ($day != "") {
            echo "<br><h4>You have to pay the regular price.</h4>";
            // ELSE statement for if did not select a day
          } else {
            echo "<br><h4>Please enter a valid day.</h4>";
          }
          // ELSE the user did not input anything and pressed the submit button
        } else {
          echo "<h4>Please fill out a valid age!</h4>";
        }
        echo "<h4>Your age: " . $age . "</h4>";
        echo "<h4>The day: " . $day . "</h4>";
			}
		?>
  </body>
</html>