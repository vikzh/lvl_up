<?php

namespace App;

class Validator
{
    public function validate(array $course)
    {
        $errors = [];
        if ($course['name'] == '') {
            $errors['name'] = "Can't be blank";
        }

        if (empty($course['body'])) {
            $errors['body'] = "Can't be blank";
        }

        return $errors;
    }
}
