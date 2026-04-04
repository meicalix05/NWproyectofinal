<section class="container">
    <table class="">
        <thead>
            <tr>
                <th>Código</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Año Fabricación</th>
                <th>Tipo Combustible</th>
                <th>Kilometraje</th>
                <th>
                    <a href="index.php?page=Mantenimientos-DatosVehiculos-Formulario&mode=INS&id=0">Nuevo</a>
                </th>
            </tr>
        </thead>
        <tbody>
            {{foreach vehiculos}}
            <tr>
                <td>{{id_vehiculo}}</td>
                <td>{{marca}}</td>
                <td>{{modelo}}</td>
                <td>{{anio_fabricacion}}</td>
                <td>{{tipo_combustible}}</td>
                <td>{{kilometraje}}</td>
                <td>
                    <a href="index.php?page=Mantenimientos-DatosVehiculos-Formulario&mode=DSP&id={{id_vehiculo}}">Mostrar</a>
                    <br/>
                    <a href="index.php?page=Mantenimientos-DatosVehiculos-Formulario&mode=UPD&id={{id_vehiculo}}">Actualizar</a>
                    <br/>
                    <a href="index.php?page=Mantenimientos-DatosVehiculos-Formulario&mode=DEL&id={{id_vehiculo}}">Eliminar</a>
                </td>
            </tr>
            {{endfor vehiculos}}
        </tbody>
    </table>
</section>