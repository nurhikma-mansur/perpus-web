<x-layouts.app>
    <div class="container">
        <form action="">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        Tambah Data
                    </div>
                    <div class="card-toolbar">
                        <a href="{{ route('e-book.index') }}" class="btn btn-light-primary">
                            Kembali
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>File</label>
                                <input type="file" class="form-control form-control-solid" placeholder="Example input"/>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control form-control-solid" placeholder="Example input"/>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Nim</label>
                                <input type="text" class="form-control form-control-solid" placeholder="Example input"/>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Jurusan</label>
                                <select class="form-control form-control-solid">
                                 <option>-- Pilih Jurusan --</option>
                                 <option>2</option>
                                 <option>3</option>
                                 <option>4</option>
                                 <option>5</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Tahun Lulus</label>
                                <input type="number" class="form-control form-control-solid" placeholder="Example input"/>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Pengarang</label>
                                <input type="text" class="form-control form-control-solid" placeholder="Example input"/>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Judul Skripsi</label>
                                <input type="text" class="form-control form-control-solid" placeholder="Example input"/>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>No Klasifikasi</label>
                                <input type="text" class="form-control form-control-solid" placeholder="Example input"/>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>ISBN/ISSN</label>
                                <input type="text" class="form-control form-control-solid" placeholder="Example input"/>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Tipe Isi</label>
                                <input type="text" class="form-control form-control-solid" placeholder="Example input"/>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Tipe Media</label>
                                <input type="text" class="form-control form-control-solid" placeholder="Example input"/>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Deskripsi Fisik</label>
                                <input type="text" class="form-control form-control-solid" placeholder="Example input"/>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Edisi Subjek</label>
                                <input type="text" class="form-control form-control-solid" placeholder="Example input"/>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Info detail spesifik & pernyataan tanggung jawab</label>
                                <textarea class="form-control form-control-solid" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end mt-5">
                <a href="/e-book" class="btn btn-outline-primary">
                    Kembali
                </a>
                <button class="btn btn-primary ml-5">
                    Submit
                </button>
            </div>
        </form>
    </div>
</x-layouts.app>