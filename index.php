<?php
  include("header.php");
?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body performane-indicator-card">
                    <div class="d-sm-flex">
                      <h4 class="card-title flex-shrink-1">Performance Indicator</h4>
                      <p class="m-sm-0 ms-sm-auto flex-shrink-0">
                        <!-- <span class="data-time-range ms-0">7d</span>
                        <span class="data-time-range active">2w</span> -->
                        <span class="data-time-range active">1m</span>
                        <!-- <span class="data-time-range">3m</span>
                        <span class="data-time-range">6m</span> -->
                      </p>
                    </div>
                    <div class="d-sm-flex flex-wrap mt-3">
                      <div class="d-flex align-items-center">
                        <span class="dot-indicator bg-primary ms-2"></span>
                        <p class="mb-0 ms-2 text-muted font-weight-semibold">Complaints (0)</p>
                      </div>
                      <div class="d-flex align-items-center">
                        <span class="dot-indicator bg-info ms-2"></span>
                        <p class="mb-0 ms-2 text-muted font-weight-semibold"> Task Done (0)</p>
                      </div>
                      <div class="d-flex align-items-center">
                        <span class="dot-indicator bg-danger ms-2"></span>
                        <p class="mb-0 ms-2 text-muted font-weight-semibold">Attends (0)</p>
                      </div>
                    </div>
                    <div class="dotted-chart-height">
                      <canvas id="performance-indicator-chart" class="mt-5"></canvas>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Sessions by channel</h4>
                    <div class="aligner-wrapper py-3">
                      <div class="doughnut-chart-height">
                        <canvas id="sessionsDoughnutChart" height="210"></canvas>
                      </div>
                      <div class="wrapper d-flex flex-column justify-content-center absolute absolute-center">
                        <h2 class="text-center mb-0 font-weight-bold">0</h2>
                        <small class="d-block text-center text-muted  font-weight-semibold mb-0">Total Leads</small>
                      </div>
                    </div>
                    <div class="wrapper mt-4 d-flex flex-wrap align-items-cente">
                      <div class="d-flex">
                        <span class="square-indicator bg-danger ms-2"></span>
                        <p class="mb-0 ms-2">Assigned</p>
                      </div>
                      <div class="d-flex">
                        <span class="square-indicator bg-success ms-2"></span>
                        <p class="mb-0 ms-2">Not Assigned</p>
                      </div>
                      <div class="d-flex">
                        <span class="square-indicator bg-warning ms-2"></span>
                        <p class="mb-0 ms-2">Reassigned</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Quick Action Toolbar Starts-->
            <!-- <div class="row quick-action-toolbar">
              <div class="col-md-12 grid-margin">
                <div class="card">
                  <div class="card-header d-block d-md-flex">
                    <h5 class="mb-0">Quick Actions</h5>
                    <p class="ms-auto mb-0">How are your active users trending overtime?<i class="icon-bulb"></i></p>
                  </div>
                  <div class="d-md-flex row m-0 quick-action-btns" role="group" aria-label="Quick action buttons">
                    <div class="col-sm-6 col-md-3 p-3 text-center btn-wrapper">
                      <button type="button" class="btn px-0"> <i class="icon-user me-2"></i> Add Client</button>
                    </div>
                    <div class="col-sm-6 col-md-3 p-3 text-center btn-wrapper">
                      <button type="button" class="btn px-0"><i class="icon-docs me-2"></i> Create Quote</button>
                    </div>
                    <div class="col-sm-6 col-md-3 p-3 text-center btn-wrapper">
                      <button type="button" class="btn px-0"><i class="icon-folder me-2"></i> Enter Payment</button>
                    </div>
                    <div class="col-sm-6 col-md-3 p-3 text-center btn-wrapper">
                      <button type="button" class="btn px-0"><i class="icon-book-open me-2"></i>Create Invoice</button>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
            <!-- Quick Action Toolbar Ends-->

          </div>
          <!-- content-wrapper ends -->
          
          <?php
              include("footer.php");
          ?>