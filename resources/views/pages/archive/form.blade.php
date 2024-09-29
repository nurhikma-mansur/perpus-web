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
        $this->dispatch('init-tagify', $archive->instructors, $archive->subjects);
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

        $this->redirectRoute('admin.archive.index');
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
                                <div class="d-flex align-items-center" >
                                    <input wire:model="{{ $is_update ? 'form.newFile' : 'form.file' }}" type="file" class="form-control form-control-solid" placeholder="Example input"/>
                                    @if ($is_update)
                                        <a target="_blank" href="{{ asset('storage/'. $form->file) }}" style="height: fit-content;" class="ml-5 btn btn-sm btn-outline-success">
                                            Preview
                                        </a>
                                    @endif
                                </div>
                                @error('form.file')
                                    <p class="text-danger mt-1" >{{ $message  }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Nama</label>
                                <input wire:model="form.name" type="text" class="form-control form-control-solid" placeholder="Example input"/>
                                @error('form.name')
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
                                    <option value="" >-- Pilih Jurusan --</option>
                                    <option value="Teknik Informatika" >Teknik Informatika</option>
                                    <option value="Teknik Arsitektur" >Teknik Arsitektur</option>
                                    <option value="Teknik Perencanaan Wilayah dan Kota" >Teknik Perencanaan Wilayah dan Kota</option>
                                    <option value="Matematika" >Matematika</option>
                                    <option value="Sistem Informasi" >Sistem Informasi</option>
                                    <option value="Biologi" >Biologi</option>
                                    <option value="Fisika" >Fisika</option>
                                    <option value="Kimia" >Kimia</option>
                                    <option value="Peternakan" >Peternakan</option>
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
                                <input wire:model="form.title" type="text" class="form-control form-control-solid" placeholder="Example input"/>
                                @error('form.title')
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
                        <div class="col-6">
                            <div class="form-group">
                                <label>Status Penyiangan</label>
                                <select wire:model="form.weeding" class="form-control form-control-solid">
                                    <option value="" >-- Pilih Status --</option>
                                    <option value="1" >Sudah</option>
                                    <option value="0" >Belum</option>
                                </select>
                                @error('form.weeding')
                                    <p class="text-danger mt-1" >{{ $message  }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Tanggal Penyiangan</label>
                                <input wire:model="form.weeding_date" type="date" class="form-control form-control-solid" placeholder="Example input"/>
                                @error('form.weeding_date')
                                    <p class="text-danger mt-1" >{{ $message  }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group ">
                                <label >Subjek </label>
                                <div wire:ignore >
                                    <input id="subject_tagify" class="form-control form-control-solid tagify" name='tags' placeholder='ketik lalu tekan enter...' autofocus="" />
                                </div>
                                @error('form.subjects')
                                    <p class="text-danger mt-1" >{{ $message  }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group ">
                                <label >Pembimbing</label>
                                <div wire:ignore >
                                    <input id="instructor_tagify" class="form-control form-control-solid tagify" name='tags' placeholder='ketik lalu tekan enter...' autofocus="" />
                                </div>
                                @error('form.instructors')
                                    <p class="text-danger mt-1" >{{ $message  }}</p>
                                @enderror
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
                <a href="/admin/archive" class="btn btn-outline-primary">
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
        const input1 = document.getElementById('subject_tagify')
        const input2 = document.getElementById('instructor_tagify')
        const subjectTagify = new Tagify(input1)
        const instructorTagify = new Tagify(input2)

        subjectTagify
        .on('add', (e) => {
            $wire.form.subjects = e.detail.tagify.value.map(e => e.value)
        })
        .on('remove', (e) => {
            $wire.form.subjects = e.detail.tagify.value.map(e => e.value)
        })

        instructorTagify
        .on('add', (e) => {
            $wire.form.instructors = e.detail.tagify.value.map(e => e.value)
        })
        .on('remove', (e) => {
            $wire.form.instructors = e.detail.tagify.value.map(e => e.value)
        })


        $wire.on('init-tagify', ([instructors, subjects]) => {
            instructorTagify.addTags(instructors)
            subjectTagify.addTags(subjects)
        })

    </script>
    @endscript

    @endvolt
</x-layouts.app>