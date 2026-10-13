@extends('layouts.app')

@section('content')

<div class="container mt-4 mb-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">Daftar Mata Kuliah</h2>
            <p class="text-muted mb-0">Kelola data mata kuliah dengan mudah.</p>
        </div>

        <a href="{{ route('matakuliah.create') }}"
           class="btn btn-primary rounded-3 px-3 shadow-sm">
            Tambah Mata Kuliah
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show rounded-3 shadow-sm"
             role="alert">
            <strong>✓ Berhasil!</strong> {{ session('success') }}
            <button type="button" class="btn-close"
                    data-bs-dismiss="alert" aria-label="Tutup"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show rounded-3 shadow-sm"
             role="alert">
            <strong>✕ Gagal!</strong> {{ session('error') }}
            <button type="button" class="btn-close"
                    data-bs-dismiss="alert" aria-label="Tutup"></button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger rounded-3">
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
            <h5 class="fw-bold mb-1">Data Mata Kuliah</h5>
            <p class="text-muted small mb-2">
                Informasi mata kuliah yang terdaftar dalam sistem.
            </p>
        </div>

        <div class="card-body px-4 pb-4">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th class="py-3">No</th>
                            <th class="py-3">Nama Mata Kuliah</th>
                            <th class="py-3">SKS</th>
                            <th class="py-3 text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($mks as $mk)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td class="fw-semibold">
                                    {{ $mk->nama_mk }}
                                </td>

                                <td>
                                    <span class="badge rounded-pill text-bg-info">
                                        {{ $mk->sks }} SKS
                                    </span>
                                </td>

                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('matakuliah.edit', $mk->id) }}"
                                           class="btn btn-sm btn-warning rounded-3 px-3">
                                            Edit
                                        </a>

                                        <form action="{{ route('matakuliah.destroy', $mk->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Yakin ingin menghapus mata kuliah {{ addslashes($mk->nama_mk) }}?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-sm btn-danger rounded-3 px-3">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-5">
                                    <h6 class="fw-bold">Belum Ada Data</h6>
                                    <p class="text-muted mb-0">
                                        Silakan tambahkan mata kuliah terlebih dahulu.
                                    </p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="text-muted small mt-3">
                Total mata kuliah:
                <strong>{{ count($mks) }}</strong>
            </div>
        </div>
    </div>

</div>

@endsection