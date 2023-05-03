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
    <div class="container mt-5  mb-4">
        <h2>Lista de productos</h2>
        <hr/>
        @include('flash-message')
        <div class="table-responsive mt-5">
            <table class="table table-hover table-bordered text-center">
                <thead class="bg-light">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Estado</th>
                        <th class="text-center"><i class="fa-solid fa-gear"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $p)
                        <tr>
                            <td>{{ $p->id }}</td>
                            <td>{{ $p->name }}</td>
                            <td>${{ $p->price }}</td>
                            <td>{{ $p->status == 0 ? 'No Publicado' : 'Publicado' }}</td>
                            <td class="text-center">
                                <div class="btn-group btn-group-sm">
                                    <a type="button" href="/products/show/{{ $p->id }}" class="btn btn-info"><i
                                            class="fa-solid fa-magnifying-glass"></i>&nbsp;Ver</a>
                                    <a type="button" href="/products/edit/{{ $p->id }}"
                                        class="btn btn-primary"><i
                                            class="fa-solid fa-pen-to-square"></i>&nbsp;Editar</a>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#miModal" id="miBoton"
                                        onclick="setModalId({{ $p->id }})">&nbsp;<i
                                            class="fa-solid fa-trash"></i>&nbsp;Eliminar</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row mt-5">
            <div class="col" style="text-align: left; padding-left: 13px;"><a type="button" href="/products/create"
                    class="btn btn-success"><i class="fa-solid fa-plus"></i>&nbsp;Nuevo producto</a></div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="miModal" tabindex="-1" aria-labelledby="miModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="POST" action="{{ route('delete') }}">
                        @csrf
                        <div class="modal-header bg-light">
                            <h5 class="modal-title" id="miModalLabel">Atención</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Cerrar"></button>
                        </div>
                        <div class="modal-body">
                            Esta por eliminar un producto, esta acción es irreversible, ¿desea continuar?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success">Continuar</button>
                        </div>
                        <input type="hidden" name="id" id="idProduct" />
                    </form>
                </div>
            </div>
        </div>


        <!-- Footer -->
        {{-- <footer class="bg-light text-center text-lg-start fixed-bottom mt-5">
    <div class="container p-4">
      <p>Derechos reservados &copy; 2023</p>
    </div>
  </footer> --}}

        <!-- Enlaces a los archivos JavaScript de Bootstrap 5 -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="{{ asset('js/modal.js') }}"></script>
</body>

</html>
