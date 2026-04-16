<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{SITE_TITLE}}</title>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
  
  <link rel="stylesheet" href="{{BASE_DIR}}/public/css/appstyle.css" />
  <link rel="stylesheet" href="{{BASE_DIR}}/public/css/carrusel.css" />
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

  {{foreach SiteLinks}}
  <link rel="stylesheet" href="{{~BASE_DIR}}/{{this}}" />
  {{endfor SiteLinks}}
  
  {{foreach BeginScripts}}
  <script src="{{~BASE_DIR}}/{{this}}"></script>
  {{endfor BeginScripts}}
</head>

<body>
  <header style="background: #000; color: #fff; padding: 10px 20px; display: flex; align-items: center;">
    <input type="checkbox" class="menu_toggle" id="menu_toggle" style="display:none;" />
    <label for="menu_toggle" class="menu_toggle_icon" style="cursor:pointer; margin-right: 15px;">
      <i class="fas fa-bars" style="font-size: 20px;"></i>
    </label>
    <span style="font-size: 14px; letter-spacing: 2px;">FLORISTERÍA</span>

    <nav id="menu">
      <ul>
        <li><a href="index.php?page=index"><i class="fas fa-home"></i>&nbsp;Inicio</a></li>
        {{foreach NAVIGATION}}
            <li><a href="{{nav_url}}">{{nav_label}}</a></li>
        {{endfor NAVIGATION}}
        {{if login}}
          <li><a href="index.php?page=sec_logout"><i class="fas fa-sign-out-alt"></i>&nbsp;Salir</a></li>
        {{endif login}}
      </ul>
    </nav>
  </header>

  <div style="padding: 30px 0; border-bottom: 1px solid #f0f0f0; background: #fff;">
      <div style="max-width: 1200px; margin: auto; display: flex; justify-content: space-between; align-items: center; padding: 0 20px;">
          
          <form action="index.php" method="get" style="display: flex; align-items: center; border-bottom: 1px solid #ccc;">
              <input type="hidden" name="page" value="Search">
              <button type="submit" style="background: none; border: none; cursor: pointer; padding: 5px;">
                  <i class="fas fa-search" style="font-size: 18px; color: #333;"></i>
              </button>
              <input type="text" name="term" placeholder="BUSCAR" style="border: none; outline: none; padding: 5px; width: 100px; font-size: 12px; text-transform: uppercase;">
          </form>

          <div style="text-align: center;">
              <a href="index.php" style="text-decoration: none; color: #000;">
                  <h1 style="font-family: 'Playfair Display', serif; font-size: 35px; letter-spacing: 12px; margin: 0; font-weight: 400;">LA FLORISTERÍA</h1>
                  <p style="font-size: 11px; letter-spacing: 6px; color: #888; margin: 0; text-indent: 10px;">HONDURAS</p>
              </a>
          </div>

          <div style="position: relative;">
              <a href="index.php?page=Cart" style="color: #000; text-decoration: none;">
                  <i class="fas fa-shopping-bag" style="font-size: 24px;"></i>
                  <span style="position: absolute; top: -10px; right: -12px; background: #000; color: #fff; border-radius: 50%; padding: 2px 7px; font-size: 10px; font-weight: bold;">0</span>
              </a>
          </div>
      </div>
  </div>

  <main>
    {{{page_content}}}
  </main>

  <footer style="background: #fff; padding: 40px 0; text-align: center; border-top: 1px solid #eee; margin-top: 50px;">
    <div style="font-size: 12px; color: #999; letter-spacing: 2px;">
        TODOS LOS DERECHOS RESERVADOS {{~CURRENT_YEAR}} &copy; LA FLORISTERÍA HONDURAS
    </div>
  </footer>

  {{foreach EndScripts}}
  <script src="{{~BASE_DIR}}/{{this}}"></script>
  {{endfor EndScripts}}
</body>
</html>