
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            padding: 30px;
        }
        .card {
            max-width: 500px;
            margin: auto;
            padding: 30px;
            background: white;
            border-radius: 18px;
            box-shadow: 0 8px 25px #0f172a15;
        }
        h2 { color: #4338ca; }
        label { display: block; margin-top: 16px; }
        input, select {
            box-sizing: border-box;
            width: 100%;
            padding: 12px;
            margin-top: 7px;
            border: 1px solid #cbd5e1;
            border-radius: 9px;
        }
        button, .back {
            display: inline-block;
            margin-top: 22px;
            padding: 11px 16px;
            border: none;
            border-radius: 9px;
            text-decoration: none;
            cursor: pointer;
        }
        button { background: #4f46e5; color: white; }
        .back { background: #e2e8f0; color: #334155; }
        .error { color: #dc2626; }
    </style>
</head>
<body>
    <div class="card">
        <h2>Edit Mahasiswa</h2>
        <p>Perbarui informasi mahasiswa di bawah ini.</p>

        @if ($errors->any())
            <div class="error">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('user.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label>Nama Mahasiswa</label>
            <input type="text" name="nama"
                value="{{ old('nama', $user->nama) }}" required>

            <label>NIM</label>
            <input type="text" name="nim"
                value="{{ old('nim', $user->nim) }}" required>
            <label>Kelas</label>
            <select name="kelas_id" required>
                @foreach ($kelas as $item)
                    <option value="{{ $item->id }}"
                        {{ old('kelas_id', $user->kelas_id) == $item->id ? 'selected' : '' }}>
                        {{ $item->nama_kelas }}
                    </option>
                @endforeach
            </select>

            <button type="submit">Simpan Perubahan</button>
            <a href="/user" class="back">Kembali</a>
        </form>
    </div>
</body>
</html>
