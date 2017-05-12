
(function () { 

  const config = {
    apiKey: "AIzaSyBDKJQYw9Nd4LPwV_lOnAu0XyIoXOHXBU8",
    authDomain: "fruitmarket-4a3ab.firebaseapp.com",
    databaseURL: "https://fruitmarket-4a3ab.firebaseio.com",
    projectId: "fruitmarket-4a3ab",
    storageBucket: "fruitmarket-4a3ab.appspot.com",
    messagingSenderId: "630953631631"
  };
  firebase.initializeApp(config);

  //get elements
  const preObject = document.getElementById('object');
  const ulList = document.getElementById('list');
  var json_data = {};

  var product = $('#code').val();
  console.log(product)
  const dbRefObject = firebase.database().ref().child(product);



dbRefObject.on('value', snap =>{
   json_data = JSON.stringify(snap.val(), null, 3);
   json_data = jQuery.parseJSON(json_data);
   g_price = 0;
  //preObject.innerText = json_data;
  //alert(preObject.innerText)
  $("#list").empty();
  $.each(json_data, function(index, val) {
     console.log(val)
     $("#list").prepend('<tr class="list"><td>'+ val.name +'</td><td>'+ val.price +'</td></tr>')
     g_price = val.price;
     g_user = val.id;
     global_price = g_price;
     global_user = g_user;
     user = val.name;
     global_name = user;

  });
$(function(){
  $( ".list" ).first().css("background-color", "#C0D9E5" );
  $("#now_price").html('<p>'+ g_price +' THB</p>')
  $("#now_user").html('<p><i class="fa fa-trophy"></i> '+ user +'</p>')
  
});





});



}());
// Initialize Firebase


function addOnClick(){
  var price = $('#price').val();
  var userid = $('#userid').val();
  var username = $('#name').val();
  var time = Math.floor(Date.now() /1000);
  insertData(price,userid,username,time);
}
function insertData(price,userid,username,time) {
  var product = $('#code').val();
  var firebaseRef=firebase.database().ref(product);
  firebaseRef.push({
    price:price,
    id:userid,
    name:username,
    time:time
  });
  // alert("Insert Success");
}
