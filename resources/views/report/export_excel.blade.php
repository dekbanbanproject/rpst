    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th style="text-align: center;"width="5%">ลำดับ</th>                          
                <th style="text-align: center;">วันที่</th>  
                <th style="text-align: center;">เลขที่บิล</th>
                <th style="text-align: center;">CID</th>  
                <th style="text-align: center;">ชื่อ-นามสกุล</th>  
                <th style="text-align: center;">รวมยอดชำระ</th> 
            </tr>
        </thead>              
        <tbody>
        <?php $number = 0; ?>
            @foreach ($rentmonths as $rentmonth)
                <?php $number++; ?>
                    <tr>
                        <td>{{ $number}}</td> 
                        <td style="text-align: center;">{{$rentmonth->RENT_DATE}}</td>    
                        <td style="text-align: center;">{{$rentmonth->RENT_NO}}</td>   
                        <td style="text-align: center;">{{$rentmonth->PERSON_CID}}</td> 
                        <td style="text-align: center;">{{$rentmonth->PERSON_FNAME}}&nbsp;&nbsp; {{$rentmonth->PERSON_LNAME}}</td>  
                        <td style="text-align: center;">{{number_format($rentmonth->RENT_TOTAL_PRICE,2)}}</td>  
                        
                    </tr>                       
            @endforeach
        </tbody>
    </table> 