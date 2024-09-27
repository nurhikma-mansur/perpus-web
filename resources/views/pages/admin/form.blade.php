<?php

use function Livewire\Volt\{state, form, usesFileUploads, mount};
use App\Livewire\Forms\AdminForm;
use App\Models\User;
usesFileUploads();
form(AdminForm::class);

state(['is_update' => false]);

mount(function (?User $user = null){
    
    if($user->name){
        $this->is_update = true;
        $this->form->setModel($user);
    }

});

$submit = function (){

    $this->form->validate();

    try {

        if($this->is_update){
            $this->form->update();
            session()->flash('success', 'Data berhasil diubah');   
        } else {
            $this->form->store();
            session()->flash('success', 'Data berhasil ditambah');
        }

        $this->redirectRoute('admin.master-data.admin.index');
    } catch (\Throwable $th) {
        throw $th;
    }
    
};

?>

<x-layouts.app>
    @volt
    <div class="container">
        <form wire:submit="submit" action="">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        Tambah Data
                    </div>
                    <div class="card-toolbar">
                        <a href="{{ route('admin.master-data.admin.index') }}" class="btn btn-light-primary">
                            Kembali
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" wire:model="form.name" class="form-control form-control-solid" placeholder="Masukkan Nama"/>
                                @error('form.name')
                                    <p class="text-danger mt-1" >{{ $message  }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Username</label>
                                <input wire:model="form.username" type="text" class="form-control form-control-solid" placeholder="Masukkan Username"/>
                                @error('form.username')
                                    <p class="text-danger mt-1" >{{ $message  }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Kata Sandi {{ $is_update ? 'Baru' : '' }}</label>
                                <input wire:model="{{ $is_update ? 'form.newPassword' : 'form.password' }}" type="text" class="form-control form-control-solid" placeholder="Masukkan password"/>
                                @error('form.password')
                                    <p class="text-danger mt-1" >{{ $message  }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end mt-5">
                <a href="/admin/master-data/admin" class="btn btn-outline-primary">
                    Kembali
                </a>
                <button class="btn btn-primary ml-5">
                    Submit
                </button>
            </div>
        </form>
    </div>
    @endvolt
</x-layouts.app>