# PHP Encryption Project

This project provides a simple implementation of message encryption and decryption using OpenSSL in PHP. It includes functions to encrypt and decrypt messages, as well as a user interface for easy interaction.

## Project Structure

```
php-encryption-project
├── Asymétrique
|   ├── src 
|       ├── keys      
|           ├── private_key.pem      # Contains the encryptMessage function
│           ├── public_key.pem      # Contains the decryptMessage function
|       ├── encrypt.php      # Contains the encryptMessage function
│       ├── decrypt.php      # Contains the decryptMessage function
│       └── index.php        # Main entry point for the application     # Contains the encryptMessage function
├── Symétrique
|   ├── src
│       ├── encrypt.php      # Contains the encryptMessage function
│       ├── decrypt.php      # Contains the decryptMessage function
│       └── index.php        # Main entry point for the application
├── composer.json         # Composer configuration file
└── README.md             # Project documentation
```

## Installation

1. Clone the repository to your local machine.
2. Navigate to the project directory.
3. Run `composer install` to install any dependencies listed in `composer.json`.

## Usage

1. Open `src/index.php` in your web browser.
2. Use the provided forms to input a plaintext message and a key for encryption.
3. Submit the form to see the encrypted message.
4. To decrypt a message, input the encrypted message and the same key used for encryption, then submit the form to see the decrypted plaintext.

## Requirements

- PHP 7.1 or higher
- OpenSSL extension enabled in your PHP installation

## License

This project is licensed under the MIT License.