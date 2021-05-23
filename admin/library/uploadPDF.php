<script src="https://www.gstatic.com/firebasejs/8.6.2/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.6.2/firebase-storage.js"></script>

<script>
  // Your web app's Firebase configuration
  var firebaseConfig = {
    apiKey: "AIzaSyDCWeMFpBvG6f3AvzTJqMcNuTrQGQeneRw",
    authDomain: "esdm-519ca.firebaseapp.com",
    projectId: "esdm-519ca",
    storageBucket: "esdm-519ca.appspot.com",
    messagingSenderId: "106796237894",
    appId: "1:106796237894:web:ae2be41eed34557ebb3647"
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