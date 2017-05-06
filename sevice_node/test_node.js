
var admin = require("firebase-admin");

var serviceAccount = require("./fruitmarket-4a3ab-firebase-adminsdk-4n4qa-b9f592e147.json");

admin.initializeApp({
  credential: admin.credential.cert(serviceAccount),
  databaseURL: "https://fruitmarket-4a3ab.firebaseio.com"
});

var 
