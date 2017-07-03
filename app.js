/**
 * Module dependencies.
 */
var express = require('express');
var routes = require('./routes');
var http = require('http');
var path = require('path');
var session = require('express-session');
var bodyParser = require('body-parser');
//load productos route
var productos = require('./routes/productos');
var app = express();

var connection = require('express-myconnection');


// all environments
app.set('port', process.env.PORT || 4400);
app.set('views', path.join(__dirname, 'views'));
app.set('view engine', 'jade');
//app.use(express.favicon());
app.use(express.logger('dev'));
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: false }));
app.use(express.methodOverride());

app.use(express.static(path.join(__dirname, 'public')));

app.use(session({ secret: '123456', resave: true, saveUninitialized: true }));

// development only
if ('development' == app.get('env')) {
    app.use(express.errorHandler());
}



app.get('/', routes.index);
app.post('/', routes.login);
app.get('/productos', productos.list);
app.get('/productos/logout', productos.logout);
app.get('/productos/verfotos', productos.verfotos);
app.post('/productos/add', productos.save);
app.get('/productos/delete/:id', productos.delete_producto);
//app.get('/productos/verfotos', productos.verfotos);
app.get('/productos/edit/:id', productos.edit);
app.post('/productos/edit/:id', productos.save_edit);


app.use(app.router);

http.createServer(app).listen(app.get('port'), function() {
    console.log('Express server listening on port ' + app.get('port'));
});