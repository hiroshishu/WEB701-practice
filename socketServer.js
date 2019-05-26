var server = require('http').Server();
var io = require('socket.io')(server);

var Redis = require('ioredis');
var redis = new Redis();

redis.psubscribe('*', function(err, count){
    console.warn(err,count);
});
redis.on('pmessage', function (subscribed, channel, message) {
    message = JSON.parse(message);
    console.log(subscribed);
    console.log(channel);
    console.log(message);
    io.emit(channel + message.data.item_id, message.data);
});

server.listen(6001);