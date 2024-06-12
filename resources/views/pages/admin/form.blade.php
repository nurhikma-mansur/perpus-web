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
                        <div class="col-12">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control form-control-solid" placeholder="Example input"/>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control form-control-solid" placeholder="Example input"/>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Kata Sandi</label>
                                <input type="text" class="form-control form-control-solid" placeholder="Example input"/>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control form-control-solid">
                                 <option>-- pilih status --</option>
                                 <option>Aktif</option>
                                 <option>Non Aktif</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end mt-5">
                <a href="/admin/admin" class="btn btn-outline-primary">
                    Kembali
                </a>
                <button class="btn btn-primary ml-5">
                    Submit
                </button>
            </div>
        </form>
    </div>
</x-layouts.app>