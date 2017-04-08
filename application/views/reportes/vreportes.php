<div class="container">
<div class="panel panel-primary col-lg-8 col-lg-offset-2">
    <div class="panel-heading">
        <title> Impresión de repores</title>
    </div>
    <div class="panel-body">
        <form method="post" action="<?php echo base_url('Creportespdf/volanteIngreso')?>" >
            <div class="form-group">
                <label>Ingrese codigo de la orden de trabajo</label>
                <input class="form-control" type="number" min="1" placeholder=" Codigo ot" required="true" id="ot" name="ot">
            </div>
            <button class=" btn btn-success"><span class="glyphicon glyphicon-print"></span> Imprimir</button>
            
            
                
            
        </form>

     </div>
    <div class="panel-footer">
        <label> Impresion de comprobante de orden de trabajo</label>
    </div>
</div>

</div>
<div class="container">

<div class="panel panel-info col-lg-8 col-lg-offset-2">
    <div class="panel-heading">
        <title> Impresión de repores</title>
    </div>
    <div class="panel-body">
        <form method="post" action="<?php echo base_url('Creportespdf/volanteCostoOt')?>" >
            <div class="form-group">
                <label>Ingrese codigo de la orden de trabajo</label>
                <input class="form-control" type="number" min="1" placeholder=" Codigo ot" required="true" id="ot" name="ot">
            </div>
            <button class=" btn btn-info"><span class="glyphicon glyphicon-print"></span> Imprimir Detalle Ot</button>
            
            
                
            
        </form>

     </div>
    <div class="panel-footer">
        <label> Impresion de volante detalle de servicios y dispositivos</label>
    </div>
</div>

</div>




