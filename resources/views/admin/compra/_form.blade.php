
<div class="form-row">
    <div class="form-group col-md-8">
        <div class="form-group">
            <label for="proveedor_id">Proveedor</label>
            <select class="form-control" name="proveedor_id" id="proveedor_id">
                @foreach ($proveedores as $proveedor)
                <option value="{{$proveedor->id}}">{{$proveedor->nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group col-md-4">
        <label for="tax">Impuesto</label>
        <div class="input-group">

            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon3">%</span>
            </div>
            <input type="number" class="form-control" name="tax" id="tax" aria-describedby="basic-addon3"
                placeholder="18">
        </div>
    </div>
</div>

<div class="form-group">
    <label for="code">Código de barras</label>
    <input type="text" name="code" id="code" class="form-control" placeholder="" aria-describedby="helpId">
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        <div class="form-group">
            <label for="product_id">Waffles</label>
            {{--  <select class="form-control selectpicker" data-live-search="true" name="product_id" id="product_id">  --}}
            <select class="form-control" name="producto_id" id="producto_id">
                <option value="" disabled selected>Selecccione un producto</option>
                @foreach ($waffles as $waffle)
                <option value="{{$waffle->id}}">{{$waffle->nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group col-md-4">
        <div class="form-group">
            <label for="cantidad">Cantidad</label>
            <input type="number" class="form-control" name="cantidad" id="cantidad" aria-describedby="helpId">
        </div>
    </div>
    <div class="form-group col-md-2">
        <div class="form-group">
            <label for="price">Precio de compra</label>
            <input type="number" class="form-control" name="price" id="price" aria-describedby="helpId">
        </div>
    </div>
</div>
<div class="form-group">
    <button type="button" id="agregar" class="btn btn-primary float-right">Agregar producto</button>
</div>
<div class="form-group">
    <h4 class="card-title">Detalles de compra</h4>
    <div class="table-responsive col-md-12">
        <table id="detalles" class="table table-striped">
            <thead>
                <tr>
                    <th>Eliminar</th>
                    <th>Producto</th>
                    <th>Precio(PEN)</th>
                    <th>Cantidad</th>
                    <th>SubTotal(PEN)</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th colspan="4">
                        <p align="right">TOTAL:</p>
                    </th>
                    <th>
                        <p align="right"><span id="total">PEN 0.00</span> </p>
                    </th>
                </tr>
                <tr>
                    <th colspan="4">
                        <p align="right">TOTAL IMPUESTO (18%):</p>
                    </th>
                    <th>
                        <p align="right"><span id="total_impuesto">PEN 0.00</span></p>
                    </th>
                </tr>
                <tr>
                    <th colspan="4">
                        <p align="right">TOTAL PAGAR:</p>
                    </th>
                    <th>
                        <p align="right"><span align="right" id="total_pagar_html">PEN 0.00</span> <input type="hidden"
                                name="total" id="total_pagar"></p>
                    </th>
                </tr>
            </tfoot>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
