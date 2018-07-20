<?php

namespace App;

use App\Comparable;
class User implements Comparable
{
    private $id;
    private $name;

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }
    public function compareTo($user)
    {
        return $this->id === $user->id;
    }
}
// END
