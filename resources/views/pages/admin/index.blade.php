<?php 

use function Livewire\Volt\{state, with, usesPagination};
use App\Models\User;

usesPagination();

state([
    'perpage' => 10,
    'keyword' => '',
]);

with(fn() => [
    'data' => User::
    when(!empty($this->keyword), function($q){
        $q->where('title', 'LIKE', "%$this->keyword%");
    })
    ->latest()
    ->paginate($this->perpage)
]);

$delete_data = function (User $user){
    try {
        $user->delete();
    } catch (\Throwable $th) {
        throw $th;
    }  
};

?>

<x-layouts.app pageTitle="Daftar Admin" :breadcrumbs="['Master Data', 'Daftar Admin'] " >
    @volt
    <div class="container">
        <div class="card card-custom">
            <div class="card-header">
                <div class="card-title">
                    Daftar Admin
                </div>
                <div class="card-toolbar">
                    <a href="{{ route('admin.master-data.admin.create') }}" class="btn btn-primary">
                        Tambah Data
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Status</th>
                            <th class="text-right" >Aksi</th.>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $i => $item)
                        <tr>
                            <td style="align-content: center;" >{{ $i+1 }}</td>
                            <td style="align-content: center;" >{{ $item->name }}</td>
                            <td style="align-content: center;" >{{ $item->username }}</td>
                            <td style="align-content: center;" >{{ $item->is_admin ? 'Admin' : 'Mahasiswa' }}</td>
                            <td style="align-content: center;"  class="text-right" >
                                <button type="button" wire:click="delete_data('{{ $item->id }}')" wire:confirm="Apakah yakin data ini ingin dihapus?"  class="btn btn-sm btn-light-danger mr-2">
                                    Hapus
                                </button>
                                <a href="/admin/master-data/admin/detail/{{ $item->id }}" class="btn btn-sm btn-light-primary">
                                    Detail
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $data->links('components.pagination') }}
            </div>
        </div>
    </div>
    @endvolt
</x-layouts.app>