<?php

namespace Workbench\App\Features;

class UserRole
{
    /**
     * Resolve the feature's initial value.
     */
    public function resolve(mixed $scope): mixed
    {
        return [
            'member',
            'moderator',
            'administrator',
        ];
    }
}
