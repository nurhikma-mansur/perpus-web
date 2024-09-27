<?php

namespace App\Livewire\Forms;

use App\Models\Archive;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ArchiveForm extends Form
{

    public ?Archive $archive;

    #[Validate('nullable')]
    public $newFile;

    #[Validate('required', message: 'File harus diisi')]
    public $file;
    
    #[Validate('required', message: 'Nama harus diisi')]
    public $title;
    
    #[Validate('required', message: 'NIM harus diisi')]
    public $nim;
    
    #[Validate('required', message: 'Jurusan harus diisi')]
    public $major;
    
    #[Validate('required', message: 'Tahun lulus harus diisi')]
    public $graduation_year;
    
    #[Validate('required', message: 'Judul skirpsi harus diisi')]
    public $skrip_title;
    
    #[Validate('required', message: 'Nomor klasifikasi harus diisi')]
    public $classification_number;
    
    #[Validate('required', message: 'Abstrak harus diisi')]
    public $abstract;

    public function setModel(Archive $archive){
        $this->archive = $archive;
        $this->fill($archive);
    }

    public function store(){

        try {
            $archive = $this->except('archive');
            $archive['file'] = $this->file->store('archives');
            Archive::create($archive);
        } catch (\Throwable $th) {
            throw $th;
        }

    }

    public function update(){

        try {
            $archive = $this->except('archive');
            if($this->newFile) $archive['file'] = $this->newFile->store('archives');
            $this->archive->update($archive);
        } catch (\Throwable $th) {
            throw $th;
        }

    }

}
