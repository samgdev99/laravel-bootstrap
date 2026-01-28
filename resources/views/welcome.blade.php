<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mi App</title>
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>
<body>

    <div class="container mt-5">
        <h1 class="text-primary">Laravel 12 + Bootstrap 5 🚀</h1>

        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalTest">
            Abrir modal
        </button>

        <div class="modal fade" id="modalTest">
            <div class="modal-dialog">
                <div class="modal-content p-3">
                    Funciona Bootstrap JS 🎉
                </div>
            </div>
        </div>
    </div>

</body>
</html>