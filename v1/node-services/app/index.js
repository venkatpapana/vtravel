var Hapi = require('hapi');

var MongoClient = require('mongodb').MongoClient;
var assert = require('assert');

/**
 *	Config START
 */
var db_url = 'mongodb://localhost:27017';
var db_collection = 'wetravel';
var service_host = 'localhost';
var service_path = '/wetravel/services/getLowFareResults.php';
var destinations = ["BER", "BCN", "LON", "CPH", "PAR", "IST"];

/**
 *	Config END
 */



var findResuls = function (db, callback) {
    var cursor = db.collection(db_collection).find();
    cursor.each(function (err, doc) {
        assert.equal(err, null);
        callback(doc);
        return;
//        if (doc !== null) {
//            console.dir(doc);
//        } else {
//         callback();
//        }
    });
};




// Create a server with a host and port
var server = new Hapi.Server();
server.connection({ 
    host: 'localhost', 
    port: 8000 
});


// Add the route
server.route({
    method: 'GET',
    path:'/getLowfareSearchResults', 
    handler: function (request, reply) {
        //get the results from cache
        
        
        MongoClient.connect(db_url, function(err, db) {
          assert.equal(null, err);
          findResuls(db, function(results) {
              db.close();
              
              if(results !== null) {
                    //send the results        
                    reply(results);   
              }else{
                //if there are no cached results, send a request to GDS then cache
                  
                  
              }
              
          });
        });                       
    }
});

// Start the server
server.start(function () {
    console.log('Server running at:', server.info.uri);
});