<?php
function decryptMessageAsymmetric($encryptedMessage, $privateKeyPath) {

    $privateKey = file_get_contents($privateKeyPath);
    if (!$privateKey) {
        return 'Failed to load private key';
    }

    $encryptedMessage = base64_decode($encryptedMessage);
    if (!$encryptedMessage) {
        return 'Failed to decode base64';
    }

    $decrypted = '';
    if (!openssl_private_decrypt($encryptedMessage, $decrypted, $privateKey)) {
        return 'Failed to decrypt message';
    }

    return $decrypted;
}
?>