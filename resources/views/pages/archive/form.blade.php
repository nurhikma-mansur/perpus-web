<?php

use function Livewire\Volt\{state, form, usesFileUploads, mount};
use App\Livewire\Forms\ArchiveForm;
use App\Models\Archive;
usesFileUploads();
form(ArchiveForm::class);

state(['is_update' => false]);

mount(function (?Archive $archive = null){
    
    if($archive->title){
        $this->is_update = true;
        $this->form->setModel($archive);
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

        $this->redirectRoute('archive.book.index');
    } catch (\Throwable $th) {
        throw $th;
    }
    
};


?>


<x-layouts.app>
    @volt
    <div class="container">
        <form action="">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        Tambah Data
                    </div>
                    <div class="card-toolbar">
                        <a href="{{ route('admin.archive.index') }}" class="btn btn-light-primary">
                            Kembali
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>File</label>
                                <input wire:model="{{ $is_update ? 'form.newFile' : 'form.file' }}" type="file" class="form-control form-control-solid" placeholder="Example input"/>
                                @error('form.file')
                                    <p class="text-danger mt-1" >{{ $message  }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Nama</label>
                                <input wire:model="form.title" type="text" class="form-control form-control-solid" placeholder="Example input"/>
                                @error('form.title')
                                    <p class="text-danger mt-1" >{{ $message  }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Nim</label>
                                <input wire:model="form.nim" type="text" class="form-control form-control-solid" placeholder="Example input"/>
                                @error('form.nim')
                                    <p class="text-danger mt-1" >{{ $message  }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Jurusan</label>
                                <select wire:model="form.major" class="form-control form-control-solid">
                                    <option>-- Pilih Jurusan --</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                                @error('form.major')
                                    <p class="text-danger mt-1" >{{ $message  }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Tahun Lulus</label>
                                <input wire:model="form.graduation_year" type="number" class="form-control form-control-solid" placeholder="Example input"/>
                                @error('form.graduation_year')
                                    <p class="text-danger mt-1" >{{ $message  }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Judul Skripsi</label>
                                <input wire:model="form.skrip_title" type="text" class="form-control form-control-solid" placeholder="Example input"/>
                                @error('form.skrip_title')
                                    <p class="text-danger mt-1" >{{ $message  }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>No Klasifikasi</label>
                                <input wire:model="form.classification_number" type="text" class="form-control form-control-solid" placeholder="Example input"/>
                                @error('form.classification_number')
                                    <p class="text-danger mt-1" >{{ $message  }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group ">
                                <label >Subjek</label>
                                <input id="kt_tagify_1" class="form-control form-control-solid tagify" name='tags' placeholder='ketik lalu tekan enter...' autofocus="" />
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group ">
                                <label >Pembimbing</label>
                                <input id="kt_tagify_2" class="form-control form-control-solid tagify" name='tags' placeholder='ketik lalu tekan enter...' autofocus="" />
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Abstrak</label>
                                <textarea wire:model="form.abstract" class="form-control form-control-solid" rows="3"></textarea>
                                @error('form.abstract')
                                    <p class="text-danger mt-1" >{{ $message  }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end mt-5">
                <a href="/admin/e-book" class="btn btn-outline-primary">
                    Kembali
                </a>
                <button class="btn btn-primary ml-5">
                    Submit
                </button>
            </div>
        </form>
    </div>

    @script
    <script>
            const input1 = document.getElementById('kt_tagify_1')
            const input2 = document.getElementById('kt_tagify_2')
            const tagify1 = new Tagify(input1)
            const tagify2 = new Tagify(input2)
    </script>
    @endscript

    @endvolt
</x-layouts.app>