<style>
    .history-wrapper {
        padding: 40px;
        max-width: 1000px;
        margin: 0 auto;
        font-family: 'Segoe UI', Tahoma, sans-serif;
    }
    
    /* Contenedor principal de cada transacción */
    .transaction-card {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 6px 15px rgba(0,0,0,0.1);
        margin-bottom: 50px; /* Separación amplia entre facturas */
        border: 1px solid #e0e0e0;
        overflow: hidden;
    }

    /* Encabezado superior de la factura */
    .sale-header {
        background-color: #b3bd8c; /* Tu color verde oliva */
        color: white;
        padding: 20px;
        display: grid;
        grid-template-columns: 1fr 2fr 1.5fr 1.5fr;
        font-weight: bold;
        text-transform: uppercase;
        font-size: 0.9rem;
        letter-spacing: 1px;
    }

    .sale-data {
        background: #fdfdfd;
        padding: 15px 20px;
        display: grid;
        grid-template-columns: 1fr 2fr 1.5fr 1.5fr;
        border-bottom: 2px dashed #eee;
        align-items: center;
        font-size: 1.1rem;
    }

    /* Sección de productos desmontada */
    .products-section {
        padding: 25px;
        background-color: #ffffff;
    }

    .products-section h4 {
        margin-top: 0;
        color: #b3bd8c;
        border-bottom: 1px solid #f0f0f0;
        padding-bottom: 10px;
        margin-bottom: 15px;
    }

    .product-item-table {
        width: 100%;
        border-collapse: collapse;
    }

    .product-item-table thead th {
        text-align: left;
        color: #888;
        font-size: 0.8rem;
        padding: 10px;
        background: #f9f9f9;
        border-radius: 4px;
    }

    .product-item-table td {
        padding: 12px 10px;
        border-bottom: 1px solid #f5f5f5;
        color: #444;
    }

    .badge-method {
        background: #fff;
        color: #666;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 0.85rem;
        border: 1px solid #ddd;
    }
</style>

<div class="history-wrapper">
    <h1>Historial de Transacciones</h1>
    <p>Detalle completo de tus pedidos en La Floristería.</p>

    {{if tiene_ventas}}
        {{foreach compras}}
        <div class="transaction-card">
            <div class="sale-header">
                <div>Factura #</div>
                <div>Fecha de Compra</div>
                <div>Método</div>
                <div>Total</div>
            </div>
            
            <div class="sale-data">
                <div><strong>#{{salesid}}</strong></div>
                <div>{{salesdate}}</div>
                <div><span class="badge-method">{{method}}</span></div>
                <div style="color: #b3bd8c;"><strong>L. {{salestotal}}</strong></div>
            </div>

            <div class="products-section">
                <h4>Artículos en este pedido:</h4>
                <table class="product-item-table">
                    <thead>
                        <tr>
                            <th style="width: 50%;">Producto</th>
                            <th style="width: 20%;">Cantidad</th>
                            <th style="width: 30%;">Precio Unitario</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{foreach detalles}}
                        <tr>
                            <td>{{nombre}}</td>
                            <td>{{cantidad}} unidad(es)</td>
                            <td>L. {{precio_unitario}}</td>
                        </tr>
                        {{endfor detalles}}
                    </tbody>
                </table>
                <div style="margin-top: 15px; text-align: right;">
                    <small style="color: #ccc;">Ref. Transacción: {{track}}</small>
                </div>
            </div>
        </div>
        {{endfor compras}}
    {{endif tiene_ventas}}

    {{ifnot tiene_ventas}}
        <div style="text-align: center; padding: 50px;">
            <p>No se encontraron compras en tu historial.</p>
        </div>
    {{endifnot tiene_ventas}}
</div>