<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"
  method="post">
    <input type="text" name="textData">
    <input type="submit" name="Check">
  </form>
  <hr><hr>
  <h3>Different formats of encryption</h3>
  <?php
    error_reporting(0);
    $value = $_POST['textData'];
    // AES-128-CTR
    echo 'Original Value:' . $value . '<br>';
    echo '<h2>openssl_encrypt</h2>';
    $ciphering = "AES-128-CTR";
    $iv_length = openssl_cipher_iv_length($ciphering);
    $options = 0;

    $encryption_iv = '1234567891011121';
    $encryption_key = "SecretKey";
    $encryption = openssl_encrypt($value, $ciphering, $encryption_key, $options, $encryption_iv);
    echo "Encrypted String: " . $encryption . "\n";

    $decryption_iv = '1234567891011121';
    $decryption_key = "SecretKey";
    $decryption = openssl_decrypt($encryption, $ciphering, $decryption_key, $options, $decryption_iv);
    echo "<br>Decrypted String: " . $decryption;

    // MD5
    echo '<h2>md5</h2>';
    echo md5($value);
    echo '<h2>Crypt No Salt</h2>';
    $encNoSalt = crypt($value, '');
    echo $encNoSalt;

    echo '<h2>Crypt with Salt</h2>';
    $salt = 'user@uesersemail.com';
    $encSalt = crypt($value, $salt);
    echo $encSalt;

  ?>
</body>
</html>