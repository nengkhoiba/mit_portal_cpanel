 <?php $this->load->view('global/header.php');?>
      <?php $this->load->view('global/side_menu.php');
      $sid=$this->session->userdata('session');
      ?>
       <div class="content-wrapper">
      <section class="content">
       <div class="row">
       <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>
              <?php 
              $sql2="SELECT  `name` FROM `session` WHERE `id`=$sid";
              $query2=$this->db->query($sql2);
              while($result=mysql_fetch_array($query2->result_id))
              {
                  $sn=$result['name'];
              }
              ?>
            <div class="info-box-content">
              <span class="info-box-text">Current session</span>
              <span class="info-box-number"><?php echo $sn;?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 50%"></div>
              </div>
              <span class="progress-description">
                    50% Increase in 30 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          </div>

    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total No. of Students</span>
              <?php 
              $sql="SELECT * FROM `student_details`";
              $query=$this->db->query($sql);
              if($query)
              {
                  $n=$query->num_rows();
              }
              ?>
              <span class="info-box-number"><?php echo $n;?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 50%"></div>
              </div>
              <span class="progress-description">
                    50% Increase in 30 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          </div>
              <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

            <div class="info-box-content">
            <?php 
              $sql1="SELECT * FROM `admission_std_relation` WHERE `session_id`=$sid";
              $query1=$this->db->query($sql1);
              if($query1)
              {
                  $a=$query1->num_rows();
              }
              ?>
              <span class="info-box-text">Admitted Students</span>
              <span class="info-box-number"><?php echo $a;?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 50%"></div>
              </div>
              <span class="progress-description">
                    50% Increase in 30 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          </div>
              <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

            <div class="info-box-content">
            <?php
        $sql4="SELECT `id`, `abv`, `isActive` FROM `course` WHERE `isActive`=1";
        $query4=$this->db->query($sql4);
        if($query4)
        {
            while($result1=mysql_fetch_array($query4->result_id))
            {
                $cid=$result1['id'];
                $name=$result1['abv'];
                $sql5="SELECT * FROM `std_col_relation` WHERE `course_id`=$cid AND `isActive`=1";
                $query5=$this->db->query($sql5);
                if($query5)
                {
                    
                        $ns=$query5->num_rows();
                    
                
                ?>
              <span class="info-box-text"><?php echo $name;?></span>
              <span class="info-box-number"><?php echo $ns;?></span>
              <?php 
                    
                }
            }
        }
        ?>
            

              <div class="progress">
                <div class="progress-bar" style="width: 50%"></div>
              </div>
              <span class="progress-description">
                    50% Increase in 30 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          </div>
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Monthly Recap Report</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-wrench"></i></button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </div>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-8">
                  <p class="text-center">
                    <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
                  </p>

                  <div class="chart">
                    <!-- Sales Chart Canvas -->
                    <canvas id="salesChart" style="height: 180px;"></canvas>
                  </div>
                  <!-- /.chart-responsive -->
                </div>
                <!-- /.col -->
                <?php 
					$sql6="SELECT `id`, `abv`, `isActive` FROM `course` WHERE `isActive`=1";
					$query6=$this->db->query($sql6);
					if($query6)
					{
					    while($result2=mysql_fetch_array($query6->result_id))
					    {
					        $coid=$result2['id'];
					    ?>
					    <div class="col-md-4">
					    <p class="text-center">
					    <strong><?php echo $result2['abv'];?></strong>
					    </p>
					<?php
                            $sql7="SELECT `id`, `abv` FROM `trade` WHERE `isActive`=1";
                            $query7=$this->db->query($sql7);
                            if($query7)
                            {
                                
                                while($result3=mysql_fetch_array($query7->result_id))
                                {
                                    $tid=$result3['id'];
                                    $sql9="SELECT * FROM `std_col_relation` WHERE `course_id`=$coid AND `isActive`=1";
                                    $query9=$this->db->query($sql9);
                                    $totalcount=$query9->num_rows();
					?>
					<div class="progress-group">
                    <span class="progress-text"><?php echo $result3['abv'];?></span>
                    <?php
                    $sql8="SELECT * FROM `std_col_relation` WHERE `course_id`=$coid AND `trade_id`=$tid AND `isActive`=1";
                    $query8=$this->db->query($sql8);
                    $count=$query8->num_rows();
                   
                    ?>
                    <span class="progress-number"><b><?php echo $count;?></b></span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-aqua" style="width:<?php echo ($count/$totalcount)*100;?>%"></div>
                    </div>
                  </div>
					<?php 
					}
                            }
					    }
					}
					?>
               
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span>
                    <h5 class="description-header">$35,210.43</h5>
                    <span class="description-text">TOTAL REVENUE</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> 0%</span>
                    <h5 class="description-header">$10,390.90</h5>
                    <span class="description-text">TOTAL COST</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 20%</span>
                    <h5 class="description-header">$24,813.53</h5>
                    <span class="description-text">TOTAL PROFIT</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block">
                    <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> 18%</span>
                    <h5 class="description-header">1200</h5>
                    <span class="description-text">GOAL COMPLETIONS</span>
                  </div>
                  <!-- /.description-block -->
                </div>
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      </section>
      </div>
       <?php $this->load->view('global/footer.php');?>