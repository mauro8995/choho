<div>
    <div class="container-fluid p-5">




        <div class="card">
            <div class="card-header">
              Registrar
            </div>
            <div class="card-body">
                <form wire:submit.prevent="save_product">
                    <div class="row">
                        <div class="col">
                          <input type="text" class="form-control" wire:model="description" placeholder="Descripcion">
                        </div>
                        <div class="col">
                          <input type="number" class="form-control" wire:model="price" placeholder="Precio">
                        </div>
                        <button type="submit">Save Contact</button>
                  </form>
            </div>
          </div>






        <div class="card">
            <div class="card-header">
              productos
            </div>
            <div class="card-body">
              <h5 class="card-title">Listado</h5>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Precio</th>
                  </tr>
                </thead>
                <tbody>

                    @foreach ($products as $item)
                    <tr>
                        <td>{{$item->description}}</td>
                        <td>{{$item->price}}</td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
    </div>
</div>
