<link rel="stylesheet" href="public/css/category.css">

<section class="premium-banner-full">
    <div class="banner-overlay-dark">
        <h1>{{titulo_categoria}}</h1>
        <p>Transformamos emociones en arte floral.</p>
    </div>
</section>

<div class="category-main-layout">
    <aside class="filter-sidebar">
        <div class="filter-group">
            <h3>DISPONIBILIDAD</h3>
            <label>
                <input type="checkbox" checked disabled> En existencia
            </label>
            <label>
                <input type="checkbox" disabled> Agotado
            </label>
        </div>
        
        <div class="filter-group">
            <h3>PRECIO</h3>
            <div class="price-inputs">
                <div class="input-row">
                    <span>L. </span>
                    <input type="number" placeholder="0">
                </div>
                <div class="input-row">
                    <span>L. </span>
                    <input type="number" placeholder="5000">
                </div>
            </div>
        </div>
        
        <div class="filter-group">
            <h3>ORDENAR POR</h3>
            <select class="filter-select">
                <option>Novedades</option>
                <option>Precio: Menor a Mayor</option>
                <option>Precio: Mayor a Menor</option>
            </select>
        </div>
    </aside>

    <main class="products-display">
        <div class="products-grid">
            {{foreach productos}}
            <div class="flower-card">
                <div class="image-box">
                    <img src="public/img/productos/{{imagen}}" 
                         alt="{{nombre}}" 
                         onerror="this.src='public/img/productos/default.jpg';">
                </div>
                
                <div class="flower-info">
                    <h4>{{nombre}}</h4>
                    <p class="price-tag">L. {{precio}}</p>
                    
                    <a href="index.php?page=Product&id={{id_producto}}" class="btn-detail">
                        VER DETALLES
                    </a>
                </div>
            </div>
            {{endfor productos}}
        </div>

        {{ifnot productos}}
        <div class="no-products">
            <p>Lo sentimos, no hay arreglos disponibles en esta categoría por el momento.</p>
            <a href="index.php">Volver al inicio</a>
        </div>
        {{endifnot productos}}
    </main>
</div>