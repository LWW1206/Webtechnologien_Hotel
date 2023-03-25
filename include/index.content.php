<!--  Showcase -->
  <section id="showcase" class="d-flex align-items-center">
    <div class="container">
      <div class="row d-sm-flex align-items-center justify-content-between">
        <div class="col-sm-6 col-xs-12">
        <?php
        if (isset($_SESSION["useruid"])){
          //echo "<small class='alert alert-success'>Logged in successfully </small>";
          echo "<h2>Welcome back " . $_SESSION["useruid"] . "</h2>";
        }
        ?>
          <h1><span class="text-warning"> Move </span>in now!</h1>
          <h2>Hotel that will fullfill all your dreams</h2>
          <p class="lead my-4">
            His rebus fiebat ut et minus late vagarentur
            et minus facile finitimis bellum inferre possent.
            Qua ex parte homines bellandi cupidi magno dolore
            adficiebantur. Pro multitudine autem hominum et pro
            gloria belli atque fortitudinis angustos se
            fines habere arbitrabantur
          </p>
          <a href="index.php?page=booknow" class="btn btn-booknow btn-lg">
            Book now!
          </a>
        </div>
        <div class="col-6 col-xs-block">
          <img class="img-fluid w-100 d-none d-sm-block" src="res/img/pic2.jpg" alt="" />
        </div>
      </div>
    </div>
  </section>
  <section id="filler" class="d-flex align-items-center"></section>
  <br />

  <!--General Section 1-->
  <section id="Theme" class="d-flex align-items-center">
    <div class="container text-center">
      <div class="row justify-content-between">
        <div class="col-md">
          <a>
            <img src="res/img/pic3.jpg" alt="" class="img-fluid">
          </a>
        </div>
        <div class="col-md">
          <h1> Lorem ipsum dolor sit amet </h1>
          <p class="lead my-4">
            Lorem ipsum dolor sit amet, consectetur
            adipiscing elit, sed do eiusmod tempor
            incididunt ut labore et dolore magna aliqua.
            Ut enim ad minim veniam, quis nostrud
            exercitation ullamco laboris nisi ut
            aliquip ex ea commodo consequat. Duis
            aute irure dolor in reprehenderit in
            voluptate velit esse cillum dolore eu
            fugiat nulla pariatur. Excepteur sint
            occaecat cupidatat non proident, sunt
            in culpa qui officia deserunt mollit
          </p>
        </div>
      </div>
  </section>
  <br /><br />

  <!--General Section 2-->
  <section id="Rooms" class="d-flex align-items-center">
    <div class="container text-center g-4">
      <!--g-4 to seperate when on small-->
      <div class="row justify-content-between">
        <div class="col-md">
          <h1> Our rooms </h1>
          <p class="lead my-4">
            Lorem ipsum dolor sit amet, consectetur
            adipiscing elit, sed do eiusmod tempor
            incididunt ut labore et dolore magna aliqua.
            Ut enim ad minim veniam, quis nostrud
            exercitation ullamco laboris nisi ut
            aliquip ex ea commodo consequat. Duis
            aute irure dolor in reprehenderit in
            voluptate velit esse cillum dolore eu
            fugiat nulla pariatur. Excepteur sint
            occaecat cupidatat non proident, sunt
            in culpa qui officia deserunt mollit
          </p>
          <p>
            <a href="index.php?page=booknow" class="btn btn-booknow mt-3">
            Book now!
          </a>
          </p>
        </div>
        <br/>
        <div class="col-md">
          <br/>
          <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active" data-bs-interval="10000">
                <img src="res/img/room1.jpg" class="d-block w-100">
              </div>
              <div class="carousel-item" data-bs-interval="2000">
                <img src="res/img/Room2.jpg" class="d-block w-100">
              </div>
              <div class="carousel-item">
                <img src="res/img/room5.jpg" class="d-block w-100">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
              data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
              data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>
  <br />

  <!--Frequently asked-->
  <section id="Questions" class="p-5">

    <div class="container">

      <h2 class="text-center mb-4">Some more Infos</h2>

      <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
              data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
              <h4>Info 1</h4>
            </button>
          </h2>
          <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
            data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
              Lorem ipsum dolor sit amet, consectetur
              adipiscing elit, sed do eiusmod tempor
              incididunt ut labore et dolore magna aliqua.
              Ut enim ad minim veniam, quis nostrud
              exercitation ullamco laboris nisi ut
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
              data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
              <h4>Info 2</h4>
            </button>
          </h2>
          <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
            data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">Lorem ipsum dolor sit amet, consectetur
              adipiscing elit, sed do eiusmod tempor
              incididunt ut labore et dolore magna aliqua.
              Ut enim ad minim veniam, quis nostrud
              exercitation ullamco laboris nisi </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
              data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
              <h4>Info 3</h4>
            </button>
          </h2>
          <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree"
            data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">Lorem ipsum dolor sit amet, consectetur
              adipiscing elit, sed do eiusmod tempor
              incididunt ut labore et dolore magna aliqua.
              Ut enim ad minim veniam, quis nostrud
              exercitation ullamco laboris nisi ut </div>
          </div>
        </div>
      </div>

    </div>

  </section>

  <!--Employer-Boxes-->
  <section id ="Employer">
  <br/>
  <div class="container text-center">
    <h1>Our Staff</h1>
  </div>

  <section id="staff" class="d-flex align-items-center">
    <div class="container">
      <div class="row text-center g-4">
        <div class="col-md">
          <div class="card-body text-center">
            <div class="h1 mb-3">
              <a>
              <img class="rounded-circle mt-5" width="140px" src="res/img/cat.png" >
              </a>
            </div>

            <h3 class="card-title mb-3">Caesar</h3>
            <p class="card-text">
              Ullamco laboris nisi ut aliquip
              ex ea commodo consequat. Duis
              aute irure dolor in reprehenderit
              in voluptate velit esse cillum dolore
              eu fugiat nulla pariatur. Excepteur
              sint occaecat cupidatat non proident,
              sunt in culpa qui officia deserunt
              mollit anim id est laborum.
            </p>
          </div>
        </div>
        <div class="col-md">
          <div class="card-body text-center">
            <div class="h1 mb-3">
              <a>
              <img class="rounded-circle mt-5" width="140px" src="res/img/cat2.png" >
              </a>
            </div>
            <h3 class="card-title mb-3">Jupiter</h3>
            <p class="card-text">
              Ullamco laboris nisi ut aliquip
              ex ea commodo consequat. Duis
              aute irure dolor in reprehenderit
              in voluptate velit esse cillum dolore
              eu fugiat nulla pariatur. Excepteur
              sint occaecat cupidatat non proident,
              sunt in culpa qui officia deserunt
              mollit anim id est laborum.
            </p>
          </div>
        </div>
        <div class="col-md">
          <div class="card-body text-center">
            <div class="h1 mb-3">
              <a>
              <img class="rounded-circle mt-5" width="140px" src="res/img/cat3.png" >
              </a>
            </div>
            <h3 class="card-title mb-3">Athena</h3>
            <p class="card-text">
              Ullamco laboris nisi ut aliquip
              ex ea commodo consequat. Duis
              aute irure dolor in reprehenderit
              in voluptate velit esse cillum dolore
              eu fugiat nulla pariatur. Excepteur
              sint occaecat cupidatat non proident,
              sunt in culpa qui officia deserunt
              mollit anim id est laborum.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
  </section>

  <!--contact-->
  <section id = "Contact">
    <div class="container">
      <div class="row">
        <div class="col-md-7">
          <h2 class = "text-center"> Contact Info </h2>
          <ul class="list-group">
            <li class="list-group-item">
              <strong>Location:</strong> Über die 7 Berge bei den 7 Zwergen
            </li>
            <li class="list-group-item">
              <strong>Contact Tel:</strong> 1111-2222-3333-4444
            </li>
            <li class="list-group-item">
              <strong>Contact Email:</strong> 12345567@hotmail.com
            </li>
            <li class="list-group-item">
              <strong>Fax:</strong> 123-123-132-124
            </li>
            <li class="list-group-item">
              <strong>Out of Ideas:</strong> asdf-1234
            </li>
          </ul>
        </div>
        <div class ="col-md-5">
        <h2 class = "text-center"> Map </h2>
        <div id="googleMap" style="width:100%;height:400px;">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2658.835510044595!2d16.36363685140711!3d48.209784179127325!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x476d079822dc1c9d%3A0x3e05ad710a1602d8!2sSteigenberger%20Hotel%20Herrenhof%2C%20Wien!5e0!3m2!1sen!2sat!4v1673617994524!5m2!1sen!2sat" 
          width="450" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
      </div>
    </div>
  </section>
        </br>

