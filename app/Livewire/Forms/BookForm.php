<?php

namespace App\Livewire\Forms;

use App\Models\Book;
use Livewire\Attributes\Validate;
use Livewire\Form;

class BookForm extends Form
{
    public ?Book $book;

    #[Validate('nullable', message: 'File harus diisi')]
    public $newFile;
    
    #[Validate('required', message: 'File harus diisi')]
    public $file;

    #[Validate('nullable')]
    public $newCover;

    #[Validate('required', message: 'Sampul harus diisi')]
    public $cover;

    #[Validate('required', message: 'Judul harus diisi')]
    public $title;
    
    #[Validate('required', message: 'Tipe buku harus diisi')]
    public $type;

    #[Validate('required', message: 'No Klasifikasi harus diisi')]
    public $classification_number;
    
    #[Validate('required', message: 'Pengarang harus diisi')]
    public $author;
    
    #[Validate('required', message: 'Penerbit harus diisi')]
    public $publisher;
    
    #[Validate('required', message: 'ISBN/ISSN harus diisi')]
    public $isbn;
    
    #[Validate('required', message: 'Tipe media harus diisi')]
    public $media_type;
    
    #[Validate('required', message: 'Edisi subjek harus diisi')]
    public $edition;
    
    #[Validate('required', message: 'Detail info harus diisi')]
    public $detail_info;
    
    #[Validate('required', message: 'Bahasa harus diisi')]
    public $languange;
    
    #[Validate('required', message: 'Tipe isi harus diisi')]
    public $content_type;
    
    #[Validate('required', message: 'Deskripsi fisik harus diisi')]
    public $description;


    public function setModel(Book $book){
        $this->book = $book;
        $this->fill($book);
    }

    public function store(){

        try {
            $book = $this->except('book');
            $book['file'] = $this->file->store('books');
            $book['cover'] = $this->cover->store('books');
            Book::create($book);
        } catch (\Throwable $th) {
            throw $th;
        }

    }

    public function update(){

        try {
            $book = $this->except('book', 'newFile', 'newCover');
            if($this->newFile) $book['file'] = $this->newFile->store('books');
            if($this->newCover) $book['cover'] = $this->newCover->store('books');
            $this->book->update($book);
        } catch (\Throwable $th) {
            throw $th;
        }

    }



}
