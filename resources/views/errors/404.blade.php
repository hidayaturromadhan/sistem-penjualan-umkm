<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Not Found</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 10%;
            color: #333;
        }
        h1 {
            font-size: 72px;
            color: #1A5F3C;
        }
        p {
            font-size: 18px;
            margin-top: -20px;
        }
        a {
            color: #1A5F3C;
            text-decoration: none;
            font-size: 16px;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>404</h1>
    <p>Halaman yang Anda cari tidak ditemukan.</p>
    <a href="{{ route('pengunjung.beranda')}}">Kembali ke Beranda</a>
</body>
</html>
