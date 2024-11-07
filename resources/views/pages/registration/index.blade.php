<?php 

use function Livewire\Volt\{state};
use App\Models\Visitor;

state([
    'name',
    'major',
    'needs',
    'gender'
]);

$submit = function (){

    $this->validate([
        'name' => 'required',
        'major' => 'required',
        'needs' => 'required',
        'gender' => 'required'
    ],[
        'name.required' => 'Nama harus diisi',
        'major.required' => 'Jurusan harus diisi',
        'needs.required' => 'Kepentingan harus diisi',
        'gender.required' => 'Jenis kelamin harus diisi'
    ]);

    try {
        Visitor::create([
            'name' => $this->name,
            'major' => $this->major,
            'needs' => $this->needs,
            'gender' => $this->gender
        ]);

        $this->redirect('/registration-success');
        
    } catch (\Throwable $th) {
        Log::info($th->getMessage());
    }

}

?>


<!DOCTYPE html>

<html lang="en">
	<!--begin::Head-->
	<head><base href="">
		<meta charset="utf-8" />
		<title>Registtrasi Perpustakaan</title>
		<meta name="description" content="Updates and statistics" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Vendors Styles(used by this page)-->
		<link href="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css?v=7.0.5') }}" rel="stylesheet" type="text/css" />
		<!--end::Page Vendors Styles-->
		<!--begin::Global Theme Styles(used by all pages)-->
		<link href="{{ asset('assets/plugins/global/plugins.bundle.css?v=7.0.5') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.5') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/css/style.bundle.css?v=7.0.5') }}" rel="stylesheet" type="text/css" />
		<!--end::Global Theme Styles-->
		<!--begin::Layout Themes(used by all pages)-->
		<!--end::Layout Themes-->
		<link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}" />
	</head>

    <body style="overflow: hidden; position: relative; height: 100vh;" >
        
        @volt
        <section class="bg-primary " style="overflow: hidden; height: 100vh;" >
            <img class="position-absolute" style="right: -30px; top: -30px;" src="{{ asset('assets/media/bg/pattern.svg') }}" alt="">
            <img class="position-absolute" style="left: -30px; bottom: -30px;" src="{{ asset('assets/media/bg/pattern-2.svg') }}" alt="">
            <div class="mask d-flex align-items-center h-100 gradient-custom-3">
                <div class="container h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                            <div class="card card-custom" >
                                <div class="card-body p-5">
                                    <h2 class="text-uppercase text-center mb-5">Silahkan Daftar Terlebih Dahulu</h2>
                                    <form wire:submit="submit" >

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form3Example1cg">Nama</label>
                                            <input wire:model="name" type="text" id="form3Example1cg" class="form-control form-control-lg" />
                                            @error('name')
                                                <p class="text-danger mt-1" >{{ $message  }}</p>
                                            @enderror
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form3Example3cg">Jurusan</label>
                                            <select wire:model="major"  class="form-control form-control-lg" id="">
                                                <option value="">-- pilih --</option>
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
                                            @error('major')
                                                <p class="text-danger mt-1" >{{ $message  }}</p>
                                            @enderror
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form3Example4cg">Jenis Kelamin</label>
                                            <select wire:model="gender" name="" class="form-control form-control-lg" id="">
                                                <option value="">-- pilih --</option>
                                                <option value="L">Laki Laki</option>
                                                <option value="P">Perempuan</option>
                                            </select>
                                            @error('gender')
                                                <p class="text-danger mt-1" >{{ $message  }}</p>
                                            @enderror
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form3Example4cdg">Kepentingan</label>
                                            <input wire:model="needs" type="text" id="form3Example4cdg" class="form-control form-control-lg" />
                                            @error('needs')
                                                <p class="text-danger mt-1" >{{ $message  }}</p>
                                            @enderror
                                        </div>

                                        <div class="d-flex justify-content-center">
                                        <button  type="submit" class="btn btn-primary btn-block btn-lg ">Register</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endvolt
    </body>

</html>