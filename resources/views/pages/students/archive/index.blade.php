<x-layouts.student>
    <div class="container">
        <div class="card card-custom">
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
        </div>

        <div class="d-flex flex-md-row flex-column justify-content-md-between align-items-md-center align-items-start my-8">
            <h2>Daftar Skripsi</h2>
            <div class="" >
                <input style="width: 280px;" type="text" class="form-control form-control-lg"  placeholder="Cari..."/>
            </div>
        </div>

        <div class="row">
            @for ($i = 0; $i < 9; $i++)
            <div class="col-md-4 col-xl-4 col-sm-6 col-xs-12 mb-9">
                <div class="card card-custom">
                    <div class="card-header py-4">
                        <div class="card-title">
                            <h5 class="h6 m-0">
                                Rahmat Riyadi Syam
                                <small class="d-block text-dark mt-2 mb-0" >Teknik Informatika</small>
                            </h5>
                        </div>
                    </div>
                    <div class="card-body py-6">
                        <div>
                            <p style="color: #464E5F;" class="mb-1" >Judul</p>
                            <p class="text-dark" >Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, veniam.</p>
                        </div>
                        <div class="my-3" >   
                            <p style="color: #464E5F;" class="mb-1" >Tahun Lulus</p>
                            <p class="text-dark" >2020</p>
                        </div>
                        <div  >
                            <p style="color: #464E5F;" class="mb-1" >Subjek</p>
                            <div class="d-flex" >
                                <span style="font-size: 12px;" class="label label-rounded label-inline label-light-dark mr-2">Komputer</span>
                                <span style="font-size: 12px;" class="label label-rounded label-inline label-light-dark mr-2">UCD</span>
                                <span style="font-size: 12px;" class="label label-rounded label-inline label-light-dark mr-2">sdfs</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer py-4">
                        <div class="row">
                            <div class="col">
                                <a href="#" class="btn btn-block btn-light-primary">
                                    Unduh
                                </a>
                            </div>
                            <div class="col">
                                <a href="#" class="btn btn-block btn-primary">
                                    Baca
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endfor
        </div>

    </div>
</x-layouts.student>