<link rel="stylesheet" href="public/css/checkout_success.css">

<div class="success-container">
    <div class="success-card">
        <div class="check-icon">✔</div>
        <h1 class="success-title">¡Pago Realizado con Éxito!</h1>
        <p class="order-number">Tu orden <strong>#{{orden_id}}</strong> ha sido generada correctamente.</p>
        
        <div class="order-summary">
            <h3 class="summary-header">Resumen de tu pedido</h3>
            
            {{foreach productos}}
                <div class="product-row">
                    <span>{{nombre}} <small class="qty-label">(x{{cantidad}})</small></span>
                    <span>L. {{cantidad * precio}}</span>
                </div>
            {{endfor productos}}

            <div class="total-row">
                <span>Total pagado:</span>
                <span>L. {{total}}</span>
            </div>
        </div>

        <p class="stock-notice">
            El inventario ha sido actualizado automáticamente. Los productos que alcanzaron stock cero ya no se mostrarán en la tienda.
        </p>

        <a href="index.php?page=HomeController" class="btn-return">
            VOLVER A LA TIENDA
        </a>
    </div>
</div>