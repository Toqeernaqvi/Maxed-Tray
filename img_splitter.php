<?php
include'db_conn.php';
SESSION_START();
 if (isset($_SESSION['name']) && isset($_SESSION['id'])) {
  // User is logged in, you can access their data
  $name = $_SESSION['name'];
  $id = $_SESSION['id'];
} else {
  // User is not logged in, you can redirect them to the login page
  header("Location: login.php"); // Change 'login.php' to your login page URL
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js"
      integrity="sha512-Gs+PsXsGkmr+15rqObPJbenQ2wB3qYvTHuJO6YJzPe/dTLvhy0fmae2BcnaozxDo5iaF8emzmCZWbQ1XXiX2Ig=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.css"
      integrity="sha512-zxBiDORGDEAYDdKLuYU9X/JaJo/DPzE42UubfBw9yg8Qvb2YRRIQ8v4KsGHOx2H1/+sdSXyXxLXv5r7tHc9ygg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="img_splitter.css" />

    <title>Image Splitter</title>
  </head>
  <body>
    <nav>
      <h2>WWW.IMAGESPLITTER.COM</h2>
       <a href="logout.php">(logout)</a>
      <h2>Welcome <?= $name ?></h2>

    </nav>
    <div id="app">
      <h1>Split Your image</h1>
      <div class="buttons">
        <button id="use" class="hidden">Upload</button>
        <button class="re-upload hidden" onclick="location.reload()">
          Re Upload
        </button>
        <button id="splitButton" class="hidden">Split</button>
        <button id="downloadButton" class="hidden">
          Download Split Images
        </button>
      </div>
      <div id="imageContainer">
        <div class="drop-zone">
          Upload your image <br />
          from choose file button
        </div>
      </div>
      <input type="file" id="imgInp" accept="image/*" />
      <img id="my-image" src="#" class="hidden" />
      <div class="buttons">
        <div class="container">
          <div class="row">
            <div class="col">
              <img id="result" src="" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="./src/script.js"></script>
  </body>
</html>
