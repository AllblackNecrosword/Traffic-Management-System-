<!-- <h1>Welcome to <?php echo $_settings->info('name') ?></h1> -->
<hr class="bg-light">
<div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-light elevation-1"><i class="fas fa-calendar-day"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Today's Offences</span>
                <span class="info-box-number text-right">
                  <?php 
                    $offense = $conn->query("SELECT * FROM `offense` where date(Date) = '".date('Y-m-d')."' ")->num_rows;
                    echo number_format($offense);
                  ?>
                  <?php ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-id-card"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"> Vehicles Registered </span>
                <span class="info-box-number text-right">
                  <?php 
                    $vehicle = $conn->query("SELECT Vehicle_Number FROM `registered_vehicle` ")->num_rows;
                    echo number_format($vehicle);
                  ?>
                </span>
              </div>
            </div>
          </div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-id-card"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"> Lost Documents</span>
                <span class="info-box-number text-right">
                  <?php 
                    $drivers = $conn->query("SELECT id FROM `lost_document` ")->num_rows;
                    echo number_format($drivers);
                  ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-id-card"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"> Lost Vehicles</span>
                <span class="info-box-number text-right">
                  <?php 
                    $drivers = $conn->query("SELECT id FROM `lostvehicle` ")->num_rows;
                    echo number_format($drivers);
                  ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-lightblue elevation-1"><i class="fas fa-traffic-light"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Traffic Offense</span>
                <span class="info-box-number text-right">
                <?php 
                    $query = "SELECT id FROM `offense` where status = 0";
                    $result = $conn->query($query);
                    if ($result) {
                        $to = $result->num_rows;
                        echo number_format($to);
                    } else {
                        echo "Error executing query: " . $conn->error;
                    }
                  ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
        </div>
