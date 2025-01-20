<?php 

use function Livewire\Volt\{state, with, usesPagination};
use App\Models\Book;

usesPagination();

state([
    'perpage' => 12,
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

<x-layouts.student pageTitle="Daftar Buku" >
    @volt
    <div class="container">
        {{-- <div class="card card-custom">
            <div class="card-body">
                <div class="row align-items-end">
                    <div class="col-md col-xs-12">
                        <div class="form-group mb-0 ">
                            <label>Jurusan</label>
                            <select name="" class="form-control form-control-lg form-control-solid" id="">
                                <option value="">-- pilih jurusan --</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md col-xs-12 mt-3 mt-md-0">
                        <div class="form-group mb-0">
                            <label>Dari</label>
                            <input type="date" class="form-control form-control-lg form-control-solid"  placeholder="Enter email"/>
                        </div>
                    </div>
                    <div class="col-md col-xs-12 mt-3 mt-md-0">
                        <div class="form-group mb-0">
                            <label>Sampai</label>
                            <input type="date" class="form-control form-control-lg form-control-solid"  placeholder="Enter email"/>
                        </div>
                    </div>
                    <div class="col-md-2 col-xs-12 mt-6 mt-md-0">
                        <button class="btn btn-primary btn-lg btn-block">
                            Filter
                        </button>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="card card-custom py-0 mb-7">
            <div class="card-body py-0">
                <div class="d-flex flex-md-row flex-column justify-content-md-between align-items-md-center align-items-start my-8">
                    <h2 class="mb-0" >Daftar Ebook</h2>
                    <div class="" >
                        <input style="width: 280px;" type="text" class="form-control form-control-lg"  placeholder="Cari..."/>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach ($data as $i => $item)
            <div class="col-md-3 col-xl-3 col-sm-6 col-xs-12 mb-9">
                <div class="card card-custom" >
                    <div class=" p-6" >
                        <img style="width: 100%; height: 250px; object-fit: contain" src="{{ asset('storage/'.$item->cover) }}" alt="">
                    </div>
                    <div class="px-6 py-2" >
                        <h5 class="h6 m-0 mb-5">
                            {{ $item->title }}
                            <small class="d-block text-dark mt-2 mb-0" >{{ $item->author }}</small>
                        </h5>
                        <div class="row mb-5">
                            <div class="col">
                                <a href="{{ asset('storage/'.$item->file) }}" target="_blank" class="btn btn-block btn-primary">
                                    Baca
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="card card-custom">
                    <div class="card-header py-4">
                        <div class="card-title">
                            <h5 class="h6 m-0">
                                {{ $item->title }}
                                <small class="d-block text-dark mt-2 mb-0" >{{ $item->author }}</small>
                            </h5>
                        </div>
                    </div>
                    <div class="card-body py-6">
                        <img style="width: 100%; height: 250px; object-fit: cover" src="{{ asset('storage/'.$item->cover) }}" alt="">
                    </div>
                    <div class="card-footer py-4">
                        <div class="row">
                            <div class="col">
                                <a href="{{ asset('storage/'.$item->file) }}" target="_blank" class="btn btn-block btn-primary">
                                    Baca
                                </a>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-between align-items-center flex-wrap py-2 mt-1">
            <div class="d-flex align-items-center py-3">
                <select wire:model.live="perpage" class="form-control form-control-sm text-primary font-weight-bold mr-4 border-0 bg-white" style="width: 75px;">
                    <option value="12">12</option>
                    <option value="24">24</option>
                    <option value="28">28</option>
                </select>
                <span class="text-primary">Menampilkan {{ $data->links()->paginator->count() }} dari {{ $data->links()->paginator->total() }} data</span>
            </div>
            {{ $data->links('components.pagination') }}
        </div>

    </div>
    @endvolt
</x-layouts.student>