<style>
    /* 1. Estructura de dos columnas (Imagen a la izquierda, Texto a la derecha) */
    .product-container {
        display: flex;
        flex-wrap: wrap;
        gap: 40px;
        padding: 20px;
        max-width: 1000px;
        margin: 0 auto;
        font-family: Arial, sans-serif;
    }

    .product-image-column {
        flex: 1;
        min-width: 300px;
    }

    .product-image-column img {
        width: 100%;
        height: auto;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .product-info-column {
        flex: 1;
        min-width: 300px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    /* 2. Estilos del botón y cantidad (que ya te gustaron) */
    .purchase-row {
        display: flex !important;
        align-items: stretch !important;
        margin: 20px 0;
        max-width: 350px;
    }

    .quantity-box {
        width: 60px !important;
        height: 48px !important;
        border: 1px solid #ccc !important;
        border-right: none !important;
        border-radius: 4px 0 0 4px !important;
        text-align: center;
        font-size: 1.1rem;
    }

    .add-btn-green {
        flex-grow: 1;
        height: 48px !important;
        background-color: #b3bd8c !important; /* Tu verde oliva */
        color: #444 !important;
        border: 1px solid #ccc !important;
        border-radius: 0 4px 4px 0 !important;
        font-weight: bold;
        cursor: pointer;
        text-transform: uppercase;
    }
</style>

<div class="product-container">
    <div class="product-image-column">
        <img src="public/img/productos/{{imagen}}" alt="{{nombre}}" 
             onerror="this.src='public/img/productos/default.jpg';">
    </div>

    <div class="product-info-column">
        <span style="color: #888; font-size: 0.9rem;">La Floristería Honduras</span>
        <h1 style="margin: 10px 0; font-size: 2rem;">{{nombre}}</h1>
        <p style="font-size: 1.5rem; font-weight: bold; color: #333;">L. {{precio}}</p>
        
        <p style="margin: 15px 0; color: #555;">{{descripcion}}</p>
        <p>Disponibles: <strong>{{stock}}</strong> unidades</p>

        {{if canBuy}}
            <form action="index.php?page=CartAdd" method="POST">
                <input type="hidden" name="id_producto" value="{{id_producto}}">
                <div class="purchase-row">
                    <input type="number" name="cantidad" value="1" min="1" max="{{stock}}" class="quantity-box">
                    <button type="submit" class="add-btn-green">
                        AGREGAR AL CARRITO
                    </button>
                </div>
            </form>
        {{endif canBuy}}

        <a href="index.php?page=Category&id={{id_categoria}}" style="color: #666; text-decoration: underline; margin-top: 10px;">
            Ver más arreglos
        </a>
    </div>
</div>