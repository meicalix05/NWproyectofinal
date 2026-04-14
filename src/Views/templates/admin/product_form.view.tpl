<section style="padding: 20px; font-family: sans-serif;">
    <h2 style="color: #2d5a27;">🌸 {{mode_dsc}}</h2>

    <form action="index.php?page=Admin_ProductForm" method="POST" enctype="multipart/form-data" 
          style="background: #f4f4f4; padding: 25px; border: 1px solid #ccc; max-width: 600px; border-radius: 8px;">
        
        <div style="margin-bottom: 15px;">
            <label style="font-weight: bold;">Nombre del Arreglo:</label><br>
            <input type="text" name="nombre" required style="width: 100%; padding: 12px; margin-top: 5px; box-sizing: border-box;">
        </div>

        <div style="display: flex; gap: 20px; margin-bottom: 15px;">
            <div style="flex: 1;">
                <label style="font-weight: bold;">Precio (Lps):</label>
                <input type="number" step="0.01" name="precio" required style="width: 100%; padding: 12px; margin-top: 5px; box-sizing: border-box;">
            </div>
            <div style="flex: 1;">
                <label style="font-weight: bold;">Stock:</label>
                <input type="number" name="stock" required style="width: 100%; padding: 12px; margin-top: 5px; box-sizing: border-box;">
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