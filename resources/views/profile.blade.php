<!DOCTYPE html>
<html lang="en">
<head>

    <style>
        body {
            text-align: center;
            font-family: Arial;
        }

        .foto {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 5px solid #94c46e;
            background-color: lightgray;
            margin: 30px auto;
        }

        .data {
            width: 270px;
            padding: 8px;
            border-radius: 5px;
            margin: 15px auto;
            background-color: #94c46e;
            font-size: 25px;
        }
    </style>
</head>

<body>

    <img src="/images/foto.jpg" class="foto">

    <div class="data">{{ $nama }}</div>
    <div class="data">{{ $kelas }}</div>
    <div class="data">{{ $npm }}</div>

</body>
</html>