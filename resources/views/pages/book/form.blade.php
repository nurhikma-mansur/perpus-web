<?php

use function Livewire\Volt\{state, form, usesFileUploads, mount};
use App\Livewire\Forms\BookForm;
use App\Models\Book;
usesFileUploads();
form(BookForm::class);

state(['is_update' => false]);

mount(function (?Book $book = null){
    
    if($book->title){
        $this->is_update = true;
        $this->form->setModel($book);
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

        $this->redirectRoute('admin.book.index');
    } catch (\Throwable $th) {
        throw $th;
    }
    
};

?>

<x-layouts.app pageTitle="Form Buku" :breadcrumbs="['Buku Induk', 'Form Buku'] " >
    @volt
    <div class="container">
        <form wire:submit="submit" action="" enctype="application/x-www-form-urlencoded" >
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        Tambah Data
                    </div>
                    <div class="card-toolbar">
                        <a href="{{ route('admin.book.index') }}" class="btn btn-light-primary">
                            Kembali
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>File</label>
                                <input wire:model="form.file" type="file" class="form-control form-control-solid" placeholder="Example input"/>
                                @error('form.file')
                                    <p class="text-danger mt-1" >{{ $message  }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Sampul Buku</label>
                                <div class="d-flex align-items-center" >
                                    <input wire:model.live="{{ $is_update ? 'form.newCover' : 'form.cover' }}" type="file" class="form-control form-control-solid" placeholder="Sampul Buku"/>
                                    @if ($is_update)
                                    <a target="_blank" href="{{ asset('storage/'. $form->cover) }}" style="height: fit-content;" class="ml-5 btn btn-sm btn-outline-success">
                                        Preview
                                    </a>
                                    @endif
                                    @if (!$is_update && $form->cover)
                                    <a target="_blank" href="{{ $form->cover->temporaryUrl() }}" style="height: fit-content;" class="ml-5 btn btn-sm btn-outline-success">
                                        Preview
                                    </a>
                                    @endif
                                    @if ($is_update && $form->newCover)
                                    <a target="_blank" href="{{ $form->newCover->temporaryUrl() }}" style="height: fit-content;" class="ml-5 btn btn-sm btn-outline-success">
                                        Preview
                                    </a>
                                    @endif
                                </div>
                                @error('form.cover')
                                    <p class="text-danger mt-1" >{{ $message  }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Judul Buku</label>
                                <input wire:model="form.title" type="text" class="form-control form-control-solid" placeholder="Judul Buku "/>
                                @error('form.title')
                                    <p class="text-danger mt-1" >{{ $message  }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Tipe Buku</label>
                                <select wire:model="form.type" class="form-control form-control-solid">
                                    <option>-- Jenis Buku --</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                                @error('form.type')
                                    <p class="text-danger mt-1" >{{ $message  }}</p>
                                @enderror
                                
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>No Klasifikasi</label>
                                <input wire:model="form.classification_number" type="text" class="form-control form-control-solid" placeholder="No Klasifikasi"/>
                                @error('form.classification_number')
                                    <p class="text-danger mt-1" >{{ $message  }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Pengarang</label>
                                <input wire:model="form.author" type="text" class="form-control form-control-solid" placeholder="Pengarang"/>
                                @error('form.author')
                                    <p class="text-danger mt-1" >{{ $message  }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Penerbit</label>
                                <input wire:model="form.publisher" type="text" class="form-control form-control-solid" placeholder="Penerbit"/>
                                @error('form.publisher')
                                    <p class="text-danger mt-1" >{{ $message  }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Bahasa</label>
                                <input wire:model="form.languange" type="text" class="form-control form-control-solid" placeholder="Bahasa"/>
                                @error('form.languange')
                                    <p class="text-danger mt-1" >{{ $message  }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>ISBN/ISSN</label>
                                <input wire:model="form.isbn" type="text" class="form-control form-control-solid" placeholder="ISBN/ISSN"/>
                                @error('form.isbn')
                                    <p class="text-danger mt-1" >{{ $message  }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Tipe Isi</label>
                                <input wire:model="form.content_type" type="text" class="form-control form-control-solid" placeholder="Tipe Isi"/>
                                @error('form.content_type')
                                    <p class="text-danger mt-1" >{{ $message  }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Tipe Media</label>
                                <input wire:model="form.media_type" type="text" class="form-control form-control-solid" placeholder="Tipe Media"/>
                                @error('form.media_type')
                                    <p class="text-danger mt-1" >{{ $message  }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Deskripsi Fisik</label>
                                <input wire:model="form.description" type="text" class="form-control form-control-solid" placeholder="Deskripsi Fisik"/>
                                @error('form.description')
                                    <p class="text-danger mt-1" >{{ $message  }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Edisi Subjek</label>
                                <input wire:model="form.edition" type="text" class="form-control form-control-solid" placeholder="Edisi Subjek"/>
                                @error('form.edition')
                                    <p class="text-danger mt-1" >{{ $message  }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Info detail spesifik & pernyataan tanggung jawab</label>
                                <textarea wire:model="form.detail_info" class="form-control form-control-solid" rows="3"></textarea>
                                @error('form.detail_info')
                                    <p class="text-danger mt-1" >{{ $message  }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end mt-5">
                <a href="/admin/book" class="btn btn-outline-primary">
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