<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sapne</title>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css" />
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h1 class="brand"><span>Sapne</span> Volunteering</h1>
    <div class="wrapper">
      <div class="company-info">
        <h3>Sapne Volunteer With Us</h3>
        <ul>
          <li><i class="fa fa-road"></i> address</li>
          <li><i class="fa fa-phone"></i> phone</li>
          <li><i class="fa fa-envelope"></i> email</li>
        </ul>
      </div>
      <div class="contact">
        <h3>Email Us</h3>
        <div class="alert">Your message has been sent</div>
        <form id="contactForm">
          <p>
            <label>Name</label>
            <input type="text" name="name" id="name" required>
          </p>
          <p>
            <label>Date Of Birth</label>
            <input type="text" name="dob" id="dob">
          </p>
          <p>
            <label>Email Address</label>
            <input type="email" name="email" id="email" required>
          </p>
          <p>
            <label>Phone Number</label>
            <input type="text" name="phone" id="phone">
          </p>
          <p class="full">
            <label>Message</label>
            <textarea name="message" rows="5" id="message"></textarea>
          </p>
          <p class="full">
            <button type="submit">Submit</button>
          </p>
        </form>
      </div>
    </div>
  </div>

  <script src="https://www.gstatic.com/firebasejs/4.3.0/firebase.js"></script>

  <script src="https://www.gstatic.com/firebasejs/4.3.0/firebase.js"></script>
 
    
    <script>
        // Initialize Firebase (ADD YOUR OWN DATA)
 var config = {
    apiKey: "AIzaSyBMrH_5fdksKVfgBQ4JwOmfA-95YC3lepk",
    authDomain: "sapnedatabase.firebaseapp.com",
    databaseURL: "https://sapnedatabase.firebaseio.com",
    projectId: "sapnedatabase",
    storageBucket: "sapnedatabase.appspot.com",
    messagingSenderId: "1037233251454"
  };
  firebase.initializeApp(config);

// Reference messages collection
var messagesRef = firebase.database().ref('messages');

// Listen for form submit
document.getElementById('contactForm').addEventListener('submit', submitForm);

// Submit form
function submitForm(e){
  e.preventDefault();

  // Get values
  var name = getInputVal('name');
  var dob = getInputVal('dob');
  var email = getInputVal('email');
  var phone = getInputVal('phone');
  var message = getInputVal('message');

  // Save message
  saveMessage(name, dob, email, phone, message);

  // Show alert
  document.querySelector('.alert').style.display = 'block';

  // Hide alert after 3 seconds
  setTimeout(function(){
    document.querySelector('.alert').style.display = 'none';
  },3000);

  // Clear form
  document.getElementById('contactForm').reset();
}

// Function to get get form values
function getInputVal(id){
  return document.getElementById(id).value;
}

// Save message to firebase
function saveMessage(name, company, email, phone, message){
  var newMessageRef = messagesRef.push();
  newMessageRef.set({
    name: name,
    dob:dob,
    email:email,
    phone:phone,
    message:message
  });
}
    </script>
    <style>
        *{
  box-sizing: border-box;
}

body{
  background:#92bde7;
  color:#485e74;
  line-height:1.6;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  padding:1em;
}

.container{
  max-width:1170px;
  margin-left:auto;
  margin-right:auto;
  padding:1em;
}

ul{
  list-style: none;
  padding:0;
}

.brand{
  text-align: center;
}

.brand span{
  color:#fff;
}

.wrapper{
  box-shadow: 0 0 20px 0 rgba(72,94,116,0.7);
}

.wrapper > *{
  padding: 1em;
}

.company-info{
  background:#c9e6ff;
}

.company-info h3, .company-info ul{
  text-align: center;
  margin:0 0 1rem 0;
}

.contact{
  background:#f9feff;
}

/* FORM STYLES */
.contact form{
  display: grid;
  grid-template-columns: 1fr 1fr;
  grid-gap:20px;
}

.contact form label{
  display:block;
}

.contact form p{
  margin:0;
}

.contact form .full{
  grid-column: 1 / 3;
}

.contact form button, .contact form input, .contact form textarea{
  width:100%;
  padding:1em;
  border:1px solid #c9e6ff;
}

.contact form button{
  background:#c9e6ff;
  border:0;
  text-transform: uppercase;
}

.contact form button:hover,.contact form button:focus{
  background:#92bde7;
  color:#fff;
  outline:0;
  transition: background-color 2s ease-out;
}

.alert{
  text-align: center;
  padding:10px;
  background:#79c879;
  color:#fff;
  margin-bottom:10px;
  display:none;
}

/* LARGE SCREENS */
@media(min-width:700px){
  .wrapper{
    display: grid;
    grid-template-columns: 1fr 2fr;
  }

  .wrapper > *{
    padding:2em;
  }

  .company-info h3, .company-info ul, .brand{
    text-align: left;
  }
}
    </style>
</body>
</html>