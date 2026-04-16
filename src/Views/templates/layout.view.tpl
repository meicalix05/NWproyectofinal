<!DOCTYPE html>

<html>

<head>

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>{{SITE_TITLE}}</title>

  <link rel="preconnect" href="https://fonts.gstatic.com">

  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="{{BASE_DIR}}/public/css/appstyle.css" />

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">

  <link rel="stylesheet" href="/PROYECTO_WEB/NWproyectofinal/public/css/carrusel.css">
  <link rel="stylesheet" href="/PROYECTO_WEB/NWproyectofinal/public/css/product_detail.css">
  <link rel="stylesheet" href="/PROYECTO_WEB/NWproyectofinal/public/css/checkout_success.css">

  <script src="https://kit.fontawesome.com/{{FONT_AWESOME_KIT}}.js" crossorigin="anonymous"></script>

   <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

  {{foreach SiteLinks}}

    <link rel="stylesheet" href="{{~BASE_DIR}}/{{this}}" />

  {{endfor SiteLinks}}

  {{foreach BeginScripts}}

    <script src="{{~BASE_DIR}}/{{this}}"></script>

  {{endfor BeginScripts}}

</head>

<body>

  <header>

    <input type="checkbox" class="menu_toggle" id="menu_toggle" />

    <label for="menu_toggle" class="menu_toggle_icon" >

      <div class="hmb dgn pt-1"></div>

      <div class="hmb hrz"></div>

      <div class="hmb dgn pt-2"></div>

    </label>

    <h1>{{SITE_TITLE}}</h1>

    <nav id="menu">

      <ul>

        <li><a href="index.php?page={{PUBLIC_DEFAULT_CONTROLLER}}"><i class="fas fa-home"></i>&nbsp;Inicio</a></li>

        <li>

          <a href="/Proyecto_web/NWproyectofinal/index.php?page=Admin_Productos">

            <i class="fas fa-leaf"></i> Lista de Productos

        </a>

      </li>
      <li>
    <a href="index.php?page=History">
        <i class="fas fa-leaf"></i> Histórico de Transacciones
    </a>
</li>

        {{foreach PUBLIC_NAVIGATION}}

            <li><a href="{{nav_url}}">{{nav_label}}</a></li>

        {{endfor PUBLIC_NAVIGATION}}

      </ul>

    </nav>

  </header>

  <main>

  {{{page_content}}}

  </main>

  <footer>

    <div>Todo los Derechos Reservados {{~CURRENT_YEAR}} &copy;</div>

  </footer>

  {{foreach EndScripts}}

    <script src="{{~BASE_DIR}}/{{this}}"></script>

  {{endfor EndScripts}}

</body>

</html>