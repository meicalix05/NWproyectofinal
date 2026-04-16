<section style="padding: 50px; max-width: 900px; margin: auto; font-family: sans-serif;">
    <h1 style="color: #2d5a27; font-weight: 300; border-bottom: 1px solid #eee; padding-bottom: 20px;">Tu Carrito 🛒</h1>
    
    {{if items}}
        <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <thead>
                <tr style="text-align: left; color: #888; font-size: 0.9rem; border-bottom: 2px solid #f4f4f4;">
                    <th>Producto</th>
                    <th>Detalles</th>
                    <th>Cantidad</th>
                    <th style="text-align: right;">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                {{foreach items}}
                <tr style="border-bottom: 1px solid #eee;">
                    <td style="padding: 15px 10px;">
                        <img src="public/img/productos/{{imagen}}" style="width: 70px; border-radius: 4px;">
                    </td>
                    <td>
                        <span style="display: block; font-weight: bold;">{{nombre}}</span>
                        <small>L. {{precio}}</small>
                    </td>
                    <td>{{cantidad}}</td>
                    <td style="text-align: right; font-weight: bold; color: #2d5a27;">
                        L. {{subtotal_item}}
                    </td>
                </tr>
                {{endfor items}}
            </tbody>
        </table>

        <div style="margin-top: 30px; text-align: right; background: #fdfdfd; padding: 20px;">
            <p>Subtotal: L. {{subtotal_carrito}}</p>
            <p>ISV (15%): L. {{isv}}</p>
            <h2 style="color: #2d5a27;">Total: L. {{total_carrito}}</h2>
            
            <div id="paypal-button-container" style="max-width: 300px; margin-left: auto; margin-top: 20px;"></div>
        </div>

        <script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD"></script>
        <script>
            paypal.Buttons({
                createOrder: function(data, actions) {
                    return actions.order.create({
                        purchase_units: [{ amount: { value: '{{total_raw}}' } }]
                    });
                },
                onApprove: function(data, actions) {
                    return actions.order.capture().then(function(details) {
                        window.location.href = "index.php?page=CheckoutSuccess&orderID=" + data.orderID;
                    });
                }
            }).render('#paypal-button-container');
        </script>
    {{else}}
        <div style="text-align: center; padding: 60px;">
            <p>Tu carrito está vacío. 🌸</p>
            <a href="index.php" style="color: #2d5a27;">Volver a la tienda</a>
        </div>
    {{endif items}}
</section>