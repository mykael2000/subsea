<?php
  include("header.php");

  $sql_wor = "SELECT * FROM workers";
  $query_wor = mysqli_query($conn, $sql_wor);
?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-sm-flex align-items-center mb-4">
                      <h4 class="card-title mb-sm-0">Staff List</h4>
                      <a href="#" class="text-dark ms-auto mb-3 mb-sm-0"> View all Staffs</a>
                    </div>
                    <div class="table-responsive border rounded p-1">
                      <table class="table">
                        <thead>
                          <tr>
                            <th class="font-weight-bold">Staff</th>
                            <th class="font-weight-bold">Position</th>
                            <th class="font-weight-bold">Employment Date</th>
                            <th class="font-weight-bold">Status</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php while($worker = mysqli_fetch_assoc($query_wor)){ ?>
                          <tr>
                            <td>
                              <img class="img-sm rounded-circle" src="profile/<?php echo $worker['profile']; ?>" alt="profile image"> <?php echo $worker['firstname'].' '.$worker['lastname']; ?>
                            </td>
                            <td><?php echo $worker['position']; ?></td>
                            <td><?php echo $worker['employment_date']; ?></td>
                            <td><?php echo $worker['employment_status']; ?></td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                    <div class="d-flex mt-4 flex-wrap align-items-center">
                      <p class="text-muted mb-sm-0">Showing 1 to 10 of 57 entries</p>
                      <nav class="ms-auto">
                        <ul class="pagination separated pagination-info mb-sm-0">
                          <li class="page-item"><a href="#" class="page-link"><i class="icon-arrow-left"></i></a></li>
                          <li class="page-item active"><a href="#" class="page-link">1</a></li>
                          <li class="page-item"><a href="#" class="page-link">2</a></li>
                          <li class="page-item"><a href="#" class="page-link">3</a></li>
                          <li class="page-item"><a href="#" class="page-link">4</a></li>
                          <li class="page-item"><a href="#" class="page-link"><i class="icon-arrow-right"></i></a></li>
                        </ul>
                      </nav>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
          <!-- content-wrapper ends -->
          
<?php
    include("footer.php");
?>