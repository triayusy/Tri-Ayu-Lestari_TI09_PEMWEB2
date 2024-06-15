<x-layout>
    <x-slot name="page_name">Halaman Kelurahan</x-slot>
    <x-slot name="page_content">
        <h3>Data Kelurahan </h3>

        @if (session('pesan'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('pesan') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif

        <a href="{{ url('dashboard/kelurahan/create')}}" class="btn btn-primary">+Tambah Kelurahan</a>
        <table class="table table-bordered">
            <tr class="table-success">
                <th>id</th>
                <th>Nama Kelurahan</th>
                <th>Nama Kecamatan</th>
                <th>Aksi</th>
            </tr>
            @foreach ($list_kelurahan as $kelurahan)
            <tr>
                <td>{{ $kelurahan->id }}</td>
                <td>{{ $kelurahan->nama }}</td>
                <td>{{ $kelurahan->kecamatan_nama }}</td>
                <td>
                    <a href="{{ url('dashboard/kelurahan/show',$kelurahan->id) }}" class="text-primary"><i class="far fa-eye"></i> Lihat</a> |
                    <a href="{{ url('dashboard/kelurahan/edit',$kelurahan->id) }}" class=""><i class="far fa-edit"></i> Edit</a> |
                    <form action="{{ url('dashboard/kelurahan/destroy', $kelurahan->id) }}" method="post" class="d-inline">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin mengahapus data?')"><i class="far fa-trash-alt"></i>Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </x-slot>
</x-layout>