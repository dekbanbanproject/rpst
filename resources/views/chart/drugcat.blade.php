<div class="row">
            <div class="col-md-6">
                  <!-- PIE CHART -->
                  <div class="card card-info">
                      <div class="card-header">
                      <h3 class="card-title">รายการยา Chart</h3>
                      <?php $data_cat[] = array('สถานที่เกิดเหตุ','จำนวนที่เกิดเหตุ'); ?>
                        @foreach ($catpiechart as $cat_piechart)
                            <?php $data_cat[] = array($cat_piechart->CAT_NAME,$cat_piechart->cat_count); ?>   
                                @endforeach
                      <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                          </button>
                          <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                      </div>
                      </div>
                      <div class="card-body">
                      <div id="piechart_drug" style="width: 100%; height: 400px;"></div>
                      </div>
                      <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
            </div>
            <div class="col-md-6">
                  <!-- PIE CHART -->
                  <div class="card card-info">
                            <div class="card-header">
                            <h3 class="card-title">อัตราการเกิดความเสี่ยงช่วงอายุ Chart</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                            </div>
                            </div>
                            <div class="card-body">
                            <div id="piechart_3d" style="width: 100%; height: 400px;"></div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
            </div>
        </div>