<?php 

use function Livewire\Volt\{state, with, usesPagination};
use App\Models\Archive;

usesPagination();

state([
    'perpage' => 10,
    'keyword' => '',
]);

with(fn() => [
    'data' => Archive::
    when(!empty($this->keyword), function($q){
        $q->where('title', 'LIKE', "%$this->keyword%");
    })
    ->latest()
    ->paginate($this->perpage)
]);

$delete_data = function (Archive $archive){
    try {
        $archive->delete();
    } catch (\Throwable $th) {
        throw $th;
    }  
};

?>

<x-layouts.app pageTitle="Daftar Arsip Skripsi" :breadcrumbs="['Arsip Skripsi', 'Daftar Arsip Skripsi'] " >
    @volt
    <div class="container">
        <div class="card card-custom">
            <div class="card-header">
                <div class="card-title">
                    Daftar Arsip
                </div>
                <div class="card-toolbar">
                    <a href="{{ route('admin.archive.create') }}" class="btn btn-primary">
                        Tambah Data
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Jurusan</th>
                            <th>Tahun Lulus</th>
                            <th>Penyiangan</th>
                            <th>Skripsi</th>
                            <th class="text-right" >Aksi</th.>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $i => $item)
                        <tr>
                            <td style="align-content: center;" >{{ $i+1 }}</td>
                            <td style="align-content: center;" >
                                <span class="d-block font-weight-bold" >{{ $item->name }}</span>
                                <span>{{ $item->nim }}</span>
                            </td>
                            <td style="align-content: center;" >{{ $item->major }}</td>
                            <td style="align-content: center;" >{{ $item->graduation_year }}</td>
                            <td style="align-content: center; width: 120px;" >{{ $item->weeding ? 'Ya' : 'Tidak' }}</td>
                            <td style="align-content: center; width: 210px;" >{{ $item->title }}</td>
                            <td style="align-content: center;"  class="text-right" >
                                <button type="button" wire:click="delete_data('{{ $item->id }}')" wire:confirm="Apakah yakin data ini ingin dihapus?"  class="btn btn-sm btn-light-danger mr-2">
                                    Hapus
                                </button>
                                <a href="/admin/archive/detail/{{ $item->id }}" class="btn btn-sm btn-light-primary">
                                    Detail
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="d-flex justify-content-between align-items-center flex-wrap py-2 mt-1">
            <div class="d-flex align-items-center py-3">
                <select wire:model.live="perpage" class="form-control form-control-sm text-primary font-weight-bold mr-4 border-0 bg-white" style="width: 75px;">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                </select>
                <span class="text-primary">Menampilkan {{ $data->links()->paginator->count() }} dari {{ $data->links()->paginator->total() }} data</span>
            </div>
            {{ $data->links('components.pagination') }}
        </div>
    </div>
    @endvolt
</x-layouts.app>