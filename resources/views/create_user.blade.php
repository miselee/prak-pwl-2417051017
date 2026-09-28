@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <h2 class="mb-4">Buat Pengguna Baru</h2>

    <form action="{{ route('user.store') }}" method="POST">

        @csrf

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input
                type="text"
                id="nama"
                name="nama"
                class="form-control"
                required>
        </div>

        <div class="mb-3">
            <label for="nim" class="form-label">NIM</label>
            <input
                type="text"
                id="nim"
                name="nim"
                class="form-control"
                required>
        </div>

        <div class="mb-3">
            <label for="kelas_id" class="form-label">Kelas</label>

            <select
                name="kelas_id"
                id="kelas_id"
                class="form-select"
                required>

                @foreach ($kelas as $kelasItem)
                    <option value="{{ $kelasItem->id }}">
                        {{ $kelasItem->nama_kelas }}
                    </option>
                @endforeach

            </select>
        </div>

        <button type="submit" class="btn btn-primary">
            Submit
        </button>

        <a href="/user" class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>

@endsection