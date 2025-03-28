<?php
function encryptMessageAsymmetric($plaintext, $publicKeyPath) {
   
    $publicKey = file_get_contents($publicKeyPath);
    if (!$publicKey) {
        return 'Failed to load public key';
    }

    $encrypted = '';
    if (!openssl_public_encrypt($plaintext, $encrypted, $publicKey)) {
        return 'Failed to encrypt message';
    }
    
    return base64_encode($encrypted);
}
?>