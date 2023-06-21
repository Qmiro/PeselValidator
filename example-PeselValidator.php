<?php

/**
 * @filesource example-PeselValidator.php
 * 
 * Message templates
 * peselNotScalar - Numer PESEL musi być wartością skalarną
 * peselLength - Nieprawidłowa długość numeru PESEL
 * peselCharset - W numerze PESEL dozwolone są tylko cyfry
 * peselCorect - Podany numer PESEL jest nieprawidłowy
 */
declare(strict_types = 1);
use Application\Validator\PeselValidator;

include __DIR__ . '/vendor/autoload.php';

$numerPesel = '00000000000';

$validator = new PeselValidator();

if ($validator->isValid($numerPesel) !== false) {
    echo 'Podany numer PESEL jest prawidłowy';
} else {
    echo 'Podany numer PESEL jest nie prawidłowy';
    $messages = $validator->getMessages();
    foreach ($messages as $key => $value) {
        echo $key . ' => ' . $value . '<br/>';
    }
}