<x-layouts.app>
    <div class="container">
        <div class="card card-custom">
            <div class="card-header">
                <div class="card-title">
                    Daftar Peminjam Buku
                </div>
                <div class="card-toolbar">
                    <a href="{{ route('admin.book.loan.create') }}" class="btn btn-primary">
                        Tambah Data
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Mahasiswa</th>
                            <th>Judul</th>
                            <th class="text-center" >Semester</th>
                            <th>Tgl Pinjam</th>
                            <th>Tgl Kembali</th>
                            <th class="text-right" >Aksi</th.>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 0; $i < 5; $i++)
                        <tr>
                            <td style="align-content: center;" >{{ $i+1 }}</td>
                            <td style="align-content: center;" >{{ fake()->name }}</td>
                            <td style="align-content: center;" >{{ fake()->name }}</td>
                            <td style="align-content: center;" class="text-center" >1</td>
                            <td width="120" style="align-content: center;" >{{ fake()->date() }}</td>
                            <td width="120" style="align-content: center;" >{{ fake()->date() }}</td>
                            <td style="align-content: center;"  class="text-right" >
                                <button class="btn btn-sm btn-light-danger mr-2">
                                    Hapus
                                </button>
                                <button class="btn btn-sm btn-light-primary">
                                    Detail
                                </button>
                            </td>
                        </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layouts.app>