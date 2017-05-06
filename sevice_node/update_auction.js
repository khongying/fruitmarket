var admin = require("firebase-admin");

var serviceAccount = require("./fruitmarket-4a3ab-firebase-adminsdk-4n4qa-b9f592e147.json");

admin.initializeApp({
  credential: admin.credential.cert(serviceAccount),
  databaseURL: "https://fruitmarket-4a3ab.firebaseio.com"
});
///end firebase



var mysql = require('mysql');

var mysql_conn = mysql.createConnection({
    host: '127.0.0.1',
    user: 'root',
    password: '',
    database: 'fruitmarket'
});
setInterval(function(){

mysql_conn.query("SELECT * FROM `auction_product` WHERE `status` = 'A' ", function(err, rows) {
    if (err) {
        throw err;
    }

    if(rows.length <= 0){
        console.log("not data");
    }else{
	    for (id in rows) {
	    	var end = rows[id].end_time;
	    	var end_time = end.getTime()/1000;
	    	var now_time = Math.floor(Date.now() /1000);

	    	 // console.log(rows[id].id);
	    	if(now_time == end_time){
	    		var product = rows[id].code;
	    		var ref = admin.database().ref(product);
	    		var now_user = {};
				ref.once('value')
					.then(function(snap){
						snap.forEach(function(childSnapshot) {
					      var key = childSnapshot.key;
					      var childData = childSnapshot.val();
					      now_user = childData;
					  	});
					  	if (typeof now_user.id != "undefined" || now_user.id != null){
						  	
							  	var user_id = now_user.id;
							  	var price = now_user.price;
							  	var sql_qt = "INSERT INTO `qt_auction`(`user_id`, `auction_product_id`, `now_price`, `create_date`) VALUES ('"+user_id+"','"+product+"','"+price+"',now())";
								mysql_conn.query(sql_qt, function(err, rows) {
			    						console.log("Add QT OK");
			    				});	
			    				sql_qt = null;		
						  

					  	}else{
					  		now_user = {};
					  		console.log("not QT");
					  	}
					  	//console.log(now_user);

					})
					
				var id = rows[id].id;
	    		
		    		var sql = "UPDATE `auction_product` SET `status`='D' WHERE `id` = '"+id+"'";
		    		// console.log(sql);
		    		mysql_conn.query(sql, function(err, rows) {
		    			console.log("Update OK");
		    		});
		    		sql = null;	
	    		

	    	}else{
	    		// console.log("not update");
	    	}

	    	
	        //console.log(rows[id].code +" "+ rows[id].end_time);
	    }
    	
    }
}); 
	
}, 1000)