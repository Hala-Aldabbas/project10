<?php include "parts/header.php"; ?>

    <script src="https://unpkg.com/axios@1.1.2/dist/axios.min.js"></script>
    <script
      src="https://kit.fontawesome.com/6defd36768.js"
      crossorigin="anonymous"
    ></script>

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT"
      crossorigin="anonymous"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&display=swap"
      rel="stylesheet"
    />
  </head>
<style>
.bb{
  background-image: url("https://image2.jdomni.in/banner/24032022/14/67/0D/1EB88CD1C55288AE1261F1FECB_1648121852604.jpg?output-format=webp");
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center center;
  width:60vw;
  height: 100vh;
}
.city {
  font-family: "Poppins", sans-serif;
  font-weight: 400;
  font-size: 40px;
  text-transform: capitalize;
  padding-bottom: 20px;
  color:white;
}

.humid-wind {
  text-align: right;
  color:#f8b739;
  font-weight: 500;
  font-size: 30px;
}

.date-time {
  padding-top: 30px;
  padding-bottom: 15px;
  color:#f8b739;
  font-weight: 500;
  font-size: 30px;
}

.temp-main {
  display: flex;
  align-items: center;
  justify-content: flex-end;
}
.temp-main img{
  background:#f8b839;
  border-radius: 50%;

}

.temp-main .active {
  font-weight: 400;
  cursor: default;
  color: #f8b739;
}

.temperature {
  font-family: "Poppins", sans-serif;
  font-weight: 300;
  text-align: right;
  font-size: 60px;
  padding: none;
  color:#f8b739;
  font-weight: 500;
}

.forecast-icon {
  height: 55px;
}

.forecast-temp {
  padding-bottom: 8px;
}

.forecast-description {
  font-size: 12px;
  text-transform: capitalize;
}
.temp-row{
  margin-top:-25px;
}
  </style>
 
    <div class="container bb">
      <form action="" class="form-search-city" id="search-city">
        
       
      </form>

      <div class="main-display mt-5" id="current-button">
        <div class="row ">
          <div class="col-6 city-row">
            <div class="city text-decoration-underline" id="city"></div>
            <div class="date-time" id="current-date-time">
              <span id="current-date"></span>
              <br />
              Last updated at <span id="current-time"></span>
              <span id="am-pm"></span>
              <br />
            </div>
          </div>
          <div class="col-6 my-4">
            <div class="humid-wind">
            Description: <span id="weather-description-main"></span>
              <br />
              Humidity: <span id="humidity"></span>
              <br />
              Wind Speed: <span id="wind-speed"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6 ">
       
          </div>
          <div class="col-6 my-1">
            <div class="temp-main">
              <img class="mx-5"
                src=""
                alt="icon"
                id="icon"
              />
              <span class="temperature " id="temperature"></span>
              <span id="units"
                ><a href="#" class="active" id="celcius-link">°C </a> 
                <a href="#" id="fahrenheit-link"> </a></span
              >
            </div>
          </div>
        </div>
      </div>
    </div>

            
    <script src="./src/script.js"></script>
    <?php include "parts/dash.php"; ?>

