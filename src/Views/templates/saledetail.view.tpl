<section class="container" style="padding: 60px 20px; font-family: 'Playfair Display', serif; max-width: 700px;">
    <div style="border: 1px solid #000; padding: 40px;">
        <h2 class="text-center" style="text-transform: uppercase; letter-spacing: 3px;">Detalle de Orden #{{orden.id_venta}}</h2>
        <p class="text-center" style="font-size: 0.8rem; color: #666;">Fecha: {{orden.fecha_venta}}</p>
        <br>
        <table style="width: 100%; border-collapse: collapse;">
            {{foreach detalle}}
            <tr style="border-bottom: 1px solid #eee;">
                <td style="padding: 15px 0;">{{producto_nombre}} (x{{cantidad}})</td>
                <td style="text-align: right;">L. {{precio_unitario}}</td>
            </tr>
            {{endfor detalle}}
            <tr>
                <td style="padding-top: 20px; font-weight: bold; text-transform: uppercase;">Total Pagado</td>
                <td style="padding-top: 20px; text-align: right; font-weight: bold; font-size: 1.2rem;">L. {{orden.total}}</td>
            </tr>
        </table>
        <div class="text-center" style="margin-top: 40px;">
            <a href="index.php?page=History" style="color: #000; text-decoration: underline; font-size: 0.8rem;">Regresar al Historial</a>
        </div>
    </div>
</section>