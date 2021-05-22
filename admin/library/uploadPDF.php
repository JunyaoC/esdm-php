<script src="https://www.gstatic.com/firebasejs/8.6.2/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.6.2/firebase-storage.js"></script>

<script>
  // Your web app's Firebase configuration
  var firebaseConfig = {
    apiKey: "AIzaSyBn6msKCQR6gstFDTjSUy7-WPSSxWUzUD0",
    authDomain: "esdm-d16a4.firebaseapp.com",
    projectId: "esdm-d16a4",
    storageBucket: "esdm-d16a4.appspot.com",
    messagingSenderId: "315333777495",
    appId: "1:315333777495:web:a90401f4982ddf67f12b12"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  console.log(firebase)
</script>
<script type="text/javascript" src="uploadPdf.js"></script>
<!DOCTYPE html>
<html>

<head>
  <form enctype="multipart/form-data">
    <label>select image : </label>
    <input type="file" id="pdf" accept="application/pdf,application/vnd.ms-excel/*"><br><br>
    <button type="button" onclick="upload()">a</button>


  </form>
</head>

<body>


</html>