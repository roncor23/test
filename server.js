var socket	=	require('socket.io'),
	express	=	require('express'),
	https	=	require('https'),
	http 	=	require('http');




var app	=	express();
var	http_server	=	http.createServer(app).listen(3001, function(){

		console.log("socket listen to 3001 port");

});	


function emitNewOrder(http_server) {

	var io	=	socket.listen( http_server );

	io.sockets.on('connection', function (socket) {

		socket.on("noti_reservation_architect", function (data) {

			io.emit("noti_reservation_architect", data);
			console.log(data);
		})

		socket.on("reset_noti_reservation_architect", function (data) {

			io.emit("reset_noti_reservation_architect", data);
			console.log(data);
		})


	});

}

emitNewOrder(http_server);