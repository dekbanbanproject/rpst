
//  swal({
//     title: "Auto close alert!",
//     text: "I will close in 2 seconds.",
//     timer: 2000
//   });

   //Delete ผู้เช่า
    $('.deletePerson').click(function(e){
        e.preventDefault();
        // alert('Test');

         var delete_id = $(this).closest("tr").find('.deleteID').val();
        // alert(delete_id);

        swal({
            title: "คุณต้องการลบใช่หรือไม่?",
            text: "deleted, คุณจะไม่สามารถดึงไฟล์กลับมาได้อีก!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {                
                var data ={
                    "_token": $('input[name=_token]').val(),
                    "id": delete_id,
                };                
                $.ajax({
                    type: "DELETE",
                    url: "/person-destroy/"+delete_id,
                    data: data,
                    success: function (response){
                        swal(response.status, {
                            icon: "success",
                          })
                          .then((willDelete) => {
                              location.reload();
                        });
                    }
                });  
            }
          });
    }); 
    
    //Delete ผู้เช่า
    $('.deleteOwner').click(function(e){
        e.preventDefault();
        // alert('Test');

         var delete_id = $(this).closest("tr").find('.deleteID').val();
        // alert(delete_id);

        swal({
            title: "คุณต้องการลบใช่หรือไม่?",
            text: "deleted, คุณจะไม่สามารถดึงไฟล์กลับมาได้อีก!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {                
                var data ={
                    "_token": $('input[name=_token]').val(),
                    "id": delete_id,
                };                
                $.ajax({
                    type: "DELETE",
                    url: "/owner-destroy/"+delete_id,
                    data: data,
                    success: function (response){
                        swal(response.status, {
                            icon: "success",
                          })
                          .then((willDelete) => {
                              location.reload();
                        });
                    }
                });  
            }
          });
    }); 

    //Delete Room
    $('.deleteRoom').click(function(e){
        e.preventDefault();
        // alert('Test');

        var delete_id = $(this).closest("tr").find('.deleteID').val();
        // alert(delete_id);

        swal({
            title: "คุณต้องการลบใช่หรือไม่?",
            text: "deleted, คุณจะไม่สามารถดึงไฟล์กลับมาได้อีก!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {                
                var data ={
                    "_token": $('input[name=_token]').val(),
                    "id": delete_id,
                };                
                $.ajax({
                    type: "DELETE",
                    url: "/room-destroy/"+delete_id,
                    data: data,
                    success: function (response){
                        swal(response.status, {
                            icon: "success",
                        })
                        .then((willDelete) => {
                            location.reload();
                        });
                    }
                });  
            }
        });
    }); 

     //Delete Roomlist
     $('.deleteRoomlist').click(function(e){
        e.preventDefault();
        // alert('Test');

        var delete_id = $(this).closest("tr").find('.deleteID').val();
        // alert(delete_id);

        swal({
            title: "คุณต้องการลบใช่หรือไม่?",
            text: "deleted, คุณจะไม่สามารถดึงไฟล์กลับมาได้อีก!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {                
                var data ={
                    "_token": $('input[name=_token]').val(),
                    "id": delete_id,
                };                
                $.ajax({
                    type: "DELETE",
                    url: "/roomlist-destroy/"+delete_id,
                    data: data,
                    success: function (response){
                        swal(response.status, {
                            icon: "success",
                        })
                        .then((willDelete) => {
                            location.reload();
                        });
                    }
                });  
            }
        });
    }); 

     //Delete Rent
     $('.deleteRent').click(function(e){
        e.preventDefault();
        // alert('Test');

        var delete_id = $(this).closest("tr").find('.deleteID').val();
        // alert(delete_id);

        swal({
            title: "คุณต้องการลบใช่หรือไม่?",
            text: "deleted, คุณจะไม่สามารถดึงไฟล์กลับมาได้อีก!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {                
                var data ={
                    "_token": $('input[name=_token]').val(),
                    "id": delete_id,
                };                
                $.ajax({
                    type: "DELETE",
                    url: "/rent-destroy/"+delete_id,
                    data: data,
                    success: function (response){
                        swal(response.status, {
                            icon: "success",
                        })
                        .then((willDelete) => {
                            location.reload();
                        });
                    }
                });  
            }
        });
    }); 



 

