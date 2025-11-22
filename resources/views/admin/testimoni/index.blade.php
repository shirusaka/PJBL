<table class="table">
    <tbody>
        @foreach ($testimonials as $t)
        <tr>
            <td>{{ $t->username }}</td>
            <td><img src="{{ asset('storage/testimoni/'.$t->foto_ss) }}" width="80"></td>
        </tr>
        @endforeach
    </tbody>
</table>

<button class="btn btn-primary btn-sm" data-bs-toggle="modal"
        data-bs-target="#modalTambahTestimoni">
    Tambah Testimoni
</button>
