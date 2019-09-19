<?php

    // TEST CONTENT

    <div class="hero-header-container">
      <div class="hero-header-content">
        <div class="hero-header-left">
          <div class="aligner">
            <h1>Mybooking Kit Bootstrap</h1>
            <p>
              Lorem ipsum dolor amet flannel mumblecore air plant iceland hexagon
              tote bag twee pok pok scenester selfies.
            </p>
          </div>
        </div>
        <div class="hero-header-right">
          <div class="landing-form mx-3">
            <form
              action="choose_product.html"
              method="get"
              enctype="application/x-www-form-urlencoded"
            >
              <div class="form-group w-100">
                <label class="control-label w-100"
                  >Lugar Entrega
                  <select class="w-100" id="pickup_place" name="pickup_place">
                  </select>
                </label>
              </div>
              <div class="form-group w-100">
                <label class="control-label w-100"
                  >Lugar Devolución
                  <select class="w-100" id="return_place" name="return_place">
                  </select>
                </label>
              </div>

              <div class="form-group">
                <div class="form-row">
                  <div class="col">
                    <label class="control-label"
                      >Fecha Entrega
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                          </div>
                        </div>
                        <input
                          type="text"
                          class="form-control"
                          id="date_from"
                          name="date_from"
                        />
                        <select
                          class="input-group-field ml-1"
                          id="time_from"
                          name="time_from"
                        >
                        </select>
                      </div>
                    </label>
                  </div>
                  <div class="col">
                    <label class="control-label"
                      >Fecha Devolución
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                          </div>
                        </div>

                        <input
                          type="text"
                          class="form-control"
                          id="date_to"
                          name="date_to"
                        />
                        <select
                          class="input-group-field ml-1"
                          id="time_to"
                          name="time_to"
                        >
                        </select>
                      </div>
                    </label>
                  </div>
                </div>
              </div>

              <input
                type="submit"
                class="btn btn-primary float-right"
                href="choose_product.html"
                value="Buscar"
              />
            </form>
          </div>
        </div>
      </div>
      <div class="diagonal-section"></div>
    </div>

    <div class="flex-block-wrapper">
      <div class="centered-flex-block mt150">
        <h1>Overview</h1>
        <div class="hr"></div>
        <p>
          Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quae magni culpa
          laudantium at. Pariatur officia maiores earum
        </p>
      </div>
    </div>

    <div class="icons-wrapper mt100">
      <div class="icon-panel icon-1">
        <i class="fas fa-gas-pump"></i><br />
        <h5>We don't charge deposit</h5>
      </div>
      <div class="icon-panel icon-2">
        <i class="fas fa-wallet"></i><br />
        <h5>Competitive prices</h5>
      </div>
      <div class="icon-panel icon-3">
        <i class="fas fa-credit-card"></i><br />
        <h5>Credit card doesn't required</h5>
      </div>
      <div class="icon-panel icon-4">
        <i class="fas fa-users"></i><br />
        <h5>Extra drivers included</h5>
      </div>
    </div>

    <div class="gradient-section">
      <div class="centered-flex-block mt150">
        <h1 class="color-white">How it works</h1>
        <div class="hr-white"></div>
        <p class="color-white">
          Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quae magni culpa
          laudantium at. Pariatur officia maiores earum impedit numquam quod cum
        </p>
      </div>
      <div class="centered-flex-block">
        <img src="assets/images/three-cars.png" alt="" />
      </div>

      <div class="feature">
        <div class="features__item">
          <span class="stopa">1</span>
          <h3>Choose</h3>
          <hr />
          <p>
            Duis finibus odio sit amet nisi dictum et viverra libero semper donec
          </p>
        </div>
        <div class="features__item">
          <span class="stopa stopa-2">2</span>
          <h3>Your</h3>
          <hr />
          <p>
            Integer ac rhoncus urna curabitur feugiat dolor id fermentum rutrum ex
            tellus tristique ante sit amet malesuada justo diam
          </p>
        </div>
        <div class="features__item">
          <span class="stopa">3</span>
          <h3>Car</h3>
          <hr />
          <p>
            Duis finibus odio sit amet nisi dictum et viverra libero semper donec
          </p>
        </div>
      </div>
    </div>

?>
