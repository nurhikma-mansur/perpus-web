<x-layouts.app>
    @volt
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
                        <div class="col-12">
                            <div class="form-group ">
                                <label >Subjek</label>
                                <input id="kt_tagify_1" class="form-control form-control-solid tagify" name='tags' placeholder='ketik lalu tekan enter...' autofocus="" />
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group ">
                                <label >Pembimbing</label>
                                <input id="kt_tagify_2" class="form-control form-control-solid tagify" name='tags' placeholder='ketik lalu tekan enter...' autofocus="" />
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Abstrak</label>
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

    @script
    <script>
            const input1 = document.getElementById('kt_tagify_1')
            const input2 = document.getElementById('kt_tagify_2')
            const tagify1 = new Tagify(input1)
            const tagify2 = new Tagify(input2)
    </script>
    @endscript

    @endvolt
</x-layouts.app>