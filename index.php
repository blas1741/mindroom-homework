<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
    <h1>Text Transport</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <label for="inputText">Enter Text:</label>
      <input type="text" name="inputText" id="inputText" required>
      <button type="submit">Transpose</button>
    </form>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
      $inputText = $_POST["inputText"];
      $outputText = "";
      for ($i = 0; $i < strlen($inputText); $i++) {
        $char = $inputText[$i];
        if(ctype_alpha($char)) {
          
          $char = ($char == 'z') ? 'a' : ($char == 'Z' ? 'A' : chr(ord($char) + 1));
        }
        $outputText .= $char;
      }
      echo "<p>Transposed Text: $outputText<p>";
    }
    ?>
</body>
</html>