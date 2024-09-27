<?php 

use function Livewire\Volt\{state, with, usesPagination};
use App\Models\Book;

usesPagination();

state([
    'perpage' => 10,
    'keyword' => '',
]);

with(fn() => [
    'data' => Book::
    when(!empty($this->keyword), function($q){
        $q->where('title', 'LIKE', "%$this->keyword%");
    })
    ->latest()
    ->paginate($this->perpage)
]);

$delete_data = function (Book $book){
    try {
        $book->delete();
    } catch (\Throwable $th) {
        throw $th;
    }  
};

?>

<x-layouts.app>
    @volt
    <div class="container">
        <div class="card card-custom">
            <div class="card-header">
                <div class="card-title">
                    Daftar Buku
                </div>
                <div class="card-toolbar">
                    <a href="{{ route('admin.book.create') }}" class="btn btn-primary">
                        Tambah Data
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>Nomor Klasifikasi</th>
                            <th class="text-right" >Aksi</th.>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $i => $item)
                        <tr>
                            <td style="align-content: center;" >{{ $i+1 }}</td>
                            <td style="align-content: center;" >{{ $item->title }}</td>
                            <td style="align-content: center;" >{{ $item->author }}</td>
                            <td style="align-content: center;" >{{ $item->classification_number }}</td>
                            <td style="align-content: center;"  class="text-right" >
                                <button type="button" wire:click="delete_data('{{ $item->id }}')" wire:confirm="Apakah yakin data ini ingin dihapus?"  class="btn btn-sm btn-light-danger mr-2">
                                    Hapus
                                </button>
                                <a href="/admin/book/detail/{{ $item->id }}" class="btn btn-sm btn-light-primary">
                                    Detail
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endvolt
</x-layouts.app>