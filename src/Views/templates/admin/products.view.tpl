<section style="padding: 20px; font-family: sans-serif;">
    <h1 style="color: #2d5a27;">🌿 Panel de Administración: Florería</h1>
    <hr>

    <div style="margin-bottom: 20px;">
        <a href="index.php?page=Admin_ProductForm" 
           style="background: #2d5a27; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; font-weight: bold;">
           + Nuevo Producto
        </a>
    </div>

    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr style="background: #f4f4f4; border-bottom: 2px solid #2d5a27;">
                <th style="padding: 10px;">Imagen</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody>
            {{foreach products}}
            <tr style="border-bottom: 1px solid #eee; text-align: center;">
                <td style="padding: 10px;">
                    <img src="public/img/productos/{{imagen}}" width="50" style="border-radius: 5px;">
                </td>
                <td style="text-align: left; padding-left: 15px;">{{nombre}}</td>
                <td>L. {{precio}}</td>
                <td>{{stock}}</td>
            </tr>
            {{endfor products}}
        </tbody>
    </table>
</section>