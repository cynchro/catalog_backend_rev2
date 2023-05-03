<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Administrador</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          {{-- <li class="nav-item">
            <a class="nav-link" href="#">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Productos</a>
          </li> --}}
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="modal"
            data-bs-target="#miModalLogout" style="cursor:pointer;"><i class="fa-solid fa-circle-user"></i>&nbsp;Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

   <!-- Modal -->
   <div class="modal fade" id="miModalLogout" tabindex="-1" aria-labelledby="miModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="miModalLabel">Atención</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                Esta seguro que desea cerrar sesión?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success">Continuar</button>
            </div>
          </form>
        </div>
    </div>
</div>