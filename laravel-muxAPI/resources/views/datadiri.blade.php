<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="container mt-5">
        <!-- Success message -->
        @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
        @endif
        <form action="" method="post" action="{{ route('DataDiri.store') }}">
            <!-- CROSS Site Request Forgery Protection -->
            @csrf
            <div class="form-group">
                <h2>USER</h2>
                <label>Nama</label>
                <input type="text" class="form-control" placeholder="Nama" aria-label="Nama" name="nama" id="nama">
            </div>
            <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="email" class="form-control" placeholder="Tanggal Lahir" aria-label="Tanggal Lahir" name="tanggal_lahir" id="tanggal_lahir">
            </div>
            <div class="form-group">
                <label>Kewarganegaraan</label>
                <input type="text" class="form-control" placeholder="Kewarganegaraan" aria-label="Kewarganegaraan" name="kewarganegaraan" id="kewarganegaraan">
            </div>

            <!-- Tautan "Tambah Keluarga" -->
            <a href="#" id="tambahKeluarga">Tambah Keluarga</a>

            <!-- Container untuk formulir keluarga -->
            <div id="formKeluargaContainer">
                <!-- Formulir Keluarga (awalnya satu) -->
                <div class="form-row align-items-end">
                    <div class="form-group col-md-5">
                        <h2>KELUARGA</h2>
                        <label for="namaKeluarga">Nama</label>
                        <input type="text" class="form-control" id="namaKeluarga" placeholder="Nama">
                    </div>
                    <div class="form-group col-md-5">
                        <label for="tgllahirKeluarga">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tgllahirKeluarga">
                    </div>
                    <div class="form-group col-md-2">
                        <button type="button" class="btn btn-danger hapusKeluarga" id="hapusKeluarga">Hapus</button>
                    </div>
                </div>
            </div>

            <!-- Tombol Submit -->
            <button type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>
    </div>

    <!-- Tambahkan pustaka Bootstrap JavaScript (Opsional) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <!-- JavaScript untuk menambahkan dan menghapus formulir keluarga -->
    <!-- JavaScript untuk menambahkan dan menghapus formulir keluarga -->
    <!-- JavaScript untuk menambahkan dan menghapus formulir keluarga -->
    <script>
        var index = 0;

        document.getElementById('tambahKeluarga').addEventListener('click', function() {
            // Duplikasi formulir keluarga yang ada
            var formKeluarga = document.querySelector('#formKeluargaContainer .form-row').cloneNode(true);

            // Bersihkan nilai input dalam formulir keluarga baru
            formKeluarga.querySelectorAll('input').forEach(function(input) {
                input.value = '';
            });

            // Tambahkan atribut data-index
            formKeluarga.querySelector('.hapusKeluarga').setAttribute('data-index', index);

            // Tambahkan event listener untuk tombol "Hapus"
            formKeluarga.querySelector('.hapusKeluarga').addEventListener('click', function() {
                // Ambil elemen formulir keluarga yang sesuai
                var indexToRemove = this.getAttribute('data-index');
                var formKeluargaToRemove = document.querySelector('.form-row[data-index="' + indexToRemove + '"]');

                // Periksa apakah elemen ditemukan sebelum mencoba menghapusnya
                if (formKeluargaToRemove !== null) {
                    formKeluargaToRemove.remove();
                }
            });


            // Tambahkan formulir keluarga baru ke dalam kontainer
            document.querySelector('#formKeluargaContainer').appendChild(formKeluarga);

            // Tingkatkan indeks
            index++;
        });

        // Event listener tambahan untuk menghapus formulir awal jika diperlukan
        document.querySelector('.hapusKeluarga').addEventListener('click', function() {
            this.closest('.form-row').remove();
        });
    </script>


</body>

</html>