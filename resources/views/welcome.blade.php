<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <h1>Crud en laravel</h1>
  <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Agregar</button>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">Editorial</th>
        <th scope="col">Autor</th>
        <th scope="col">Paginas</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody class="table-group-divider">
      @foreach ($books as $book)
      <tr>
      <th scope="row"><?= $book->id ?> </th>

      <td><?= $book->nombre ?></td>
      <td><?= $book->editorial ?></td>
      <td><?= $book->autor ?></td>
      <td><?= $book->pagina ?></td>
      <td><button type="button" class="btn btn-primary" data-bs-toggle="modal"
        data-bs-target="#exampleModalsave{{$book->id}}">EDITAR</button></td>

      <div class="modal fade" id="exampleModalsave{{$book->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <form action="{{route("crud.update")}}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $book->id }}">
            <label class="control-label col-sm-2">Nombre:</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="nombre" placeholder="Nombre del Libro"
              value="{{$book->nombre}}" required>
            </div>
            <label class="control-label col-sm-2">Editorial:</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="editorial" placeholder="Nombre de la editorial"
              value="{{$book->editorial}}">
            </div>
            <label class="control-label col-sm-2">Autor:</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="autor" placeholder="Nombre del autor"
              value="{{$book->autor}}">
            </div>
            <label class="control-label col-sm-2">Numeros de Paginas:</label>
            <div class="col-sm-10">
            <input type="number" class="form-control" name="pagina" value="{{$book->pagina}}">
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </form>
          </div>

        </div>
        </div>
      </div>




      <td><button type="button" class="btn btn-danger"> <a href="{{route("crud.delete",$book->id)}}">ELIMINAR</a> </button></td>

      </tr>
    @endforeach

    </tbody>
  </table>
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route("crud.create")}}" method="post">
            @csrf
            <label class="control-label col-sm-2">Nombre:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="nombre" placeholder="Nombre del Libro" required>
            </div>
            <label class="control-label col-sm-2">Editorial:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="editorial" placeholder="Nombre de la editorial">
            </div>
            <label class="control-label col-sm-2">Autor:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="autor" placeholder="Nombre del autor">
            </div>
            <label class="control-label col-sm-2">Numeros de Paginas:</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" name="pagina">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>