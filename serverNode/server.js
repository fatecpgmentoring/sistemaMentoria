var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);

var users = {};

io.on('connection', function(socket) {
	socket.on("join", function(data) {
        users[data.user_id] = socket;
        socket.emit('connect', data.user_id);
        users.forEach(element => {
            if(element.disconnected)
        	{
        		delete element;
        	}
        });
    });

    socket.on("sendMessage", function(data) {
        if(users.hasOwnProperty(data.toUserId)) users[data.toUserId].emit("receiveMessage", data);
    });

    socket.on("typing", function(data) {
        if(data.typing)
        {
            if(users.hasOwnProperty(data.toUserId)) users[data.toUserId].emit("istyping");
        }
        else
        {
            if(users.hasOwnProperty(data.toUserId)) users[data.toUserId].emit("notyping");
        }

    });

    socket.on("disconnect", function(id) {
        if(users.hasOwnProperty(id)) socket.emit("isdiconnected", users[id] + " está desconectado.");
        delete users[id];
    });

});

http.listen(21097, function() {
    console.log('Servidor rodando em: tarotnovaera.kinghost.net:21097');
});
