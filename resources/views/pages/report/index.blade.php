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

<x-layouts.app>
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
                        <span class="svg-icon svg-icon-primary svg-icon-3x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo2\dist/../src/media/svg/icons\Communication\Address-card.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon points="0 0 24 0 24 24 0 24"/>
                                <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                            </g>
                        </svg><!--end::Svg Icon--></span>
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
                        <span class="svg-icon svg-icon-primary svg-icon-3x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo2\dist/../src/media/svg/icons\Communication\Address-card.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon points="0 0 24 0 24 24 0 24"/>
                                <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                            </g>
                        </svg><!--end::Svg Icon--></span>
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
                        <span class="svg-icon svg-icon-primary svg-icon-3x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo2\dist/../src/media/svg/icons\Communication\Address-card.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon points="0 0 24 0 24 24 0 24"/>
                                <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                            </g>
                        </svg><!--end::Svg Icon--></span>
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
    </div>
    @endvolt
</x-layouts.app>