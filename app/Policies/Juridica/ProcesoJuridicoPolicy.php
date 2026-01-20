<?php

namespace App\Policies\Juridica;

use App\Models\Juridica\ProcesoJuridico;
use App\Models\User;

class ProcesoJuridicoPolicy
{
    public function viewAny(User $user): bool
    {
        return $this->canAccessJuridica($user);
    }

    public function view(User $user, ProcesoJuridico $procesoJuridico): bool
    {
        return $this->canAccessJuridica($user);
    }

    public function create(User $user): bool
    {
        return $this->canManageJuridica($user);
    }

    public function update(User $user, ProcesoJuridico $procesoJuridico): bool
    {
        return $this->canManageJuridica($user);
    }

    public function delete(User $user, ProcesoJuridico $procesoJuridico): bool
    {
        return $this->canManageJuridica($user);
    }

    private function canAccessJuridica(User $user): bool
    {
        if ($user->hasRole('admin')) {
            return true;
        }

        return $user->hasAnyRole(['admin', 'coordinator', 'user']) && $user->inArea('legal');
    }

    private function canManageJuridica(User $user): bool
    {
        if ($user->hasRole('admin')) {
            return true;
        }

        return $user->hasAnyRole(['admin', 'coordinator']) && $user->inArea('legal');
    }
}
