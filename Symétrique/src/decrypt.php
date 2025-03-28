<?php
function decryptMessage($encryptedMessage, $key) {
    $key = hash('sha256', $key, true); // Utilise 32 octets pour AES-256-CBC
    $data = base64_decode($encryptedMessage);
    if ($data === false) {
        return 'Failed to decode base64';
    }

    $ivLength = openssl_cipher_iv_length('aes-256-cbc');
    $iv = substr($data, 0, $ivLength);
    $encryptedMessage = substr($data, $ivLength);

    if ($iv === false || $encryptedMessage === false) {
        return 'Failed to extract IV or encrypted message';
    }

    $decryptedMessage = openssl_decrypt($encryptedMessage, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);

    if ($decryptedMessage === false) {
        return 'Failed to decrypt message';
    }

    return $decryptedMessage;
}
?>