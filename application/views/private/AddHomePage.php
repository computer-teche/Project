
<?php include('header.php') ?>

<body class="">
  <div class="wrapper ">
    
  <?php include('SideBar.php') ?>
           
    <div class="main-panel">
      <!-- Navbar -->
      
      <?php include('Navbar.php') ?>


      <div class="col-md-8">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Edit Homepage</h5>
              </div>
              <div class="card-body">
              <?php if(!$up):?>
                <?php echo form_open_multipart('UserC/AddHomePage');?>  
                  
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Name:</label>
                        <input type="text" class="form-control" placeholder="Enter a Name" name="Name" id="Name">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                      <label>Descripition:</label>
                      <textarea class="form-control textarea" name="Descripition" id="Descripition">Oh so, your weak rhyme You doubt I'll bother, reading into it</textarea>
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Image :</label>
                      <input type="file" class="form-control form-control-file" placeholder="Image" name="userfile" id="Image"> <button class="btn btn-info">Upload </button>
                    </div>
                  </div>

                  

                  </div>
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button type="submit" class="btn btn-primary btn-round">Add Content</button>
                    </div>
                  </div>

                  <?php else: ?>
                  <?= form_open_multipart('UserC/editHomePage/'.$UserData[0]->id);?>   

                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Name:</label>
                        <input type="text" class="form-control" placeholder="Enter a Name" name="Name" id="Name" value="<?=  $UserData[0]->name?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                      <label>Descripition:</label>
                      <textarea class="form-control textarea" name="Descripition" id="Descripition" ><?=  $UserData[0]->des?></textarea>
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-md-12">
                    <div class="form-group">
                    <input type="file" class="form-control form-control-file" placeholder="Image" name="userfile" id="Image"> <button class="btn btn-info">Upload </button>
                    </div>
                  </div>             

                  <div class="col-md-12">
                  <img src="<?= base_url('/assets/images/homepage/').$UserData[0]->img ?>"  width="200"> 
                  </div>
                  

                  </div>
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button type="submit" class="btn btn-primary btn-round">Update Content</button>
                    </div>
                  </div>

                  <?php endif ?>
                </form>
              </div>
            </div>
          </div>

              
              
                
            

            
           
    

 
<?php include('Footer.php');?>