<?php

namespace App;

class Repository
{
    public function __construct()
    {
        session_start();
        if (!array_key_exists('posts', $_SESSION)) {
            $_SESSION['posts'] = [];
        }
    }

    public function all()
    {
        return array_values($_SESSION['posts']);
    }

    public function find(string $id)
    {
        return $_SESSION['posts'][$id];
    }

    public function destroy(string $id)
    {
        unset($_SESSION['posts'][$id]);
    }

    public function save(array $item)
    {
        if (empty($item['name']) || empty($item['body'])) {
            $json = json_encode($item);
            throw new \Exception("Wrong data: {$json}");
        }
        if (!isset($item['id'])) {
            $item['id'] = uniqid();
        }
        $_SESSION['posts'][$item['id']] = $item;
    }
}
