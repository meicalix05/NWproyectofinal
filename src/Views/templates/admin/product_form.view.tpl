<section style="padding: 20px; font-family: sans-serif;">
    <h2 style="color: #2d5a27;">🌸 {{mode_dsc}}</h2>

    {{if error}}
    <div style="background: #ffcccc; color: #990000; padding: 10px; margin-bottom: 15px; border-radius: 4px; max-width: 600px;">
        ⚠️ {{error}}
    </div>
    {{endif error}}

    <form action="index.php?page=Admin_ProductForm" method="POST" enctype="multipart/form-data" 
          style="background: #f4f4f4; padding: 25px; border: 1px solid #ccc; max-width: 600px; border-radius: 8px;">
        
        <div style="margin-bottom: 15px;">
            <label style="font-weight: bold;">Nombre del Arreglo:</label><br>
            <input type="text" name="nombre" required 
                   style="width: 100%; padding: 12px; margin-top: 5px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label style="font-weight: bold;">Categoría del Arreglo:</label><br>
            <select name="id_categoria" required 
                    style="width: 100%; padding: 12px; margin-top: 5px; box-sizing: border-box; background: white; border: 1px solid #ccc; border-radius: 4px;">
                <option value="" disabled selected>Seleccione una categoría</option>
                <option value="1">Amor</option>
                <option value="2">Cumpleaños</option>
                <option value="3">Graduación</option>
                <option value="4">Ramos</option>
                <option value="5">Caballeros</option>
                <option value="6">Condolencias</option>
                <option value="7">Mamá / Ofertas</option>
                <option value="8">Premium</option>
            </select>
        </div>

        <div style="margin-bottom: 15px;">
            <label style="font-weight: bold;">Descripción del Arreglo:</label><br>
            <textarea name="descripcion" required rows="4"
                      placeholder="Ej: Incluye 12 rosas rojas, follaje premium y caja decorativa..."
                      style="width: 100%; padding: 12px; margin-top: 5px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; font-family: sans-serif; resize: none;"></textarea>
        </div>

        <div style="display: flex; gap: 20px; margin-bottom: 15px;">
            <div style="flex: 1;">
                <label style="font-weight: bold;">Precio (Lps):</label>
                <input type="number" step="0.01" name="precio" required 
                       style="width: 100%; padding: 12px; margin-top: 5px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            <div style="flex: 1;">
                <label style="font-weight: bold;">Stock:</label>
                <input type="number" name="stock" id="stock_field" min="1" required 
                       oninput="checkStock(this.value)"
                       style="width: 100%; padding: 12px; margin-top: 5px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px;">
            </div>
        </div>

        <div style="margin-bottom: 25px;">
            <label style="font-weight: bold;">Fotografía:</label><br>
            <input type="file" name="imagen_file" accept="image/*" style="margin-top: 10px;">
        </div>

        <button type="submit" style="background: #2d5a27; color: white; padding: 15px; width: 100%; border: none; cursor: pointer; font-weight: bold; border-radius: 4px;">
            GUARDAR E IR A LISTA
        </button>

        <p style="text-align: center; margin-top: 15px;">
            <a href="index.php?page=Admin_Productos" style="color: #666; text-decoration: none;">❌ Cancelar</a>
        </p>
    </form>
</section>

<script>
    function checkStock(val) {
        if (parseInt(val) === 1) {
            alert("⚠️ Advertencia: El stock está llegando a su límite (1 unidad restante).");
        }
    }
</script>