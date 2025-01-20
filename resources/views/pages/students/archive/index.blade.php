<?php 

use function Livewire\Volt\{state, with, usesPagination, mount};
use App\Models\Archive;

usesPagination();

state([
    'perpage' => 6,
    'keyword' => '',
    'major' => null,
    'start_year' => null,
    'end_year' => null,
]);

mount(function () {
    $this->major = request()->query('major');
    $this->start_year = request()->query('start_year');
    $this->end_year = request()->query('end_year');
});

$filter = function () {
    $this->redirect('/archive'.'?major='.$this->major.'&start_year='.$this->start_year.'&end_year='.$this->end_year);
};

with(fn() => [
    'data' => Archive::
    when(!empty($this->keyword), function($q){
        $q->where('title', 'LIKE', "%$this->keyword%");
    })
    ->when(!empty($this->keyword), function($q){
        $q->where('name', 'LIKE', "%$this->keyword%");
    })
    ->when(!empty($this->keyword), function($q){
        $q->where('name', 'LIKE', "%$this->keyword%");
    })
    ->when(!empty($this->major), function($q){
        $q->where('major',$this->major);
    })
    ->when(!empty($this->start_year), function($q){
        $q->where('graduation_year', '>=',$this->start_year);
    })
    ->when(!empty($this->end_year), function($q){
        $q->where('graduation_year', '<=', $this->end_year);
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

$download = function (Archive $archive){
    return Storage::download($archive->file, $archive->filename);
};

?>

<x-layouts.student pageTitle="Arsip Skripsi" :breadcrumbs="['Arsip Skripsi']" >
    @volt
    <div class="container">
        <div class="card card-custom">
            <div class="card-body">
                <form wire:submit="filter" action="">
                    <div class="row align-items-end">
                        <div class="col-md col-xs-12">
                            <div class="form-group mb-0 ">
                                <label>Jurusan</label>
                                <select name="" wire:model="major" class="form-control form-control-lg form-control-solid" id="">
                                    <option value="">-- pilih jurusan --</option>
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
                            </div>
                        </div>
                        <div class="col-md col-xs-12 mt-3 mt-md-0">
                            <div class="form-group mb-0">
                                <label>Dari</label>
                                <input type="number" wire:model="start_year" class="form-control form-control-lg form-control-solid"  placeholder="Masukkan Tahun"/>
                            </div>
                        </div>
                        <div class="col-md col-xs-12 mt-3 mt-md-0">
                            <div class="form-group mb-0">
                                <label>Sampai</label>
                                <input type="number" wire:model="end_year" class="form-control form-control-lg form-control-solid"  placeholder="Masukkan Tahun"/>
                            </div>
                        </div>
                        <div class="col-md-2 col-xs-12 mt-6 mt-md-0">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                Filter
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="d-flex flex-md-row flex-column justify-content-md-between align-items-md-center align-items-start my-8">
            <h2>Daftar Skripsi</h2>
            <div class="" >
                <input wire:model.live="keyword" style="width: 280px;" type="text" class="form-control form-control-lg"  placeholder="Cari..."/>
            </div>
        </div>

        <div class="row">
            @foreach ($data as $i => $item)
            <div class="col-md-4 col-xl-4 col-sm-6 col-xs-12 mb-9">
                <div class="card card-custom">
                    <div class="card-header py-4">
                        <div class="card-title">
                            <h5 class="h6 m-0">
                                {{ $item->name }}
                                <small class="d-block text-dark mt-2 mb-0" >{{ $item->major }}</small>
                            </h5>
                        </div>
                    </div>
                    <div class="card-body py-6">
                        <div>
                            <p style="color: #464E5F;" class="mb-1" >Judul</p>
                            <p class="text-dark" >{{ $item->title }}</p>
                        </div>
                        <div class="my-3" >   
                            <p style="color: #464E5F;" class="mb-1" >Tahun Lulus</p>
                            <p class="text-dark" >{{ $item->graduation_year }}</p>
                        </div>
                        <div  >
                            <p style="color: #464E5F;" class="mb-1" >Subjek</p>
                            <div class="d-flex" >
                                @foreach ($item->subjects as $subject)
                                <span style="font-size: 12px;" class="label label-rounded label-inline label-light-dark mr-2">{{ $subject }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="card-footer py-4">
                        <div class="row">
                            <div class="col">
                                <a href="javscrpt:void(0)" wire:click="download({{ $item->id }})" class="btn btn-block btn-light-primary">
                                    Unduh
                                </a>
                            </div>
                            <div class="col">
                                <a href="{{ asset('storage/'.$item->file) }}" target="_blank" class="btn btn-block btn-primary">
                                    Baca
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-between align-items-center flex-wrap py-2 mt-1">
            <div class="d-flex align-items-center py-3">
                <select wire:model.live="perpage" class="form-control form-control-sm text-primary font-weight-bold mr-4 border-0 bg-white" style="width: 75px;">
                    <option value="6">6</option>
                    <option value="12">12</option>
                    <option value="24">24</option>
                </select>
                <span class="text-primary">Menampilkan {{ $data->links()->paginator->count() }} dari {{ $data->links()->paginator->total() }} data</span>
            </div>
            {{ $data->links('components.pagination') }}
        </div>

    </div>
    @endvolt
</x-layouts.student>