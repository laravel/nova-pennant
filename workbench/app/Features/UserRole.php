<?php

namespace App\Features;

class UserRole
{
    /**
     * Resolve the feature's initial value.
     */
    public function resolve(mixed $scope): mixed
    {
        return match (true) {
            str_ends_with($scope->email, '@laravel.com') => 'administrator',
            default => 'member',
        };
    }
}
