<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon elevation-1" style="text-align: center;color:#fcfcfc;font-size:35px;background:#4b4e4d;"><i class="far fa-clipboard"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">รายการที่สั่งซื้อทั้งหมด</span>
                <span class="info-box-number">{{$order_a}}&nbsp;&nbsp;<small>ครั้ง</small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon elevation-1" style="text-align: center;color:#fcfcfc;font-size:35px;background:#741fd4;"><i class="fas fa-dolly"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">รายการที่รับทั้งหมด</span>
                <span class="info-box-number">{{$recieve_a}}&nbsp;&nbsp;<small>ครั้ง</small></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          {{-- <div class="clearfix hidden-md-up"></div> --}}

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3" >
              <span class="info-box-icon elevation-1" style="text-align: center;color:#fcfcfc;font-size:35px;background:#0df07e;"><i class="fas fa-clipboard-check"></i></span>

              <div class="info-box-content">
              <span class="info-box-text">รายการที่เบิก-จ่ายทั้งหมด</span>
                <span class="info-box-number">{{$pay_a}}&nbsp;&nbsp;<small>ครั้ง</small></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-user-md"></i></span>
              <div class="info-box-content">
              <span class="info-box-text">เจ้าหน้าที่ทั้งหมด</span>
                <span class="info-box-number">{{$user_a}}&nbsp;&nbsp;<small>คน</small></span>
              </div>
            </div>
          </div>

        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->


