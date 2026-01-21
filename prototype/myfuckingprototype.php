<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Simple Calculator</title>
</head>
<body>
  
  <h1>Simple Calculator</h1>
  
  <form action="" method="post">
    
    <label for="nb1">First Number:</label>
    <input type="number" name="nb1" id="nb1" step="any">
    <br><br>
    
    <label for="nb2">Second Number:</label>
    <input type="number" name="nb2" id="nb2" step="any">
    <br><br>
    
    <label for="op">Select Operation:</label>
    <select name="op" id="op">
      <option value="plus">Addition (+)</option>
      <option value="minus">Subtraction (−)</option>
      <option value="multi">Multiplication (×)</option>
      <option value="div">Division (÷)</option>
    </select>
    <br><br>
    
    <button type="submit">Calculate</button>
    
  </form>

  <?php
  
  function calculate($num1, $num2, $operator) {
    switch ($operator) {
      case "plus":
        return $num1 + $num2;
        
      case "minus":
        return $num1 - $num2;
        
      case "multi":
        return $num1 * $num2;
        
      case "div":
        if ($num2 == 0) {
          return "Error: Cannot divide by zero!";
        }
        return $num1 / $num2;
        
      default:
        return "Error: Invalid operation!";
    }
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $errors = [];
    
    if (!isset($_POST["nb1"]) || $_POST["nb1"] === "" || !is_numeric($_POST["nb1"])) {
      $errors[] = "Please enter a valid first number.";
    }
    
    if (!isset($_POST["nb2"]) || $_POST["nb2"] === "" || !is_numeric($_POST["nb2"])) {
      $errors[] = "Please enter a valid second number.";
    }
    
    if (!isset($_POST["op"]) || empty($_POST["op"])) {
      $errors[] = "Please select an operation.";
    }
    
    if (!empty($errors)) {
      echo "<p><strong>Please fix the following errors:</strong></p>";
      echo "<ul>";
      foreach ($errors as $error) {
        echo "<li>$error</li>";
      }
      echo "</ul>";
    } else {
      
      $num1 = floatval($_POST["nb1"]);
      $num2 = floatval($_POST["nb2"]);
      $operator = $_POST["op"];
      
      $result = calculate($num1, $num2, $operator);
      
      $operations = ["plus" => "Addition", "minus" => "Subtraction", "multi" => "Multiplication", "div" => "Division"];
      $symbols = ["plus" => "+", "minus" => "-", "multi" => "×", "div" => "÷"];
      
      echo "<p><strong>Operation:</strong> {$operations[$operator]}</p>";
      echo "<p><strong>Result:</strong> $num1 {$symbols[$operator]} $num2 = $result</p>";
    }
  }
  ?>
  
</body>
</html>