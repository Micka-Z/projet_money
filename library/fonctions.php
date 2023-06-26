<?php

/*
There are a lot of answers to this question, but none of them leverage a Cryptographically Secure Pseudo-Random Number Generator (CSPRNG).

The simple, secure, and correct answer is to use RandomLib and don't reinvent the wheel.

For those of you who insist on inventing your own solution, PHP 7.0.0 will provide random_int() for this purpose; if you're still on PHP 5.x, we wrote a PHP 5 polyfill for random_int() so you can use the new API even before you upgrade to PHP 7.

Safely generating random integers in PHP isn't a trivial task. You should always check with your resident StackExchange cryptography experts before you deploy a home-grown algorithm in production.

With a secure integer generator in place, generating a random string with a CSPRNG is a walk in the park.
Creating a Secure, Random String
*/

/**
 * Generate a random string, using a cryptographically secure 
 * pseudorandom number generator (random_int)
 *
 * This function uses type hints now (PHP 7+ only), but it was originally
 * written for PHP 5 as well.
 * 
 * For PHP 7, random_int is a PHP core function
 * For PHP 5.x, depends on https://github.com/paragonie/random_compat
 * 
 * @param int $length      How many characters do we want?
 * @param string $keyspace A string of all possible characters
 *                         to select from
 * @return string
 */
function random_str(
    int $length = 64,
    string $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
): string {
    if ($length < 1) {
        throw new \RangeException("Length must be a positive integer");
    }
    $pieces = [];
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < $length; ++$i) {
        $pieces []= $keyspace[random_int(0, $max)];
    }
    return implode('', $pieces);
}


?>