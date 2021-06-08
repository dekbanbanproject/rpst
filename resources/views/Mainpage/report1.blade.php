


<br>
<br>
<!--================Food menu section start =================-->

<section class="section">
    <div class="container-fluid" style="width: 95%;">
      <div class="section-intro mb-25px">
        <h4 class="intro-title">One Stop Service</h4>
        <h2>Person Visit Today</h2>
      </div>

        <div class="row">
            <div class="col-lg-4">
            <div class="media align-items-center food-card">
                <i class='fas fa-users' style='font-size:70px;color:rgb(255, 17, 0)'></i>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="media-body">
                <div class="d-flex justify-content-between food-card-title">
                    <h4>จำนวนคนไข้วันนี้</h4>
                    <h3 class="price-tag">{{$per_count}}&nbsp;คน</h3>
                </div>
                <p>นับคนไข้ทุกคนที่มาวันนี้</p>
                </div>
            </div>
            </div>
            <div class="col-lg-4">
            <div class="media align-items-center food-card">
                <i class='fas fa-donate' style='font-size:70px;color:rgb(255, 145, 0)'></i>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="media-body">
                <div class="d-flex justify-content-between food-card-title">
                    <h4>ค่ารักษาวันนี้</h4>
                <h3 class="price-tag">{{$per_sum}}&nbsp; บาท</h3>

                </div>
                <p>รวมค่ารักษาทุกสิทธิ์</p>
                </div>
            </div>
            </div>

            <div class="col-lg-4">
            <div class="media align-items-center food-card">
                <i class='fas fa-user-injured' style='font-size:70px;color:rgb(11, 216, 89)'></i>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                {{--  fas fa-user-md--}}
                <div class="media-body">
                <div class="d-flex justify-content-between food-card-title">
                    <h4>คนไข้สิทธิ์(ปกส-ในเขต)วันนี้</h4>
                <h3 class="price-tag">{{$per_sss}}&nbsp;คน</h3>
                </div>
                <p>รวมค่ารักษาสิทธิ์ประกันสังคมในเขต</p>
                </div>
            </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="media align-items-center food-card">
                <i class='fas fa-diagnoses' style='font-size:70px;color:rgb(165, 41, 247)'></i>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="media-body">
                    <div class="d-flex justify-content-between food-card-title">
                    <h4>คนไข้ที่มาล้างแผลวันนี้ </h4>
                    <h3 class="price-tag">{{$per_480}}&nbsp;คน</h3>

                    </div>
                    <p>นับคนไข้ทุกคนที่มาวันนี้</p>
                </div>
                </div>
            </div>
            <div class="col-lg-4">
            <div class="media align-items-center food-card">
                <i class='fas fa-user-injured' style='font-size:70px;color:rgb(192, 247, 41)'></i>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="media-body">
                <div class="d-flex justify-content-between food-card-title">
                    <h4>คนไข้สิทธิ( อปท )วันนี้ </h4>
                    <h3 class="price-tag">{{$data_L}}&nbsp;คน</h3>

                </div>
                <p>นับคนไข้สิทธิ์ อปท ที่มาวันนี้</p>
                </div>
            </div>
            </div>
            <div class="col-lg-4">
            <div class="media align-items-center food-card">
                <i class='fas fa-user-injured' style='font-size:70px;color:rgb(216, 11, 73)'></i>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="media-body">
                <div class="d-flex justify-content-between food-card-title">
                    <h4>คนไข้สิทธิ( UC )วันนี้ </h4>
                <h3 class="price-tag">{{$data_UC}}&nbsp;คน</h3>
                </div>
                <p>นับคนไข้สิทธิ์ UC ที่มาวันนี้</p>
                </div>
            </div>
            </div>
        </div>

      <div class="row">
        <div class="col-md-5">
            <div class="col-lg-12">
                <div class="media align-items-center food-card">
                    <i class='fas fa-tooth' style='font-size:70px;color:rgb(247, 41, 137)'></i>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <div class="media-body">
                        <div class="d-flex justify-content-between food-card-title">
                            <h4>คนไข้ที่มาทำฟันวันนี้ </h4>
                            <h3 class="price-tag">{{$data_den}}&nbsp;คน</h3>

                        </div>
                        <p>นับคนไข้ที่มาทำฟันวันนี้</p>
                        </div>
                    </div>
            </div>
            <div class="col-lg-12">
                <div class="media align-items-center food-card">
                    <i class='fas fa-procedures' style='font-size:70px;color:rgb(5, 129, 201)'></i>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <div class="media-body">
                    <div class="d-flex justify-content-between food-card-title">
                        <h4>คนไข้ตรวจโรคทั่วไปวันนี้ </h4>
                    <h3 class="price-tag">{{$data_narmal}}&nbsp;คน</h3>
                    </div>
                    <p>นับคนไข้ที่มาใช้บริการแพทย์แผนไทยวันนี้</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="media align-items-center food-card">
                  <i class='fas fa-lungs-virus' style='font-size:70px;color:rgb(243, 10, 231)'></i>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <div class="media-body">
                    <div class="d-flex justify-content-between food-card-title">
                      <h4>คนไข้ที่มาคลีนิกโรคเรื้อรังวันนี้ </h4>
                      <h3 class="price-tag">{{$data_rung}}&nbsp;คน</h3>

                    </div>
                    <p>นับคนไข้ที่มาคลีนิกโรคเรื้อรังวันนี้</p>
                  </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="media align-items-center food-card">
                  <i class='fas fa-user-md' style='font-size:70px;color:rgb(250, 246, 19)'></i>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <div class="media-body">
                    <div class="d-flex justify-content-between food-card-title">
                      <h4>คนไข้ที่มาคลีนิกอนามัยมารดาวันนี้ </h4>
                    <h3 class="price-tag">{{$data_marda}}&nbsp;คน</h3>
                    </div>
                    <p>นับคนไข้ที่มาใช้บริการคลีนิกอนามัยมารดาวันนี้</p>
                  </div>
                </div>
            </div>

        </div>
        <div class="col-md-7">
            <div class="card-body">
                <div id="chart_donut" style="width: 100%; height: 500px;"></div>
            </div>
        </div>
    </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="media align-items-center food-card">
            <i class='fas fa-syringe' style='font-size:70px;color:rgb(243, 115, 10)'></i>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="media-body">
              <div class="d-flex justify-content-between food-card-title">
                <h4>คนไข้ที่มาคลีนิกอนามัยเด็กดีวันนี้ </h4>
                <h3 class="price-tag">{{$data_dekdee}}&nbsp;คน</h3>

              </div>
              <p>นับคนไข้ที่มาคลีนิกอนามัยเด็กดีวันนี้</p>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="media align-items-center food-card">
            <i class='fas fa-stethoscope' style='font-size:70px;color:rgb(19, 138, 250)'></i>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="media-body">
              <div class="d-flex justify-content-between food-card-title">
                <h4>คนไข้ที่มาคลีนิกวางแผนครอบครัววันนี้ </h4>
              <h3 class="price-tag">{{$data_phan}}&nbsp;คน</h3>
              </div>
              <p>นับคนไข้ที่มาใช้บริการคลีนิกวางแผนครอบครัววันนี้</p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="media align-items-center food-card">
            <i class='fas fa-head-side-mask' style='font-size:70px;color:rgb(243, 45, 10)'></i>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="media-body">
              <div class="d-flex justify-content-between food-card-title">
                <h4>คนไข้ที่มาคลีนิกจิตเวชวันนี้ </h4>
                <h3 class="price-tag">{{$data_jit}}&nbsp;คน</h3>

              </div>
              <p>นับคนไข้ที่มาคลีนิกจิตเวชวันนี้</p>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="media align-items-center food-card">
            <i class='fas fa-user-nurse' style='font-size:70px;color:rgb(7, 231, 75)'></i>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="media-body">
              <div class="d-flex justify-content-between food-card-title">
                <h4>คนไข้ที่มาอื่นฯวันนี้ </h4>
              <h3 class="price-tag">{{$data_orther}}&nbsp;คน</h3>
              </div>
              <p>นับคนไข้ที่มาใช้บริการอื่นฯวันนี้</p>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>
  <!--================Food menu section end =================-->
  <br>

<script src="{{ asset('google/Charts.js') }}"></script>
<script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});
       google.charts.setOnLoadCallback(drawChart);
       function drawChart() {
         var data = google.visualization.arrayToDataTable( [
           ['Task', 'Person '],
           ['1-มีชื่อในทะเบียนบ้าน และอยู่อาศัยจริง', <?php echo $per_co1; ?>],
           ['2-มีชื่อในทะเบียนบ้านแต่ไม่ได้อยู่อาศัย', <?php echo $per_co2; ?>],
           ['3-ไม่มีชื่อในทะเบียนบ้านแต่มาอยู่อาศัย', <?php echo $per_co3; ?>],
           ['4-บุคคลนอกเขต', <?php echo $per_co4; ?>]
           ]);
         var options = {
           title: 'อัตราประชากรที่มีในฐานข้อมูล',
           fontName: 'Kanit',
           pieHole: 0.4,
         };
         var chart = new google.visualization.PieChart(document.getElementById('chart_donut'));
         chart.draw(data, options);
         }
</script>
