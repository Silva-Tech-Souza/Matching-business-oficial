<?php
session_start();
if (isset($_COOKIE["remember_me"])) {

  header("Location: controller/loginController.php");
}
error_reporting(0);
date_default_timezone_set('America/Sao_Paulo');

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Matching Business</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets2/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets2/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="assets2/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets2/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets2/vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets2/css/main.css" rel="stylesheet">
<link rel="apple-touch-icon" href="assets2/img/logoapp.png">
<link rel="apple-touch-icon" sizes="152x152" href="assets2/img/logoapp.png">
<link rel="apple-touch-icon" sizes="180x180" href="assets2/img/logoapp.png">
<link rel="apple-touch-icon" sizes="167x167" href="assets2/img/logoapp.png">
<meta name="apple-mobile-web-app-capable" content="yes" />
<link href="assets2/img/logoapp.png" sizes="2048x2732" rel="apple-touch-startup-image" />
<link rel="manifest" href="manifest.json">
</head>
<body>
<script>
if ('serviceWorker' in navigator) {
    console.log("teste");
  navigator.serviceWorker.register('sw.js')
    .then(function(registration) {
      console.log('Service Worker registrado com sucesso:', registration);
    })
    .catch(function(error) {
      console.log('Falha ao registrar o Service Worker:', error);
    });
}else{
    console.log("teste");
}
</script>
    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img src="assets2/img/logo.png" alt="logo">
                <h4 style="
                margin-left: 20px;
                color: white;
                font-weight: 100;
            ">Matching Business Online</h4>
            </a>

            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="#" class="active">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Seach Profile</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a class="" href="view/login.php"><u>Login</u></a></li>
                    <li><a class="get-a-quote" href="view/signup.php">Sign up</a></li>
                </ul>
            </nav>
            <!-- .navbar -->

        </div>
    </header>
    <!-- End Header -->
    <!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center">
        <div class="container" style="margin-top: 35px;">
            <div class="row gy-4 d-flex justify-content-between">
                <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <h2 data-aos="fade-up">Connecting Industry and Distribution Globally</h2>
                    <p data-aos="fade-up" data-aos-delay="100">Discover a new way to accelerate your business in the international market. Matching Business is the platform that proactively brings together supply and demand, providing a powerful digital tool for direct connections.</p>

                    <a href="view/login.php" id="meuBotaoDeDownload" class="btn btn-primary cta-btn btnbanner" data-aos="fade-up" data-aos-delay="100">Join our ecosystem</a>

                    <div class=" row gy-4 " data-aos="fade-up " data-aos-delay="400 " style="margin-top: 30px;">

                        <div class="col-lg-3 col-6 ">
                            <div class="stats-item text-center w-100 h-100 ">
                                <span data-purecounter-start="0 " data-purecounter-end="150 " data-purecounter-duration="1 " class="purecounter "></span>
                                <p>Dispenser</p>
                            </div>
                        </div>
                        <!-- End Stats Item -->

                        <div class="col-lg-3 col-6 ">
                            <div class="stats-item text-center w-100 h-100 ">
                                <span data-purecounter-start="0 " data-purecounter-end="200 " data-purecounter-duration="1 " class="purecounter "></span>
                                <p>Manufacturer</p>
                            </div>
                        </div>
                        <!-- End Stats Item -->

                        <div class="col-lg-3 col-6 ">
                            <div class="stats-item text-center w-100 h-100 ">
                                <span data-purecounter-start="0 " data-purecounter-end="183 " data-purecounter-duration="1 " class="purecounter "></span>
                                <p>Raw Material Supplier</p>
                            </div>
                        </div>
                        <!-- End Stats Item -->

                        <div class="col-lg-3 col-6 ">
                            <div class="stats-item text-center w-100 h-100 ">
                                <span data-purecounter-start="0 " data-purecounter-end="150" data-purecounter-duration="1 " class="purecounter "></span>
                                <p>Services</p>
                            </div>
                        </div>
                        <!-- End Stats Item -->

                    </div>
                </div>

                <div class="col-lg-5 order-1 order-lg-2 hero-img d-none d-sm-block " data-aos="zoom-out ">
                    <img src="assets2/img/hero-img.svg " class="img-fluid mb-3 mb-lg-0 d imgbanner" alt=" ">
                </div>

            </div>
        </div>
    </section>
    <!-- End Hero Section -->

    <main id="main ">

   

        <!-- ======= About Us Section ======= -->
        <section id="about " class="about pt-0 ">
            <div class="container " data-aos="fade-up ">

                <div class="row gy-4 ">
                    <div class="col-lg-6 position-relative align-self-start order-lg-last order-first ">
                        <img src="assets2/img/about.png " class="img-fluid " alt=" ">
                        <a href="assets2/img/videoExplicativo.mp4" class="glightbox play-btn "></a>
                    </div>
                    <div class="col-lg-6 content order-last order-lg-first ">
                        <h3>About Us</h3>
                        <p>
                            Matching Business was born from a partnership between LABD & HTM in October 2022, with a bold goal: to launch the platform via www.latambd.com.br in March 2023. Our mission is simple — to bridge the gap between industries and distributors worldwide ,
                            making global market access effortless.
                        </p>
                        <ul>
                            <li data-aos="fade-up " data-aos-delay="100 ">
                                <i class="bi bi-diagram-3 "></i>
                                <div>
                                    <h5>MISSION</h5>
                                    <p>Offer the Brazilian and Latin American markets a platform of business development helping small and medium-sized companies to become develop
                                    </p>
                                </div>
                            </li>
                            <li data-aos="fade-up " data-aos-delay="200 ">
                                <i class="bi bi-fullscreen-exit "></i>
                                <div>
                                    <h5>VISION</h5>
                                    <p>Lead the flow of international business, being world reference in accessing Latin American markets is Brazilian</p>
                                </div>
                            </li>
                            <li data-aos="fade-up " data-aos-delay="300 ">
                                <i class="bi bi-broadcast "></i>
                                <div>
                                    <h5>VALUES</h5>
                                    <p>Act transparently, ethically and honestly with entire business chain, charging fair fees and valuing all commercial partners committed to the common goals.</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </section>
        <!-- End About Us Section -->
     <!-- ======= Featured Services Section ======= -->
        <section id="featured-services " class="featured-services ">
            <div class="container ">

                <div class="row gy-4 ">

                    <div class="col-lg-3 col-md-6 service-item d-flex " data-aos="fade-up ">
                        <div class="icon flex-shrink-0 "><i class="fas fa-search"></i></div>
                        <div>
                            <h4 class="title ">Advanced Search</h4>
                            <p class="description ">Effortlessly locate demands and offerings aligned with your interests and objectives. Our smart search engine employs filters and parameters to precisely match your requirements, saving you time and effort.</p>

                        </div>
                    </div>
                    <!-- End Service Item -->

                    <div class="col-lg-3 col-md-6 service-item d-flex " data-aos="fade-up " data-aos-delay="100 ">
                        <div class="icon flex-shrink-0 "><i class="fas fa-handshake"></i></div>
                        <div>
                            <h4 class="title ">Direct Contact</h4>
                            <p class="description ">Engage in direct, efficient conversations with key stakeholders to expedite collaborations. With our intuitive interface, you can initiate conversations, negotiate terms, and establish partnerships, all in one place.</p>

                        </div>
                    </div>
                    <!-- End Service Item -->

                    <div class="col-lg-3 col-md-6 service-item d-flex " data-aos="fade-up " data-aos-delay="200 ">
                        <div class="icon flex-shrink-0 "> <i class="fas fa-comments"></i></div>
                        <div>
                            <h4 class="title ">Internal Communication</h4>
                            <p class="description ">Stay interconnected and well-informed within your network through our intuitive messaging system. Receive instant notifications, exchange important updates, and strengthen relationships with seamless communication.</p>

                        </div>
                    </div>
                    <!-- End Service Item -->


                    <div class="col-lg-3 col-md-6 service-item d-flex " data-aos="fade-up " data-aos-delay="200 ">
                        <div class="icon flex-shrink-0 "><i class="fas fa-globe"></i></div>
                        <div>
                            <h4 class="title ">Global Monitoring</h4>
                            <p class="description ">Stay ahead of the curve by monitoring global areas of interest and trends, enabling strategic decision-making. Access real-time data, market analysis, and valuable insights that empower you to make informed choices and seize
                                opportunities.
                            </p>

                        </div>
                    </div>
                    <!-- End Service Item -->
                </div>

            </div>
        </section>
        <!-- End Featured Services Section -->
        <!-- ======= Services Section ======= -->
        <section id="service " class="services pt-0 ">
            <div class="container " data-aos="fade-up ">

                <div class="section-header ">
                    <span>Our Platform</span>
                    <h2>Our Platform</h2>

                </div>

                <div class="row gy-4 " style="
                text-align: start;
                justify-content: center;
            ">

                    <div class="col-lg-4 col-md-6 " data-aos="fade-up " data-aos-delay="100 ">
                        <div class="card ">
                            <div class="card-img ">
                                <img src="assets2/img/imgfeed.png" alt=" " class="img-fluid ">
                            </div>
                            <h3><a href="#" class="stretched-link ">FEED</a></h3>
                            <p>The Feed is the hub of activity in the system where users can view relevant updates, news and recents. It offers a dynamic summary of recent activities such as profile updates, new connections and incoming messages. Users can
                                browse the Feed to stay up to date on the latest network activity, making it a central hub for interacting and acquiring relevant information.</p>
                        </div>
                    </div>
                    <!-- End Card Item -->

                    <div class="col-lg-4 col-md-6 " data-aos="fade-up " data-aos-delay="200 ">
                        <div class="card ">
                            <div class="card-img ">
                                <img src="assets2/img/imgseach.png" alt=" " class="img-fluid ">
                            </div>
                            <h3><a href="#" class="stretched-link ">SEARCH PROFILE</a></h3>
                            <p>The Profile Search screen allows users to explore and search for specific profiles within the network. Users can enter search criteria such as industry, location or other characteristics to find profiles that match their needs.
                                From here, they can view profiles, see detailed information, and connect directly with other users of interest.</p>
                        </div>
                    </div>
                    <!-- End Card Item -->

                    <div class="col-lg-4 col-md-6 " data-aos="fade-up " data-aos-delay="300 ">
                        <div class="card ">
                            <div class="card-img ">
                                <img src="assets2/img/imgprofile.png" alt=" " class="img-fluid ">
                            </div>
                            <h3><a href="#" class="stretched-link ">PROFILE</a></h3>
                            <p>The Profile screen is the central hub for managing and viewing personal and business information. Here, users can edit, enhance and maintain their own profile data, including personal details, experience, achievements and skills.
                                In addition, when viewing the profile of other users, this screen offers a glimpse of relevant information, such as areas of expertise, professional experience and achievements of the person or company.</p>
                        </div>
                    </div>
                    <!-- End Card Item -->

                    <div class="col-lg-4 col-md-6 " data-aos="fade-up " data-aos-delay="400 ">
                        <div class="card ">
                            <div class="card-img ">
                                <img src="assets2/img/imglist.png" alt=" " class="img-fluid ">
                            </div>
                            <h3><a href="#" class="stretched-link ">LIST OF COMPANIES</a></h3>
                            <p>The List of Companies displays a directory of all companies present on the platform. Users can explore businesses by industry, location or other relevant categories. When clicking on a company, they have access to detailed
                                information about the organization, such as description, key contacts, products or services offered and other relevant information. This helps users identify potential partners and business opportunities. </p>
                        </div>
                    </div>
                    <!-- End Card Item -->

                    <div class="col-lg-4 col-md-6 " data-aos="fade-up " data-aos-delay="500 ">
                        <div class="card ">
                            <div class="card-img ">
                                <img src="assets2/img/imgchat.png" alt=" " class="img-fluid ">
                            </div>
                            <h3><a href="#" class="stretched-link ">CHAT</a></h3>
                            <p>The Chat screen offers a dedicated space for direct communication between users. They can exchange real-time messages with other contacts, whether it's for business discussions, quick questions, or crafting deals. The Chat
                                screen allows users to have one-on-one conversations, making it a crucial tool for collaborating and closing deals in the system.</p>
                        </div>
                    </div>
                    <!-- End Card Item -->



                </div>

            </div>
        </section>
        <!-- End Services Section -->

        <!-- ======= Call To Action Section ======= -->
        <section id="call-to-action " class="call-to-action ">
            <div class="container " data-aos="zoom-out ">

                <div class="row justify-content-center ">
                    <div class="col-lg-8 text-center ">
                        <h3>SEARCH PROFILES</h3>
                        <p> The Search Profile screen is a powerful mechanism for discovering relevant contacts within the network. Designed to operate continuously, it consistently analyzes available profiles in search of matches based on the defined criteria.</p>
                        <a class="cta-btn " href="view/login.php ">Join our ecosystem</a>
                    </div>
                </div>

            </div>
        </section>
        <!-- End Call To Action Section -->

        <!-- ======= Features Section ======= -->
        <section id="features " class="features ">
            <div class="container ">

                <div class="row gy-4 align-items-center features-item " data-aos="fade-up ">

                    <div class="col-md-5 ">
                        <img src="assets2/img/features-1.jpg " class="img-fluid " alt=" " style="
                        border: 1px solid;
                    ">
                    </div>
                    <div class="col-md-7 ">
                        <h3>Operation Preferences</h3>
                        <p class="fst-italic ">
                            Whether you're seeking business partners, opportunities, or connections, SEARCH PROFILES empowers you to create tailored searches that save you time and effort. Let the system hunt down the right match, so you can focus on what truly matters.
                        </p>
                        <ul>
                            <li><i class="bi bi-check "></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                            <li><i class="bi bi-check "></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                            <li><i class="bi bi-check "></i> Ullam est qui quos consequatur eos accusamus.</li>
                        </ul>
                    </div>
                </div>
                <!-- Features Item -->

                <div class="row gy-4 align-items-center features-item " data-aos="fade-up ">
                    <div class="col-md-5 order-1 order-md-2 ">
                        <img src="assets2/img/features-2.jpg " class="img-fluid " alt=" " style="
                        border: 1px solid;
                    ">
                    </div>
                    <div class="col-md-7 order-2 order-md-1 ">
                        <h3>Specification Filters</h3>
                        <p class="fst-italic ">
                            Tailor your distributor search by outlining your preferences and expectations. This step ensures that the distributors we recommend align closely with your business requirements. By providing specific details about your desired distributor profile, you
                            empower our system to present you with the most relevant and fitting options.
                        </p>
                        <ul>
                            <li><i class="bi bi-check "></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                            <li><i class="bi bi-check "></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                            <li><i class="bi bi-check "></i> Ullam est qui quos consequatur eos accusamus.</li>
                        </ul>
                    </div>
                </div>
                <!-- Features Item -->

                <div class="row gy-4 align-items-center features-item " data-aos="fade-up ">
                    <div class="col-md-5 ">
                        <img src="assets2/img/features-3.jpg " class="img-fluid " alt=" " style="
                        border: 1px solid;
                    ">
                    </div>
                    <div class="col-md-7 ">
                        <h3>Country Selection</h3>
                        <p>Narrow down your search by selecting the country where you intend to focus your exploration. This step allows us to refine the search results to include options that are relevant to your chosen geographic area. By indicating the
                            specific country, you enhance the precision and appropriateness of the search outcomes.</p>
                        <ul>
                            <li><i class="bi bi-check "></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                            <li><i class="bi bi-check "></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                            <li><i class="bi bi-check "></i> Facilis ut et voluptatem aperiam. Autem soluta ad fugiat.</li>
                        </ul>
                    </div>
                </div>
                <!-- Features Item -->

                <div class="row gy-4 align-items-center features-item " data-aos="fade-up ">
                    <div class="col-md-5 order-1 order-md-2 ">
                        <img src="assets2/img/features-4.jpg " class="img-fluid " alt=" " style="
                        border: 1px solid;
                    ">
                    </div>
                    <div class="col-md-7 order-2 order-md-1 ">
                        <h3>Analyze your results.</h3>
                        <p class="fst-italic ">
                            Your search profiles have been defined. The system is now actively looking for matches based on the given specifications. Thank you for using our "SEARCH PROFILES" feature. We're dedicated to helping you find the right matches efficiently and effectively.
                            Your customized search experience is just a click away.
                        </p>
                        <ul>
                            <li><i class="bi bi-check "></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                            <li><i class="bi bi-check "></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                            <li><i class="bi bi-check "></i> Ullam est qui quos consequatur eos accusamus.</li>
                        </ul>
                    </div>
                </div>
                <!-- Features Item -->

            </div>
        </section>
        <!-- End Features Section -->






    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer " class="footer ">

        <div class="container ">
            <div class="row gy-4 " style="
            justify-content: space-between;
        ">
                <div class="col-lg-5 col-md-12 footer-info ">
                    <img src="assets2/img/logo.png" alt="logo" class="imgfooter">
                    <a href="index.html " class="logo d-flex align-items-center ">
                        <span>Matching Business</span>
                    </a>
                    <p>Global platform for relationship between industry and distribution, was present proactively in the connection between demand and demand, accelerating the process access to the market through a digital search tool, contact and communication
                        between the specific</p>
                    <div class="social-links d-flex mt-4 ">
                        <a href="# " class="twitter "><i class="bi bi-twitter "></i></a>
                        <a href="# " class="facebook "><i class="bi bi-facebook "></i></a>
                        <a href="# " class="instagram "><i class="bi bi-instagram "></i></a>
                        <a href="# " class="linkedin "><i class="bi bi-linkedin "></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-6 footer-links  ">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href="# ">Home</a></li>
                        <li><a href="# ">About us</a></li>
                        <li><a href="# ">Terms of service</a></li>
                        <li><a href="# ">Privacy policy</a></li>
                    </ul>
                </div>



                <div class="col-lg-3 col-md-12 footer-contact  ">
                    <h4>Contact Us</h4>
                    <p>Exemplo <br> Exemplo<br> Exemplo <br><br>

                        <strong>Email:</strong> info@example.com<br>
                    </p>

                </div>

            </div>
        </div>

        <div class="container mt-4 ">
            <div class="copyright ">
                &copy; Copyright <strong><span>Matching Business</span></strong>. All Rights Reserved
            </div>
            <div class="credits ">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/logis-bootstrap-logistics-website-template/ -->

            </div>

    </footer>
    <!-- End Footer -->
    <!-- End Footer -->



    <!-- Vendor JS Files -->
    <script src="assets2/vendor/bootstrap/js/bootstrap.bundle.min.js "></script>
    <script src="assets2/vendor/purecounter/purecounter_vanilla.js "></script>
    <script src="assets2/vendor/glightbox/js/glightbox.min.js "></script>
    <script src="assets2/vendor/swiper/swiper-bundle.min.js "></script>
    <script src="assets2/vendor/aos/aos.js "></script>
    <script src="assets2/vendor/php-email-form/validate.js "></script>

    <!-- Template Main JS File -->
    <script src="assets2/js/main.js "></script>
<script>
let deferredPrompt;
    window.addEventListener('beforeinstallprompt', (event) => {
  // Prevenir o comportamento padrão do navegador
  event.preventDefault();
  // Armazenar o evento para uso posterior
  deferredPrompt = event;
  
  // Exibir o botão de download ou realizar outra ação
  showDownloadButton();
});
const downloadButton = document.querySelector('#meuBotaoDeDownload');
downloadButton.addEventListener('click', () => {
  // Verificar se há uma solicitação de instalação disponível
  if (deferredPrompt) {
    // Mostrar o prompt de instalação
    deferredPrompt.prompt();
    
    // Capturar o resultado da solicitação de instalação
    deferredPrompt.userChoice.then((choiceResult) => {
      if (choiceResult.outcome === 'accepted') {
        console.log('Usuário aceitou a instalação do PWA');
      } else {
        console.log('Usuário recusou a instalação do PWA');
      }
      
      // Limpar a referência da solicitação de instalação
      deferredPrompt = null;
    });
  }
});
</script>
</body>

</html>