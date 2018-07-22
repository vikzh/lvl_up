<?php

namespace App;

class PasswordValidator
{
    public $options = [
        'minLength' => 8,
        'containNumbers' => false
    ];

    public function __construct(array $options = [])
    {
        $this->options = array_merge($this->options, $options);
    }

    public function validate(string $password): array
    {
        $errors = [];
        if (mb_strlen($password) < $this->options['minLength']) {
            $errors['minLength'] = 'too small';
        }

        if ($this->options['containNumbers']) {
            if (!$this->hasNumber($password)) {
                $errors['containNumbers'] = 'should contain at least one number';
            }
        }

        return $errors;
    }

    private function hasNumber($subject)
    {
        return strpbrk($subject, '1234567890') !== false;
    }
}