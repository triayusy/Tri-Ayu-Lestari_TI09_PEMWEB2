<x-layout>
    <x-slot name="page_name">Halaman Kelurahan / Detail</x-slot>
    <x-slot name="page_content">
    <table class="table table-bordered">
        <tr class="table-success">
            <th>No</th>
            <th>Id</th>
            <th>Nama Kelurahan</th>
            <th>Nama Kecamatan</th>
            <th>Data dibuat pada</th>
            <th>Data diupdate pada</th>
        </tr>
        <tr>
            <td>1</td>
            <td>{{ $kelurahan->id }}</td>
            <td>{{ $kelurahan->nama }}</td>
            <td>{{ $kelurahan->kecamatan_nama }}</td>
            <td>{{ $kelurahan->cretae_at}}</td>
            <td>{{ $kelurahan->cretae_at}}</td>
        </tr>
    </table>
</x-slot>
</x-layout>