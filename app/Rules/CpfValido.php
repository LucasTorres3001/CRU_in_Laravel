<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CpfValido implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!$this->isValidCpf($value)):
            $fail('The :attribute field does not contain a valid CPF.');
        endif;
    }

    /**
     * Is valid CPF
     */
    public function isValidCpf(string $cpf): bool
    {
        $cpf = preg_replace('/\D/','',$cpf);
        if (preg_match('/^(\d)\1{10}$/',$cpf)):
            return false;
        endif;
        for ($t = 9; $t < 11; $t++):
            $soma = 0;
            for ($i = 0; $i < $t; $i++):
                $soma += $cpf[$i] * (($t + 1) - $i);
            endfor;
            $digit = ($soma * 10) % 11;
            $digit = ($digit == 10 || $digit == 11) ? 0 : $digit;
            if ($cpf[$t] != $digit):
                return false;
            endif;
        endfor;
        return true;
    }
}
