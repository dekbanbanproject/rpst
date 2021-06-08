<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon elevation-1" style="text-align: center;color:#fcfcfc;font-size:35px;background:#f804ec;"><i class="fas fa-file-invoice-dollar"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">รายการที่สั่งซื้อทั้งหมด</span>
                <span class="info-box-number">{{(number_format($order_aa,2))}}&nbsp;&nbsp;<small>บาท</small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon elevation-1" style="text-align: center;color:#fcfcfc;font-size:35px;background:#af36f5;"><i class="fas fa-hand-holding-usd"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">รายการที่รับทั้งหมด</span>
                <span class="info-box-number">{{(number_format($recieve_aa,2))}}&nbsp;&nbsp;<small>บาท</small></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          {{-- <div class="clearfix hidden-md-up"></div> --}}

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon elevation-1" style="text-align: center;color:#fcfcfc;font-size:35px;background:#fd662b;"><i class="fas fa-donate"></i></span>

              <div class="info-box-content">
              <span class="info-box-text">รายการที่เบิก-จ่ายทั้งหมด</span>
                <span class="info-box-number">{{(number_format($pay_aa,2))}}&nbsp;&nbsp;<small>บาท</small></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon elevation-1" style="text-align: center;color:#fcfcfc;font-size:35px;background:#ce1103;"><i class="fas fa-money-check-alt"></i></span>
              <div class="info-box-content">
              <span class="info-box-text">ยอดรวมคงเหลือ</span>
                <span class="info-box-number">{{(number_format($total_aa,2))}}&nbsp;&nbsp;<small>บาท</small></span>
              </div>
            </div>
          </div>

        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->


