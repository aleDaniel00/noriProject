
/*
 * GET users listing.
 */

exports.logout = function(req, res){
  req.session.destroy(function(err){
    if(err){
      console.log(err);
    }
    else
    {
      res.redirect('/');
    }
  });
};

exports.list = function(req, res){
  if (req.session.user) {

    req.getConnection(function(err,connection){
       
      var query = connection.query('SELECT * FROM productos',function(err,rows)
      {
            
        if(err)
            console.log("Error Selecting : %s ",err );
 
        res.render('productos.jade',{page_title:"productos - Node.js",data:rows});
            
           
      });
         
         //console.log(query.sql);
    });
  }else{
    res.render('index.jade', { page_title: 'Login de usuarios',msj: 'Para acceder a este contenido tiene que estar logueado' });
  }
  
  
};

exports.add = function(req, res){
  if (req.session.user) {
    res.render('add_producto.jade',{page_title:"Add productos - Node.js"});
  }else{
    res.render('index.jade', { page_title: 'Login de usuarios',msj: 'Para acceder a este contenido tiene que estar logueado' });
  }
  
};

exports.edit = function(req, res){
  if (req.session.user) {
    var id = req.params.id;
    
    req.getConnection(function(err,connection){
       
        var query = connection.query('SELECT * FROM productos WHERE id = ?',[id],function(err,rows)
        {
            
            if(err)
                console.log("Error Selecting : %s ",err );

            if (rows.length == 0){
              alert ("Usuario inexistente");
            }else{
              res.render('edit_producto.jade',{page_title:"Edit productos - Node.js",data:rows});
            }
                     
         });
         
         //console.log(query.sql);
    }); 
  }else{
    res.render('index.jade', { page_title: 'Login de usuarios',msj: 'Para acceder a este contenido tiene que estar logueado' });
  }
    
};

/*Save the producto*/
exports.save = function(req,res){
  if (req.session.user) {
    var input = JSON.parse(JSON.stringify(req.body));
    
    req.getConnection(function (err, connection) {
        
        var data = {
            
            nombre    : input.nombre,
            descripcion : input.descripcion,
            precio   : input.precio,
            imagen   : input.imagen 
        
        };
        
        var query = connection.query("INSERT INTO productos set ? ",data, function(err, rows)
        {
  
          if (err)
              console.log("Error inserting : %s ",err );
         
          res.redirect('/productos');
          
        });
        
       // console.log(query.sql); get raw query
    
    });
  }else{
    res.render('index.jade', { page_title: 'Login de usuarios',msj: 'Para acceder a este contenido tiene que estar logueado' });
  }    
    
};

exports.save_edit = function(req,res){
  if (req.session.user) {
    var input = JSON.parse(JSON.stringify(req.body));
    var id = req.params.id;
    
    req.getConnection(function (err, connection) {
        
        var data = {
            
            nombre    : input.nombre,
            descripcion : input.descripcion,
            precio   : input.precio,
            imagen   : input.imagen 
        
        };
        
        connection.query("UPDATE productos set ? WHERE id = ? ",[data,id], function(err, rows)
        {
  
          if (err)
              console.log("Error Updating : %s ",err );
         
          res.redirect('/productos');
          
        });
    
    });
  }else{
    res.render('index.jade', { page_title: 'Login de usuarios',msj: 'Para acceder a este contenido tiene que estar logueado' });
  }
    
};


exports.delete_producto = function(req,res){
  if (req.session.user) {
    var id = req.params.id;
    
    req.getConnection(function (err, connection) {
        
        connection.query("DELETE FROM productos  WHERE id = ? ",[id], function(err, rows)
        {
            
             if(err)
                 console.log("Error deleting : %s ",err );
            
             res.redirect('/productos');
             
        });
        
    });
  }else{
    res.render('index.jade', { page_title: 'Login de usuarios',msj: 'Para acceder a este contenido tiene que estar logueado' });
  }      
    
};


