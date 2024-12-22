<?php

use function Livewire\Volt\{state, form, usesFileUploads, mount};
use App\Models\Visitor;
use App\Models\Book;
use App\Models\User;
use App\Models\Archive;

state(['book_count', 'archive_count', 'admin_count', 'female_count', 'male_count']);

mount(function (){
    $this->male_count = Visitor::where('gender', 'L')->count();
    $this->female_count = Visitor::where('gender', 'P')->count(); 
    $this->book_count = Book::count();
    $this->archive_count = Archive::count();
    $this->admin_count = User::where('role', 'admin')->count();
});

?>

<x-layouts.app>
    @volt
    <div class="container">
        <div class="row">
            <div class="col col-4">
                <div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url({{ asset('assets/media/svg/shapes/abstract-1.svg') }})">
                    <!--begin::Body-->
                    <div class="card-body">
                        <span class="svg-icon svg-icon-primary svg-icon-3x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo2\dist/../src/media/svg/icons\Communication\Address-card.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="#136C40" stroke-width="1.5"><path d="M4 8c0-2.828 0-4.243.879-5.121C5.757 2 7.172 2 10 2h4c2.828 0 4.243 0 5.121.879C20 3.757 20 5.172 20 8v8c0 2.828 0 4.243-.879 5.121C18.243 22 16.828 22 14 22h-4c-2.828 0-4.243 0-5.121-.879C4 20.243 4 18.828 4 16z"/><path d="M19.898 16h-12c-.93 0-1.395 0-1.777.102A3 3 0 0 0 4 18.224"/><path stroke-linecap="round" d="M8 7h8m-8 3.5h5m6.5 8.5H8" opacity="0.5"/></g></svg>
                        <!--end::Svg Icon-->
                        </span>
                        <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">{{ $book_count }}</span>
                        <span class="font-weight-bold text-muted font-size-sm">Total E-Book</span>
                    </div>
                    <!--end::Body-->
                </div>
            </div>
            <div class="col col-4">
                <div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url({{ asset('assets/media/svg/shapes/abstract-1.svg') }})">
                    <!--begin::Body-->
                    <div class="card-body">
                        <span class="svg-icon svg-icon-primary svg-icon-3x">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="#136C40" stroke-linecap="round" stroke-width="1.5"><path d="M4 15h2.301c.809 0 1.213 0 1.576.148q.049.02.098.043c.354.167.628.464 1.175 1.059l.035.038c.513.557.769.835 1.096 1q.092.046.188.082c.343.13.72.13 1.477.13c.715 0 1.073 0 1.4-.117q.091-.033.18-.075c.314-.148.567-.401 1.073-.907l.23-.23c.577-.577.866-.866 1.234-1.019S16.84 15 17.657 15H20"/><path d="M5 15v-1.5A1.5 1.5 0 0 1 6.5 12h8.25m2.75 0a1.5 1.5 0 0 1 1.5 1.5V15"/><path d="M5 14v-3.5A1.5 1.5 0 0 1 6.5 9H10m9 5v-3.5A1.5 1.5 0 0 0 17.5 9H14"/><path d="M5 11V7.5A1.5 1.5 0 0 1 6.5 6M19 11V7.5A1.5 1.5 0 0 0 17.5 6H9.25"/><path d="M22 12c0 4.714 0 7.071-1.465 8.535C19.072 22 16.714 22 12 22s-7.071 0-8.536-1.465C2 19.072 2 16.714 2 12s0-7.071 1.464-8.536C4.93 2 7.286 2 12 2s7.071 0 8.535 1.464c.974.974 1.3 2.343 1.41 4.536"/></g></svg>
                        </span>
                        <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">{{ $archive_count }}</span>
                        <span class="font-weight-bold text-muted font-size-sm">Total Arsip Skripsi</span>
                    </div>
                    <!--end::Body-->
                </div>
            </div>
            <div class="col col-4">
                <div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url({{ asset('assets/media/svg/shapes/abstract-1.svg') }})">
                    <!--begin::Body-->
                    <div class="card-body">
                        <span class="svg-icon svg-icon-primary svg-icon-3x">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="#136C40" stroke-width="1.5"><circle cx="12" cy="9" r="2"/><path d="M16 15c0 1.105 0 2-4 2s-4-.895-4-2s1.79-2 4-2s4 .895 4 2Z"/><path stroke-linecap="round" d="M3 10.417c0-3.198 0-4.797.378-5.335c.377-.537 1.88-1.052 4.887-2.081l.573-.196C10.405 2.268 11.188 2 12 2s1.595.268 3.162.805l.573.196c3.007 1.029 4.51 1.544 4.887 2.081C21 5.62 21 7.22 21 10.417v1.574c0 2.505-.837 4.437-2 5.913M3.193 14c.857 4.298 4.383 6.513 6.706 7.527c.721.315 1.082.473 2.101.473c1.02 0 1.38-.158 2.101-.473c.579-.252 1.231-.58 1.899-.994"/></g></svg>
                        </span>
                        <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">{{ $admin_count }}</span>
                        <span class="font-weight-bold text-muted font-size-sm">Total Admin</span>
                    </div>
                    <!--end::Body-->
                </div>
            </div>
            <div class="col">
                <div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url({{ asset('assets/media/svg/shapes/abstract-1.svg') }})">
                    <!--begin::Body-->
                    <div class="card-body">
                        <span class="svg-icon svg-icon-primary svg-icon-3x">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#136C40" fill-rule="evenodd" d="M12 1.25a4.75 4.75 0 1 0 0 9.5a4.75 4.75 0 0 0 0-9.5M8.75 6a3.25 3.25 0 1 1 6.5 0a3.25 3.25 0 0 1-6.5 0M8 12.25a4.124 4.124 0 0 0-4.095 3.642l-.65 5.52a.75.75 0 0 0 1.49.176l.65-5.52a2.62 2.62 0 0 1 1.855-2.209v4.193c0 .899 0 1.648.08 2.242c.084.628.27 1.195.726 1.65c.455.456 1.022.642 1.65.726c.594.08 1.344.08 2.242.08h.104c.899 0 1.648 0 2.243-.08c.627-.084 1.194-.27 1.65-.726s.64-1.022.725-1.65c.08-.594.08-1.343.08-2.242v-4.193a2.62 2.62 0 0 1 1.856 2.208l.65 5.52a.75.75 0 1 0 1.489-.175l-.65-5.52A4.124 4.124 0 0 0 16 12.25zM8.75 18v-4.25h6.5V18c0 .964-.002 1.612-.066 2.095c-.062.461-.17.659-.3.789s-.328.237-.79.3c-.482.064-1.13.066-2.094.066s-1.611-.002-2.095-.067c-.461-.062-.659-.169-.789-.3s-.237-.327-.3-.788c-.064-.483-.066-1.131-.066-2.095" clip-rule="evenodd"/></svg>
                        </span>
                        <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">{{ $male_count }}</span>
                        <span class="font-weight-bold text-muted font-size-sm">Pengunjung Laki Laki</span>
                    </div>
                    <!--end::Body-->
                </div>
            </div>
            <div class="col">
                <div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url({{ asset('assets/media/svg/shapes/abstract-1.svg') }})">
                    <!--begin::Body-->
                    <div class="card-body">
                        <span class="svg-icon svg-icon-primary svg-icon-3x">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="#136C40" fill-rule="evenodd" clip-rule="evenodd"><path d="M12 1.25a4.75 4.75 0 1 0 0 9.5a4.75 4.75 0 0 0 0-9.5M8.75 6a3.25 3.25 0 1 1 6.5 0a3.25 3.25 0 0 1-6.5 0"/><path d="M2.728 5.818a.75.75 0 1 0-1.455.364l.382 1.528a8.21 8.21 0 0 0 5.595 5.869v4.473c0 .899 0 1.648.08 2.242c.084.628.27 1.195.726 1.65c.455.456 1.022.642 1.65.726c.595.08 1.344.08 2.242.08h.104c.899 0 1.648 0 2.243-.08c.627-.084 1.194-.27 1.65-.726s.64-1.022.725-1.65c.08-.594.08-1.343.08-2.242v-4.193a2.62 2.62 0 0 1 1.856 2.208l.65 5.52a.75.75 0 1 0 1.489-.175l-.65-5.52A4.124 4.124 0 0 0 16 12.25H8.085A6.71 6.71 0 0 1 3.11 7.346zM8.75 18v-4.25h6.5V18c0 .964-.001 1.612-.066 2.095c-.062.461-.17.659-.3.789s-.328.237-.79.3c-.482.064-1.13.066-2.094.066s-1.611-.002-2.094-.067c-.462-.062-.66-.169-.79-.3s-.237-.327-.3-.788c-.064-.483-.066-1.131-.066-2.095"/></g></svg>
                        </span>
                        <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">{{$female_count}}</span>
                        <span class="font-weight-bold text-muted font-size-sm">Pengunjung Perempuan</span>
                    </div>
                    <!--end::Body-->
                </div>
            </div>
        </div>
        
    </div>
    @endvolt
</x-layouts.app>