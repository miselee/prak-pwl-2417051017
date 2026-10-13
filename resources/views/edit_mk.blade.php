@extends('layouts.app')

@section('content')

<div class="container mt-4 mb-5">

    <div class="mb-4">
        <h2 class="fw-bold mb-1">Edit Mata Kuliah</h2>
        <p class="text-muted mb-0">
            Perbarui informasi mata kuliah yang terdaftar.
        </p>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger rounded-3 shadow-sm">
            <strong>Periksa kembali data yang dimasukkan.</strong>
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card border-0 rounded-4 shadow-sm">
        <div class="card-header bg-white border-0 pt-4 px-4">
            <h5 class="fw-bold mb-1">Form Edit Mata Kuliah</h5>
            <p class="text-muted small mb-2">
                Silakan ubah data pada kolom berikut.
            </p>
        </div>

        <div class="card-body px-4 pb-4">
            <form action="{{ route('matakuliah.update', $mk->id) }}"
                  method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nama_mk" class="form-label fw-semibold">
                        Nama Mata Kuliah
                    </label>
                    <input type="text"
                           class="form-control rounded-3"
                           id="nama_mk"
                           name="nama_mk"
                           value="{{ old('nama_mk', $mk->nama_mk) }}"
                           placeholder="Masukkan nama mata kuliah"
                           required>
                </div>

                <div class="mb-4">
                    <label for="sks" class="form-label fw-semibold">
                        SKS
                    </label>
                    <input type="number"
                           class="form-control rounded-3"
                           id="sks"
                           name="sks"
                           value="{{ old('sks', $mk->sks) }}"
                           min="1"
                           max="6"
                           placeholder="Masukkan jumlah SKS"
                           required>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit"
                            class="btn btn-primary rounded-3 px-4">
                        Simpan Perubahan
                    </button>

                    <a href="{{ url('/matakuliah') }}"
                       class="btn btn-outline-secondary rounded-3 px-4">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>

</div>

@endsection