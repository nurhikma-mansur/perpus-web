<?php

use function Livewire\Volt\{state, form, usesFileUploads, mount};
use App\Models\Book;
use App\Models\Archive;

state(['book_count', 'archive_count', 'latest']);

mount(function (){
    $this->latest = Book::limit(3)->get(); 
    $this->book_count = Book::count();
    $this->archive_count = Archive::count();
});
?>
<x-layouts.student>
    @volt
    <div class="container" >
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col-12">
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
                    <div class="col-12">
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
                </div>
            </div>
            <div class="col-7">
                <div class="card card-custom">
                    <div class="card-header">
                        <div class="card-title">
                            Daftar E Book Terbaru
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Judul</th>
                                    <th>Penulis</th>
                                    <th>Penerbit</th>
                                    <th class="text-right" >Aksi</th.>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($latest as $i => $l)
                                <tr>
                                    <td style="align-content: center;" >{{ $i+1 }}</td>
                                    <td style="align-content: center;" >{{ $l->title }}</td>
                                    <td style="align-content: center;" >{{ $l->author }}</td>
                                    <td style="align-content: center;" >{{ $l->publisher }}</td>
                                    <td style="align-content: center;"  class="text-right" >
                                        <a href="{{ asset('storage/'.$l->file) }}" target="_blank" class="btn btn-sm btn-light-primary">
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
        </div>
    </div>
    @endvolt
</x-layouts.student>