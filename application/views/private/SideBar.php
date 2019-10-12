<div class="sidebar" data-color="white" data-active-color="danger">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="dashboard.html" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img <?= base_url('/assets/images/logo-small.png')?>">
          </div>
        </a>
        <a href="dashboard.html" class="simple-text logo-normal">
          Nashik Tourism
          <!-- <div class="logo-image-big">
            <img <?= base_url('/assets/images/logo-big.png')?>"
          </div> -->
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="active ">
            <a href="./dashboard.html">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
          <a data-toggle="collapse" href="#componentsExamples">
                    <i class="nc-icon nc-single-copy-04" ></i>
                    <p>Pages<b class="caret"></b></p>
                </a>
              <div class="collapse" id="componentsExamples">
            <ul class="nav">
            <li>
                <a class="dropdown-item" href="<?= base_url('UserC/ViewHomePage') ?>">1. Home</a>
              
            </li>
            <li>
                <a class="dropdown-item" href="destination.html">2. Destination</a>
              
            </li>
            <li>
                <a class="dropdown-item" href="culture.html">3. Culture</a>
              
            </li>

            <li>
                <a class="dropdown-item" href="<?= base_url('UserC/ViewUsers') ?>">4. Users</a>
              
            </li>
          </ul>
          <li>
            <a href="./map.html">
              <i class="nc-icon nc-ruler-pencil"></i>
              <p>Posts</p>
            </a>
          </li>
          <li>
            <a href="./user.html">
              <i class="nc-icon nc-single-02"></i>
              <p>User Profile</p>
            </a>
          </li>
          <li>
            <a href="./tables.html">
              <i class="nc-icon nc-tile-56"></i>
              <p>Table List</p>
            </a>
          </li>
        </ul>
      </div>
    </div>