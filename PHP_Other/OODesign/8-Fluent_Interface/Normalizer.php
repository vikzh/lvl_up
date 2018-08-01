<?php

function normalize($raw)
{
    return collect($raw)
        ->map(function ($value) {
            return array_map('mb_strtolower', $value);
        })
        ->map(function ($value) {
            return array_map('trim', $value);
        })
        ->unique('name')
        ->mapToGroups(function ($item, $key) {
            return [$item['country'] => $item['name']];
        })
        ->map(function ($cities) {
            return collect($cities)->sort()->values();
        })
        ->sortKeys()
        ->toArray();
}