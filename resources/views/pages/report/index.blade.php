<?php 

use function Livewire\Volt\{state, with, usesPagination, mount};
use App\Models\Visitor;

usesPagination();

state([
    'perpage' => 10,
    'keyword' => '',
    'male_count' => 0,
    'female_count' => 0,
    'major' => null,
    'start_date' => null,
    'end_date' => null,
]);

mount(function () {
    $this->male_count = Visitor::where('gender', 'L')->count();
    $this->female_count = Visitor::where('gender', 'P')->count(); 
});

$reset_filter = function (){
    $this->reset('major', 'start_date', 'end_date');  
};

with(fn() => [
    'data' => Visitor::
    when(!empty($this->major), function($q){
            $q->where('major',$this->major);
    })
    ->when(!empty($this->start_date), function($q){
            $q->whereDate('created_at', '>', $this->start_date);
    })
    ->when(!empty($this->end_date), function($q){
            $q->whereDate('created_at', '<', $this->end_date);
    })
    ->latest()
    ->paginate($this->perpage)
]);

?>

<x-layouts.app pageTitle="Report" :breadcrumbs="['Report']" >
    @volt
    <div class="container">

        <div class="card card-custom mb-5">
            <div class="card-body">
                <div class="row align-items-end">
                    <div class="col-md col-xs-12">
                        <div class="form-group mb-0 ">
                            <label>Jurusan</label>
                            <select name="major" wire:model.live="major" class="form-control form-control-lg form-control-solid" id="">
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
                            <input type="date" wire:model.live="start_date" class="form-control form-control-lg form-control-solid"  placeholder="Enter email"/>
                        </div>
                    </div>
                    <div class="col-md col-xs-12 mt-3 mt-md-0">
                        <div class="form-group mb-0">
                            <label>Sampai</label>
                            <input type="date" wire:model.live="end_date" class="form-control form-control-lg form-control-solid"  placeholder="Enter email"/>
                        </div>
                    </div>
                    <div class="col-md-2 col-xs-12 mt-6 mt-md-0">
                        <button type="button" wire:click="reset_filter" class="btn btn-outline-primary btn-lg btn-block">
                            Reset
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url({{ asset('assets/media/svg/shapes/abstract-1.svg') }})">
                    <!--begin::Body-->
                    <div class="card-body">
                        <span class="svg-icon svg-icon-primary svg-icon-3x">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#136C40" fill-rule="evenodd" d="M12 1.25a4.75 4.75 0 1 0 0 9.5a4.75 4.75 0 0 0 0-9.5M8.75 6a3.25 3.25 0 1 1 6.5 0a3.25 3.25 0 0 1-6.5 0M8 12.25a4.124 4.124 0 0 0-4.095 3.642l-.65 5.52a.75.75 0 0 0 1.49.176l.65-5.52a2.62 2.62 0 0 1 1.855-2.209v4.193c0 .899 0 1.648.08 2.242c.084.628.27 1.195.726 1.65c.455.456 1.022.642 1.65.726c.594.08 1.344.08 2.242.08h.104c.899 0 1.648 0 2.243-.08c.627-.084 1.194-.27 1.65-.726s.64-1.022.725-1.65c.08-.594.08-1.343.08-2.242v-4.193a2.62 2.62 0 0 1 1.856 2.208l.65 5.52a.75.75 0 1 0 1.489-.175l-.65-5.52A4.124 4.124 0 0 0 16 12.25zM8.75 18v-4.25h6.5V18c0 .964-.002 1.612-.066 2.095c-.062.461-.17.659-.3.789s-.328.237-.79.3c-.482.064-1.13.066-2.094.066s-1.611-.002-2.095-.067c-.461-.062-.659-.169-.789-.3s-.237-.327-.3-.788c-.064-.483-.066-1.131-.066-2.095" clip-rule="evenodd"/></svg>
                        </span>
                        <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">{{ $male_count }}</span>
                        <span class="font-weight-bold text-muted font-size-sm">Laki Laki</span>
                    </div>
                    <!--end::Body-->
                </div>
            </div>
            <div class="col">
                <div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url(assets/media/svg/shapes/abstract-1.svg)">
                    <!--begin::Body-->
                    <div class="card-body">
                        <span class="svg-icon svg-icon-primary svg-icon-3x">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="#136C40" fill-rule="evenodd" clip-rule="evenodd"><path d="M12 1.25a4.75 4.75 0 1 0 0 9.5a4.75 4.75 0 0 0 0-9.5M8.75 6a3.25 3.25 0 1 1 6.5 0a3.25 3.25 0 0 1-6.5 0"/><path d="M2.728 5.818a.75.75 0 1 0-1.455.364l.382 1.528a8.21 8.21 0 0 0 5.595 5.869v4.473c0 .899 0 1.648.08 2.242c.084.628.27 1.195.726 1.65c.455.456 1.022.642 1.65.726c.595.08 1.344.08 2.242.08h.104c.899 0 1.648 0 2.243-.08c.627-.084 1.194-.27 1.65-.726s.64-1.022.725-1.65c.08-.594.08-1.343.08-2.242v-4.193a2.62 2.62 0 0 1 1.856 2.208l.65 5.52a.75.75 0 1 0 1.489-.175l-.65-5.52A4.124 4.124 0 0 0 16 12.25H8.085A6.71 6.71 0 0 1 3.11 7.346zM8.75 18v-4.25h6.5V18c0 .964-.001 1.612-.066 2.095c-.062.461-.17.659-.3.789s-.328.237-.79.3c-.482.064-1.13.066-2.094.066s-1.611-.002-2.094-.067c-.462-.062-.66-.169-.79-.3s-.237-.327-.3-.788c-.064-.483-.066-1.131-.066-2.095"/></g></svg>
                        </span>
                        <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">{{ $female_count }}</span>
                        <span class="font-weight-bold text-muted font-size-sm">Perempuan</span>
                    </div>
                    <!--end::Body-->
                </div>
            </div>
            <div class="col">
                <div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url(assets/media/svg/shapes/abstract-1.svg)">
                    <!--begin::Body-->
                    <div class="card-body">
                        <span class="svg-icon svg-icon-primary svg-icon-3x">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="#136C40" stroke-width="1.5"><circle cx="9" cy="6" r="4"/><path stroke-linecap="round" d="M15 9a3 3 0 1 0 0-6"/><ellipse cx="9" cy="17" rx="7" ry="4"/><path stroke-linecap="round" d="M18 14c1.754.385 3 1.359 3 2.5c0 1.03-1.014 1.923-2.5 2.37"/></g></svg>
                        </span>
                        <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">{{ $male_count + $female_count }}</span>
                        <span class="font-weight-bold text-muted font-size-sm">Total</span>
                    </div>
                    <!--end::Body-->
                </div>
            </div>
        </div>

        <div class="card card-custom">
            <div class="card-body">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Tanggal</th>
                            <th>Mahasiswa</th>
                            <th>Jenis Kelamin</th>
                            <th>Jurusan</th>
                            <th>Kepentingan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $i => $item)
                        <tr>
                            <td style="align-content: center;" >{{ $i+1 }}</td>
                            <td style="align-content: center;" >{{ $item->created_at }}</td>
                            <td style="align-content: center;" >{{ $item->name }}</td>
                            <td style="align-content: center;" >{{ $item->gender == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                            <td style="align-content: center;" >{{ $item->major }}</td>
                            <td style="align-content: center;" >{{ $item->needs }}</td>
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