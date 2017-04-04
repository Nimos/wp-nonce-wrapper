# Wordpress Nonce Wrapper

This wrapper provides Wordpress' nonce functionality in an object-oriented environment.

# Installation

To install the package, run `composer require nimos/wp-nonce-wrapper`.  
Alternatively, you can download the zip file from Github, and run `composer update` to install the dependencies.


# Usage

Create a Nonce:

```php
$nonce = WpNonceWrapper::create_nonce();
```

Generate a nonce URL for 'http://example.com':

```php
$url = WpNonceWrapper::nonce_url( 'http://example.com' );
```

Generate hidden input to use a nonce in a form:

```php
WpNonceWrapper::nonce_field();
```

Verify a Nonce:

```php
$valid = WpNonceWrapper::verify_nonce( $nonce );
```

Display an are you sure dialogue, to manually confirm an action:

```php
WpNonceWrapper::nonce_ays( $someAction );
```


# Testing

To run the tests, run `vendor\bin\phpunit tests\WrapperTest.php`  
You will likely have to update WP_DIR in the test file to point to your Wordpress installation.