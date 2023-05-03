<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <!-- Enlace al archivo CSS de Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <!-- Barra de navegación -->
    @include('layouts.navbar')

    <!-- Contenido de la página -->
    <div class="container mt-5 mb-4">
        <h2>Editar producto</h2>
        <hr/>
        @include('flash-message')
        <div class="card mt-5">
            <div class="card-body">
                <form method="POST" action="{{ route('update') }}" enctype="multipart/form-data"
                    class="row g-3 needs-validation" novalidate>
                    @csrf
                    <div class="form-group">
                        <label>Nombre</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Nombre del producto"
                                aria-label="Nombre" name="name" value="{{ $product->name }}"
                                aria-describedby="basic-addon1" required>
                        </div>
                        <div class="invalid-feedback">Debe agregar un nombre.</div>
                    </div>

                    <div class="form-group">
                        <label>Contenido</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Contenido del paquete"
                                aria-label="Contenido" name="content" value="{{ $product->content }}"
                                aria-describedby="basic-addon1" required>
                        </div>
                        <div class="invalid-feedback">Debe agregar un contenido.</div>
                    </div>

                    <div class="form-group">
                        <label>Descripción</label>
                        <div class="input-group mb-3">
                            <textarea class="form-control" aria-label="Descripción" name="description" value="{{ $product->description }}"
                                placeholder="Descripción del producto" required>{{ $product->description }}</textarea>
                        </div>
                        <div class="invalid-feedback">Debe agregar una descripción.</div>
                    </div>

                    <div class="form-group">
                        <label>Precio</label>
                        <div class="input-group mb-3">
                            <input type="number" class="form-control" placeholder="Precio del producto"
                                aria-label="Precio" value="{{ $product->price }}" name="price"
                                aria-describedby="basic-addon1" required>
                        </div>
                        <div class="invalid-feedback">Debe agregar un precio.</div>
                    </div>

                    <div class="form-group">
                        <label>Estado</label>
                        <div class="input-group mb-3">
                            <select class="form-control" name="status" required>
                                <option value="">Seleccione un estado</option>
                                @if ($status['publicar'] == $product->status)
                                    <option value="{{ $status['publicar'] }}" selected>Publicar</option>
                                @else
                                    <option value="{{ $status['publicar'] }}">Publicar</option>
                                @endif
                                @if ($status['noPublicar'] == $product->status)
                                    <option value="{{ $status['noPublicar'] }}" selected>No Publicar</option>
                                @else
                                    <option value="{{ $status['noPublicar'] }}">No Publicar</option>
                                @endif
                            </select>
                        </div>
                        <div class="invalid-feedback">Debe seleccionar un estado.</div>
                    </div>

                    <div class="form-group">
                        <label>Cambiar Imagen</label>
                        <div class="input-group mb-3">
                            <input type="file" name="image" class="form-control" id="customFile" />
                        </div>
                        <div class="invalid-feedback">Debe subir una imagen.</div>
                    </div>

                    <div class="form-group">
                        <label>Imagen Actual</label>
                        <div class="input-group mb-3">
                            @if ($product->status == '')
                                <img class="img-size" src="{{ asset('/images/no-image.png') }}" />
                            @else
                                <img class="img-size" src="{{ asset('/images/' . $product->image) }}" />
                            @endif
                        </div>
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
                    <input type="hidden" name="id" value="{{ $id }}" />
                </form>
            </div>
        </div>
    </div>
    </div>

    <!-- Enlaces a los archivos JavaScript de Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/validate.js') }}"></script>

</html>
