# PeselValidator
Weryfikacja numeru PESEL

Walidator służący do weryfikacji numeru PESEL obowiązujący na terenie Polski. Jest on rozszerzeniem dostępnych walidatorów dla <b>Laminas Framework</b> (dawniej <b>Zend Frameworok</b>).

Użycie walidatora

```php

<?php

declare(strict_types = 1);
use Application\Validator\PeselValidator;

include __DIR__ . '/vendor/autoload.php';

$numerPesel = '00000000000';

$validator = new PeselValidator();
if ($validator->isValid($pesel) !== false) {
    echo 'Podany numer PESEL jest prawidłowy';
} else {
    echo 'Podany numer PESEL jest prawidłowy';
}
```
Wartości dla kluczy tłumaczeń walidatora
 - peselNotScalar - Numer PESEL musi być wartością skalarną
 - peselLength - Nieprawidłowa długość numeru PESEL
 - peselCharset - W numerze PESEL dozwolone są tylko cyfry
 - peselCorect - Podany numer PESEL jest nieprawidłowy