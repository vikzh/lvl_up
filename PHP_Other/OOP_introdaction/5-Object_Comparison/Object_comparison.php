<?php

function compare(User $user1, User $user2)
{
    $isSameIds = $user1->id === $user2->id;
    return $isSameIds;
}