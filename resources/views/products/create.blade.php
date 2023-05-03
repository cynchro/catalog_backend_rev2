<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <!-- Enlace al archivo CSS de Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
</head>

<body>
    <!-- Barra de navegación -->
    @include('layouts.navbar')

    <!-- Contenido de la página -->
    <div class="container mt-5 mb-4">
        <h2>Crear producto</h2>
        <hr/>
        @include('flash-message')
        <div class="card mt-5">
            <div class="card-body">
                <form method="POST" action="{{ route('store') }}" class="row g-3 needs-validation"
                    enctype="multipart/form-data" novalidate>
                    @csrf
                    <div class="form-group">
                        <label>Nombre</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Nombre del producto"
                                aria-label="Nombre" name="name" aria-describedby="basic-addon1" required>
                        </div>
                        <div class="invalid-feedback">Debe agregar un nombre.</div>
                    </div>

                    <div class="form-group">
                        <label>Contenido</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Contenido del paquete"
                                aria-label="Contenido" name="content" aria-describedby="basic-addon1" required>
                        </div>
                        <div class="invalid-feedback">Debe agregar un contenido.</div>
                    </div>

                    <div class="form-group">
                        <label>Descripción</label>
                        <div class="input-group mb-3">
                            <textarea class="form-control" aria-label="Descripción" name="description" placeholder="Descripción del producto"
                                required></textarea>
                        </div>
                        <div class="invalid-feedback">Debe agregar una descripción.</div>
                    </div>

                    <div class="form-group">
                        <label>Precio</label>
                        <div class="input-group mb-3">
                            <input type="number" class="form-control" placeholder="Precio del producto"
                                aria-label="Precio" name="price" aria-describedby="basic-addon1" required>
                        </div>
                        <div class="invalid-feedback">Debe agregar un precio.</div>
                    </div>

                    <div class="form-group">
                        <label>Estado</label>
                        <div class="input-group mb-3">
                            <select class="form-control" name="status" required>
                                <option value="">Seleccione un estado</option>
                                <option value="{{ $status['publicar'] }}">Publicar</option>
                                <option value="{{ $status['noPublicar'] }}">No Publicar</option>
                            </select>
                        </div>
                        <div class="invalid-feedback">Debe seleccionar un estado.</div>
                    </div>

                    <div class="form-group">
                        <label>Subir Imagen</label>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" id="customFile" name="image" required />
                        </div>
                        <div class="invalid-feedback">Debe subir una imagen.</div>
                    </div>
                    <hr/>
                    <div class="row mt-2">
                        <div class="col-6" style="text-align: left; padding-left: 13px;"><a type="button"
                                href="/" class="btn btn-primary"><i class="fa-solid fa-house"></i>&nbsp;Volver</a>
                        </div>
                        <div class="col-6" style="text-align: right; padding-right: 13px;"><button type="submit"
                                class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i>&nbsp;Guardar</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    </div>

    <!-- Enlaces a los archivos JavaScript de Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.2/dist/umd/popper.min.js"
        integrity="sha384-q9CRHqZndzlxGLOj+xrdLDJa9ittGte1NksRmgJKeCV9DrM7Kz868XYqsKWPpAmn" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/validate.js') }}"></script>

</html>
