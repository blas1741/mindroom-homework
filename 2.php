<?php
    function transposeText($text, $offset) {
      $outputText = "";
      $offset = $offset % 26;
      for ($i = 0; $i < strlen($text); $i++) {
        $char = $text[$i];
        if(ctype_alpha($char)) {
          $isUpperCase = ctype_upper($char);
          $char = ($isUpperCase ? ord('A') : ord('a')) +
                  ((ord($char) - ($isUpperCase ? ord('A') : ord('a')) + $offset) % 26);
          $char = chr($char);
          $outputText .= $char;
        }
      }
      return $outputText;
    }

      if($_SERVER["REQUEST_METHOD"] == "POST") {
        $inputText = $_POST["inputText"];
        $transposeOffset = $_POST["transposeOffset"];
        $outputText = transposeText($inputText, $transposeOffset);
      }
    ?>
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
      <br>
      <label for="transposeOffset">Transpose Offset:</label>
      <input type="number" name="transposeOffset" id="transposeOffset" min="0" max="25" vakye="1" required>
      <button type="submit">Transpose</button>
    </form>
    <?php
      if(isset($outputText)){
        echo "<p>Transposed Text: $outputText<p>";
      }
    ?>
</body>
</html>