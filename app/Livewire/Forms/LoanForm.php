<?php

namespace App\Livewire\Forms;

use App\Models\Loan;
use Livewire\Attributes\Validate;
use Livewire\Form;

class LoanForm extends Form
{
    public ?Loan $loan;

    #[Validate('required', message: 'Judul Buku harus diisi')]
    public $title;
    
    #[Validate('required', message: 'NIM harus diisi')]
    public $nim;
    
    #[Validate('required', message: 'Jurusan harus diisi')]
    public $major;   

    #[Validate('required', message: 'Nama harus diisi')]
    public $fullname;

    #[Validate('required', message: 'Semester harus diisi')]
    public $semester;

    #[Validate('required', message: 'Tanggal Pinjam harus diisi')]
    public $start_date;

    #[Validate('nullable', message: 'Tanggal Kembali harus diisi')]
    public $end_date;

    public function setModel(Loan $loan){
        $this->loan = $loan;
        $this->fill($loan);
    }

    public function store(){

        try {
            $loan = $this->except('loan');
            Loan::create($loan);
        } catch (\Throwable $th) {
            throw $th;
        }

    }

    public function update(){

        try {
            $loan = $this->except('loan');
            $this->loan->update($loan);
        } catch (\Throwable $th) {
            throw $th;
        }

    }

}
