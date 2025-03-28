<?php
require_once 'encrypt.php';
require_once 'decrypt.php';

$message = '';
$encryptedMessage = '';
$decryptedMessage = '';
$key = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['encrypt'])) {
        $message = $_POST['message'];
        $key = $_POST['key'];
        $encryptedMessage = encryptMessage($message, $key);
    } elseif (isset($_POST['decrypt'])) {
        $encryptedMessage = $_POST['encrypted_message'];
        $key = $_POST['key'];
        $decryptedMessage = decryptMessage($encryptedMessage, $key);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crypted Tool</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            border: none;
            border-radius: 4px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .result {
            background-color: #e9ecef;
            padding: 10px;
            border-radius: 4px;
            word-wrap: break-word;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Crypter</h1>
        <form method="post">
            <label for="message">Message:</label>
            <input type="text" id="message" name="message" required>
            <label for="key">Key:</label>
            <input type="text" id="key" name="key" required>
            <button type="submit" name="encrypt">Encrypt</button>
        </form>
        <?php if ($encryptedMessage): ?>
            <div class="result">
                <h2>Encrypted Message</h2>
                <p><?php echo htmlspecialchars($encryptedMessage); ?></p>
            </div>
        <?php endif; ?>

        <h1>Décrypter</h1>
        <form method="post">
            <label for="encrypted_message">Encrypted Message:</label>
            <input type="text" id="encrypted_message" name="encrypted_message" required>
            <label for="key">Key:</label>
            <input type="text" id="key" name="key" required>
            <button type="submit" name="decrypt">Decrypt</button>
        </form>
        <?php if ($decryptedMessage): ?>
            <div class="result">
                <h2>Decrypted Message</h2>
                <p><?php echo htmlspecialchars($decryptedMessage); ?></p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>