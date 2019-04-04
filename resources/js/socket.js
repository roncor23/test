
    var socket = io.connect("http://localhost:3001");


    socket.on("noti_reservation_architect", function (data) {

      console.log(data);
             if(data == 0) {

             $('.badge_architect').html('');

            }else {
                $('.badge_architect').html(data);
            }


    })

    socket.on("reset_noti_reservation_architect", function (data) {

      console.log(data);
            if(data == 0) {

             $('.badge_architect').html('');

            }else {
                $('.badge_architect').html(data);
            }


    })