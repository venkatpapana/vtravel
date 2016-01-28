var http = require('http');
var querystring = require('querystring');

var MongoClient = require('mongodb').MongoClient;
var assert = require('assert');
var ObjectId = require('mongodb').ObjectID;


/**
 *	Config START
 */
var db_url = 'mongodb://localhost:27017/wetravel';
var service_host = 'localhost';
var service_path = '/wetravel/services/getLowFareResults.php';
var destinations1 = ["BER", "BCN", "LON", "CPH", "PAR", "IST"];
var destinations2 = ['BRU', 'AGP', 'ROM', 'KRK', 'TLL', 'LIS'];
/**
 *	Config END
 */



var insertDocument = function(db, doc, callback) {
    db.collection('wetravel').insertOne(doc, function(err, result) {
    assert.equal(err, null);
    console.log("Inserted a document into the wetravel collection.");
    callback(result);
  });
};



var getTodayDate = function() {
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();

    if(dd < 10) {
        dd = '0' + dd;
    } 

    if(mm < 10) {
        mm = '0' + mm;
    } 
    today = yyyy + '-' + mm + '-' + dd;
    return today;
};


var callback = function callback(response) {
  var str = '';

  //another chunk of data has been recieved, so append it to `str`
  response.on('data', function (chunk) {
    str += chunk;
  });

  //the whole response has been recieved, so we just print it out here
  response.on('end', function () {
    console.log(data);
    console.log(str, "\n\n");

    //load the results in mongo




  });
}

for (var i = destinations1.length - 1; i >= 0; i--) {
    var data = {
        "trip_type" : "one_way",
        "from_place" : destinations1[i],
        "from_date" : getTodayDate(),
        "destinations[]" : destinations1
    };
    var postData = querystring.stringify(data);
    doReqProcess(postData);
    //console.log(postData);;

} //for

for (var i = destinations2.length - 1; i >= 0; i--) {
    var data = {
        "trip_type" : "one_way",
        "from_place" : destinations2[i],
        "from_date" : getTodayDate(),
        "destinations[]" : destinations2
    };
    var postData = querystring.stringify(data);
    doReqProcess(postData);
    //console.log(postData);;

} //for


function doReqProcess(postData) {
    var options = {
      host: service_host,
      path: service_path,
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded',
        'Content-Length': postData.length
      }
    };  

    //console.log(data.from_place);
    //getLowfareSearchResults(options, data, callback);
    var req = http.request(options, function(response) {
        var str = '';

        //another chunk of data has been recieved, so append it to `str`
        response.on('data', function (chunk) {
            str += chunk;
        });

        //the whole response has been recieved, so we just print it out here
        response.on('end', function () {
            console.log("---- "+data.from_place+" ----");         
            
            //load the results in mongo
            MongoClient.connect(db_url, function(err, db) {
                assert.equal(null, err);
                insertDocument(db, JSON.parse(str), function(result) {
                    console.log(result);
                    db.close();
                });
            });

        });
    });
    req.write(postData);
    req.end();    
}

