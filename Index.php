<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
  <link rel="stylesheet" href="Css/Landing.css" />
  <link rel="shortcut icon" href="Img/logo New Drivers.jpg" />
  <title>New Drivers</title>
</head>

<body>

  <header>
    <nav>
      <div class="nav__logo"><a href="#"><img src="img/Logo.png"></a></div>
      <ul class="nav__links" id="nav-links">
        <li class="link"><a href="#home">Nosotros</a></li>
        <li class="link"><a href="#stats">Estadisticas</a></li>
        <li class="link"><a href="#blog">Preguntas frecuentes</a></li>
        <li class="link"><a href="#suscripcion">Precios</a></li>
        <li class="link"><a href="#contacto">Contactanos</a></li>
        <li class="link"><a href="php/Modulo-Login-Registro/Login.php">Iniciar sesión</a></li>
      </ul>
      <div class="nav__menu__btn" id="menu-btn">
        <span><i class="ri-menu-line"></i></span>
      </div>
    </nav>
    <div class="section__container header__container" id="home">
      <h1>Aprende a tú ritmo.</h1>
      <a href="php/Modulo-Login-Registro/Login.php"><button class="btn btn__secondary">
          Comenzar
          <span><i class="ri-arrow-right-double-line"></i></span>
        </button>
      </a>
    </div>
  </header>

  <section class="about" id="about">
    <div class="section__container about__container">
      <div class="about__grid">
        <div class="about__content">
          <p class="section__subheader">Sobre nosotros</p>
          <h2 class="section__header">Bienvenido a New Drivers</h2>
          <p class="para">
            En New Drivers, tienes el control total de tu proceso de aprendizaje de conducción.
            Puedes personalizar tu experiencia de varias maneras:
            <br>
            Selecciona tu propio horario de clases para adaptarlo a tu agenda. <br>
            Elige al profesor que mejor se ajuste a tus necesidades y estilo de aprendizaje.
            Durante tu curso, indica qué aspectos de la conducción deseas reforzar
            para enfocar tu entrenamiento de manera precisa.
          </p>
          <br />
          <p class="para">
            Si estás interesado en convertirte en instructor de New Drivers, simplemente inicia sesión y envía tu solicitud.
            Te responderemos por correo en unos pocos días para dar seguimiento a tu solicitud.
          </p>
        </div>
        <div class="about__list">
          <div class="about__item">
            <span><i class="ri-computer-fill"></i></span>
            <h4>Clases teoricas y practicas</h4>
          </div>
          <div class="about__item">
            <span><i class="ri-calendar-check-fill"></i></span>
            <h4>Escoge el horario que mas te acomode.</h4>
          </div>
          <div class="about__item">
            <span><i class="ri-thumb-up-fill"></i></span>
            <h4>Para escoger profesor, guiate por los comentarios de su perfil.</h4>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="stats" id="stats">
    <div class="section__container stats__container">
      <div class="stats__content">
        <p class="section__subheader">Empresa</p>
        <h2 class="section__header">Nuestros números</h2>
        <p class="para">
          En New Drivers, damos la bienvenida tanto a nuevos estudiantes como a instructores altamente capacitados,
          uniendo a aquellos que desean convertirse en conductores con quienes están listos para enseñarles.
        </p>
        <div class="stats__grid">

          <div class="stats__card">
            <span><i class="ri-team-fill"></i></i></span>
            <h4>1920</h4>
            <p>Estudiantes</p>
          </div>
          <div class="stats__card">
            <span><i class="ri-car-fill"></i></span>
            <h4>476</h4>
            <p>Profesores</p>
          </div>
          <div class="stats__card">
            <span><i class="ri-trophy-fill"></i></span>
            <h4>1365</h4>
            <p>Cursos Completados</p>
          </div>

          <div class="stats__card">
            <span><i class="ri-graduation-cap-fill"></i></i></span>
            <h4>930</h4>
            <p>Estudiantes con licencia aprobada</p>
          </div>
        </div>
      </div>
      <div class="stats__image">
        <img src="Img/Imagenes-landing/practica.jpg" alt="stats" />
        <img src="Img/Imagenes-landing/estudiante.jpg" alt="stats" />
      </div>
    </div>
  </section>

  <section class="banner">
    <div class="section__container banner__container">
      <div class="banner__content">
        <p class="section__subheader">Más Información</p>
        <h2 class="section__header">
          New Drivers nació como una necesidad.
        </h2>
        <p class="para">
          Dado que numerosos conductores novatos carecen de familiares o conocidos que les enseñen a conducir por primera vez,
          en New Drivers nos enfocamos en acoger a todas aquellas personas interesadas en aprender.
        </p>
        <div class="banner__btns">
          <button class="btn btn__secondary">
            Ver más
            <span><i class="ri-arrow-right-double-line"></i></span>
          </button>
        </div>
      </div>
    </div>
  </section>

  <section class="blog" id="blog">
    <div class="section__container blog__container">
      <p class="section__subheader">Consultas</p>
      <h2 class="section__header">Preguntas Frecuentes</h2>
      <div class="blog__grid">
        <div class="blog__card">
          <img src="Img/Imagenes-landing/horario.jpg" alt="blog" />

          <h4>¿Puedo escoger el horario de mis clases?</h4>
          <p>
            Si, en New Drivers los alumnos cuentan con la capacidad de escoger sus
            propios horarios, para que de esta forma adapten sus clases teoricas o practicas
            a su vida cotidiana.
          </p>
        </div>
        <div class="blog__card">
          <img src="Img/Imagenes-landing/teorica.jpg" alt="blog" />

          <h4>¿Que tipo de clases hay?</h4>
          <p>
            En los cursos de New Drivers se imparten clases teoricas y practicas. Esto
            va variando segun el conocimiento que posea el alumno junto a sus habilidades delante
            del volante.
          </p>
        </div>
        <div class="blog__card">
          <img src="Img/Imagenes-landing/llaves.png" alt="blog" />

          <h4>¿Que se necesita para dar clases?</h4>
          <p>
            Para convertirte en un profesor de New Drivers deberas rellenar un formulario con
            todos los documentos necesarios que validen que estas capacitado para poder enseñar a conducir.
            Ademas deberas contar con un vehiculo personal para poder dar clases.
          </p>
        </div>
      </div>
    </div>
  </section>

  <section class="section__container price__container" id="suscripcion">
    <h2 class="section__subheader">Nuestros precios</h2>
    <p class="section__header">
      Nuestros cursos son eficientes, sin costos adicionales y buscan optimizar tu tiempo como estudiante.
    </p>
    <div class="price__grid">
      <div class="price__card">
        <div class="price__card__content">
          <h4>Curso Completo</h4>
          <h3>$180.000</h3>
          <p><i class="ri-checkbox-circle-line"></i>Teorica o practica</p>
          <p><i class="ri-checkbox-circle-line"></i>Profesor a elección</p>
          <p><i class="ri-checkbox-circle-line"></i>Horarios convenientes</p>
          <p><i class="ri-checkbox-circle-line"></i>Indicar necesidades primordiales</p>
        </div>
        <a href="php/Modulo-Login-Registro/Login.php" class="price__btn-link">
          <button class="btn price__btn">Contratar</button>
        </a>
      </div>
      <div class="price__card">
        <div class="price__card__content">
          <h4>Clases extras</h4>
          <h3>$24.000 c/u</h3>
          <p><i class="ri-checkbox-circle-line"></i>Teorica o practica</p>
          <p><i class="ri-checkbox-circle-line"></i>Profesor a eleccion</p>
          <p><i class="ri-checkbox-circle-line"></i>Horarios convenientes</p>
          <p><i class="ri-checkbox-circle-line"></i>Indicar que necesita practicar</p>
          <p><i class="ri-checkbox-circle-line"></i>Cantidad de clases ilimitadas</p>
        </div>
        <a href="php/Modulo-Login-Registro/Login.php" class="price__btn-link">
          <button class="btn price__btn">Contratar</button>
        </a>
      </div>
    </div>
  </section>

  <footer class="footer" id="contacto">
    <div class="section__container footer__container">
      <div class="footer__col">
        <div class="logo_footer"><a href=""><img src="img/Logo.png"></a></div>
        <p>
          Te entregamos la seguridad y comodidad que buscas al momento de comenzar tu aprendizaje como nuevo conductor.
        </p>
        <div class="footer__socials">
          <a href="#"><i class="ri-facebook-fill"></i></a>
          <a href="#"><i class="ri-twitter-fill"></i></a>
          <a href="#"><i class="ri-instagram-line"></i></a>
        </div>
      </div>
      <div class="footer__col">
        <h4>Accesos rapidos</h4>
        <div class="footer__links">
          <a href="#home">Sobre nosotros</a>
          <a href="#stats">Estadisticas</a>
          <a href="#blog">Preguntas frecuentes</a>
          <a href="#suscripcion">Precios</a>
          <a href="php/Modulo-Login-Registro/Login.php">Iniciar sesion</a>
        </div>
      </div>
      <div class="footer__col">
        <h4>Contactanos</h4>
        <div class="footer__links">
          <a href="#">NewDrivers@gmail.com</a>
          <a href="#">+56 9 1046 89140</a>
        </div>

      </div>
      <div class="footer__col">
        <h4>Ayuda</h4>
        <div class="footer__links">
          <a href="#">Politicas de privacidad</a>
          <a href="#">Terminos y condiciones</a>
        </div>

      </div>
    </div>
    <div class="footer__bar">
      Copyright © 2023 New Drivers. Todos los derechos reservados.
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
  <script src="https://unpkg.com/scrollreveal"></script>
  <script src="Js/main.js"></script>

</body>

</html>