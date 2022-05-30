<div>
    <div class="container-fluid p-5">
        <div class="card">
            <div class="card-header">
              Asesor
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">{{$information['codigo_asesor']}} - {{$information['name']}}</h5>
                          <p class="card-text"><strong>Clientes:</strong> {{$information['clientes_asignados']}}</p>
                          <p class="card-text"><strong>Total de Pedidos:</strong> {{$information['total_pedidos']}}</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      {{-- <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Special title treatment</h5>
                          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                          <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                      </div> --}}
                    </div>
                  </div>

                  <div class="row p-5">
                    <h1>CLIENTES</h1>
                  </div>


                  <div class="row">

                    @foreach ($information['clientes'] as $item)
                    <div class="col-sm-6">
                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">{{$item->name}}</h5>
                            <p class="card-text"><strong>Pedidos:</strong> {{$item->total_pedidos}}</p>
                            <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Total Productos</th>
                                    <th scope="col">Total Pedido</th>
                                    <th scope="col">Fecha de pago</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($item->detalle_pedidos as $item_1)
                                    <tr>
                                        <td>{{$item_1->estado}}</td>
                                        <td>{{$item_1->total_productos}}</td>
                                        <td>{{$item_1->total_pedido}}</td>
                                        <td>{{$item_1->fecha_pago}}</td>
                                      </tr>
                                    @endforeach
                                </tbody>
                              </table>
                          </div>
                        </div>
                      </div>
                    @endforeach


                    {{-- <div class="col-sm-6">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Special title treatment</h5>
                          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                          <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                      </div>
                    </div> --}}

                  </div>
            </div>
          </div>
    </div>

</div>
