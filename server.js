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

		socket.on("new_order", function (data) {

			io.emit("new_order", data);
			console.log(data);
		})

	});

}

emitNewOrder(http_server);