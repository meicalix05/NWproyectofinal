<h1>{{modeDsc}}</h1>
<section class="grid row">
    <form class="depth-0 offset-3 col-6" action="index.php?page=Mantenimientos-DatosVehiculos-Formulario&mode={{mode}}&id={{id}}" method="POST">
        <div class="row align-center">
            <div class="col-4">
                <label for="id">Código</label>
            </div>
            <div class="col-8">
                <input type="text" value="{{id}}" disabled name="idux" id="id" readonly/>
                <input type="hidden" name="id" value="{{id}}" />
                <input type="hidden" name="uuid" value="{{xsrf_token}}" />
            </div>
        </div>
        <div class="row align-center">
            <div class="col-4">
                <label for="marca">Marca</label>
            </div>
            <div class="col-8">
                <input type="text" name="marca" id="marca" value="{{marca}}" placeholder="Marca del Vehículo" {{isReadonly}} />
            </div>
        </div>
        <div class="row align-center">
            <div class="col-4">
                <label for="modelo">Modelo</label>
            </div>
            <div class="col-8">
                <input type="text" name="modelo" id="modelo" value="{{modelo}}" placeholder="Modelo del Vehículo" {{isReadonly}} />
            </div>
        </div>
        <div class="row align-center">
            <div class="col-4">
                <label for="anio_fabricacion">Año Fabricación</label>
            </div>
            <div class="col-8">
                <input type="text" name="anio_fabricacion" id="anio_fabricacion" value="{{anio_fabricacion}}" placeholder="Año de Fabricación" {{isReadonly}} />
            </div>
        </div>
        <div class="row align-center">
            <div class="col-4">
                <label for="tipo_combustible">Tipo Combustible</label>
            </div>
            <div class="col-8">
                <input type="text" name="tipo_combustible" id="tipo_combustible" value="{{tipo_combustible}}" placeholder="Tipo de Combustible" {{isReadonly}} />
            </div>
        </div>
        <div class="row align-center">
            <div class="col-4">
                <label for="kilometraje">Kilometraje</label>
            </div>
            <div class="col-8">
                <input type="text" name="kilometraje" id="kilometraje" value="{{kilometraje}}" placeholder="Kilometraje del Vehículo" {{isReadonly}} />
            </div>
        </div>
        {{if confirmToolTip}}
            <div class="error">
                {{confirmToolTip}}
            </div>
        {{endif confirmToolTip}}
        <div class="right">
            {{ifnot hideConfirm}}
            <button type="submit" name="btnEnviar">Confirmar</button>
            {{endifnot hideConfirm}}
            &nbsp;
            <button id="btnCancelar">Cancelar</button>
        </div>
    </form>
</section>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        document.getElementById("btnCancelar").addEventListener("click", (e) => {
            e.preventDefault();
            e.stopPropagation();
            window.location.assign("index.php?page=Mantenimientos-DatosVehiculos-Listado");
        });
    });
</script>