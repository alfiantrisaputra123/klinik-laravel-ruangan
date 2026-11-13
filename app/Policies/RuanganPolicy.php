<?php

namespace App\Policies;

use App\Models\Ruangan;
use App\Models\User;

class RuanganPolicy
{
    // Admin dan petugas boleh melihat daftar
    public function viewAny(User $user): bool
    {
        return in_array($user->role, ['admin', 'petugas']);
    }

    // Admin dan petugas boleh menambah data
    public function create(User $user): bool
    {
        return in_array($user->role, ['admin', 'petugas']);
    }

    // Admin dan petugas boleh mengubah data
    public function update(User $user, Ruangan $ruangan): bool
    {
        return in_array($user->role, ['admin', 'petugas']);
    }

    // Hanya admin yang boleh menghapus data
    public function delete(User $user, Ruangan $ruangan): bool
    {
        return $user->role === 'admin';
    }
}
