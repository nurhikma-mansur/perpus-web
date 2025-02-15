<x-layouts.app>
    <div class="container">
        <form action="">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        Tambah Data
                    </div>
                    <div class="card-toolbar">
                        <a href="{{ route('admin.e-book.index') }}" class="btn btn-light-primary">
                            Kembali
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>File</label>
                                <input type="file" class="form-control form-control-solid" placeholder="Example input"/>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Sampul Buku</label>
                                <input type="file" class="form-control form-control-solid" placeholder="Example input"/>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control form-control-solid" placeholder="Example input"/>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Tipe Buku</label>
                                <select class="form-control form-control-solid">
                                 <option>-- Jenis Buku --</option>
                                 <option>Buku ajar</option>
                                 <option>Buku Teks</option>
                                 <option>Akademik</option>
                                 <option>Panduan Teknis</option>
                                </select>
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
                                <label>Pengarang</label>
                                <input type="text" class="form-control form-control-solid" placeholder="Example input"/>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Penerbit</label>
                                <input type="text" class="form-control form-control-solid" placeholder="Example input"/>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Bahasa</label>
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
                <a href="/admin/e-book" class="btn btn-outline-primary">
                    Kembali
                </a>
                <button class="btn btn-primary ml-5">
                    Submit
                </button>
            </div>
        </form>
    </div>
</x-layouts.app>