<?php

/**
 * @name PeselValidator
 * @package Validator
 * @version 1.3.0
 * @author Miroslaw Kukuryka
 * @copyright (c) 2023 (https://www.appsonline.eu)
 * @link https://www.appsonline.eu
 */
declare(strict_types = 1);
namespace Application\Validator;

use Laminas\Validator\AbstractValidator;

class PeselValidator extends AbstractValidator
{

    /**
     *
     * @var string
     */
    private const PESEL_NOT_SCALAR = 'peselNotScalar';

    /**
     *
     * @var string
     */
    private const PESEL_LENGHT = 'peselLength';

    /**
     *
     * @var string
     */
    private const PESEL_CHARSET = 'peselCharset';

    /**
     *
     * @var string
     */
    private const PESEL_CORECT = 'peselCorect';

    /**
     *
     * @var array
     */
    protected $messageTemplates = [
        self::PESEL_NOT_SCALAR => 'The PESEL number must be a scalar value',
        self::PESEL_LENGHT => 'Incorrect length for PESEL number',
        self::PESEL_CHARSET => 'Only numbers are allowed in the PESEL number',
        self::PESEL_CORECT => 'The provided PESEL number is incorrect'
    ];

    /**
     *
     * @name isValid
     * @access public
     * @param string $value
     * @see \Laminas\Validator\ValidatorInterface::isValid()
     */
    public function isValid($value): bool
    {
        if (! is_scalar($value)) {
            $this->error(self::PESEL_NOT_SCALAR);
            return false;
        }

        if (strlen((string) $value) != 11) {
            $this->error(self::PESEL_LENGHT);
            return false;
        }
        
        if (is_int($value) !== true) {
            $this->error(self::PESEL_CHARSET);
            return false;
        }

        if ($value == '00000000000') {
            $this->error(self::PESEL_CORECT);
            return false;
        } else {
            $tab = [
                1,
                3,
                7,
                9,
                1,
                3,
                7,
                9,
                1,
                3
            ];

            $sum = 0;
            for ($i = 0; $i < 10; $i ++) {
                $sum += substr((string) $value, $i, 1) * $tab[$i];
            }

            $sum = (10 - ($sum % 10)) % 10;
            if ($sum != substr((string) $value, 10, 1)) {
                $this->error(self::PESEL_CORECT);
                return false;
            }
        }
        return true;
    }
}
