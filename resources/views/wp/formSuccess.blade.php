<!-- resources/views/wp/formSuccess.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <section class="content-header">
        <h1>Terimakasih telah melakukan Pendaftaran Data Penjualan Wajib Pajak</h1>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                @if(session('success'))
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: '{{ session('success') }}',
                        showConfirmButton: false,
                        timer: 2150
                    });
                </script>
                @endif
            </div>
        </div>
    </section>
</body>
</html>