<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form</title>
</head>
<body>
  <form action="formEx.php" method="POST">
  <label for="name">Name :</label>
  <input type="text" name="name">
  <br>
  <br>
  <label for="age">Age :</label>
  <input type="number" name="age">
  <br>
  <br>
  <label for="male">Male</label>
  <input type="radio" name="gender" value="Male" id="male">
  <label for="female">Female</label>
  <input type="radio" name="gender" value="Female" id="female">
  <button type="submit" name="btn">Send</button>
  </form>
  <br>
<?php

  if (isset($_POST["btn"])) {
    if (
      empty($_POST["name"]) ||
      empty($_POST["age"]) ||
      empty($_POST["gender"])
    ) {
      echo"You must fill all the inputs";
    } else {
      $name = $_POST["name"];
      $age = $_POST["age"];
      $gender = $_POST["gender"];
      
      if ($gender === "Male") {
        echo"Hello Mr $name  you're $age years old";
      } else {
        echo"Hello Ms $name  you're $age years old";
      }
    }
  }
?>
  
</body>
</html>