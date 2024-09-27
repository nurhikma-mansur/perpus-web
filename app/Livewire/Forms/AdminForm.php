<?php

namespace App\Livewire\Forms;

use App\Models\Admin;
use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Form;

class AdminForm extends Form
{
    public ?User $user;

    #[Validate('required', message: 'Nama harus diisi')]
    public $name;

    #[Validate('required', message: 'Username harus diisi')]
    public $username;

    #[Validate('required', message: 'Password harus diisi')]
    public $password;

    #[Validate('nullable', message: 'Password harus diisi')]
    public $newPassword;

    public function setModel(User $user){
        $this->user = $user;
        $this->fill($user);
    }

    public function store(){

        try {
            $user = $this->except('user', 'newPassword');
            $user['is_admin'] = true;
            User::create($user);
        } catch (\Throwable $th) {
            throw $th;
        }

    }

    public function update(){

        try {
            $user = $this->except('user', 'newPassword');
            if($this->newPassword) $user['password'] = $this->newPassword;
            $this->user->update($user);
        } catch (\Throwable $th) {
            throw $th;
        }

    }
    

}
