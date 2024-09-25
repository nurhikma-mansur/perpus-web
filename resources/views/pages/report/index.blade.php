<x-layouts.app>
    <div class="container">
        <div class="card card-custom">
            <div class="card-body">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>Tahun</th>
                            <th class="text-right" >Aksi</th.>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 0; $i < 5; $i++)
                        <tr>
                            <td style="align-content: center;" >{{ $i+1 }}</td>
                            <td style="align-content: center;" >{{ fake()->sentence }}</td>
                            <td style="align-content: center;" >{{ fake()->name }}</td>
                            <td style="align-content: center;" >{{ fake()->year }}</td>
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