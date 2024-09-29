<?php

use function Livewire\Volt\{state, form, usesFileUploads, mount};
use App\Livewire\Forms\LoanForm;
use App\Models\Loan;
usesFileUploads();
form(LoanForm::class);

state(['is_update' => false]);

mount(function (?Loan $loan = null){
    
    if($loan->title){
        $this->is_update = true;
        $this->form->setModel($loan);
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

        $this->redirectRoute('admin.book.loan.index');
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
                        <a href="{{ route('admin.book.loan.index') }}" class="btn btn-light-primary">
                            Kembali
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" wire:model="form.fullname" class="form-control form-control-solid" placeholder="Masukkan Nama"/>
                                @error('form.fullname')
                                    <p class="text-danger mt-1" >{{ $message  }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>NIM</label>
                                <input type="text" wire:model="form.nim" class="form-control form-control-solid" placeholder="Masukkan NIM"/>
                                @error('form.nim')
                                    <p class="text-danger mt-1" >{{ $message  }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Jurusan</label>
                                <input type="text" wire:model="form.major" class="form-control form-control-solid" placeholder="Masukkan Jurusan"/>
                                @error('form.major')
                                    <p class="text-danger mt-1" >{{ $message  }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Semester</label>
                                <input type="text" wire:model="form.semester" class="form-control form-control-solid" placeholder="Masukkan Semester"/>
                                @error('form.semester')
                                    <p class="text-danger mt-1" >{{ $message  }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Judul Buku</label>
                                <input type="text" wire:model="form.title" class="form-control form-control-solid" placeholder="Masukkan Judul"/>
                                @error('form.title')
                                    <p class="text-danger mt-1" >{{ $message  }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Tanggal Pinjam</label>
                                <input type="date" wire:model="form.start_date" class="form-control form-control-solid" placeholder="Example input"/>
                                @error('form.start_date')
                                    <p class="text-danger mt-1" >{{ $message  }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Tanggal Kembali</label>
                                <input type="date" wire:model="form.end_date" class="form-control form-control-solid" placeholder="Example input"/>
                                @error('form.end_date')
                                    <p class="text-danger mt-1" >{{ $message  }}</p>
                                @enderror
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end mt-5">
                <a href="/admin/book/loan" class="btn btn-outline-primary">
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