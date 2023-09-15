<?php
SESSION_START();

if (isset($_SESSION['auth'])) {
  if ($_SESSION['auth'] != 1) {
    header("location:login.php");
  }
} else {
  header("location:login.php");
}
include 'header.php';
include '../db_conn.php';

$sql = "SELECT * FROM users where status = '1' and role != 'admin'";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/pending_orders.css">
  <script src="js/script.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body class="user-page">
  <div class="container">
    <?php if (isset($_GET['success'])) { ?><p class="success bg-warning" id="successMessage"><?php echo $_GET['success']; ?></p><?php } ?>
  </div>

  <div class="container pendingbody">
    <div class="create-btn-container"> 
      <h5>All Users</h5>
      <button class="btn btn-primary" data-toggle="modal" data-target="#createModal">Create</button>
    </div>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Name</th>
          <th scope="col">Registration Key</th>
          <th scope="col">Email</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if (mysqli_num_rows($result) > 0) {
          // output data of each row
          while ($row = mysqli_fetch_assoc($result)) {
        ?>


            <tr>
              <td><?php echo $row["id"] ?></td>
              <td><?php echo $row["name"] ?></td>
              <td><?php echo $row["registration_key"] ?></td>
              <td><?php echo $row["email"] ?></td>

              <td>
                <button class="btn btn-primary" data-toggle="modal" data-target="#updateModal" data-userid="<?php echo $row['id']; ?>">Update</button>
                <button class="btn btn-danger" id="deleteUser" data-userid="<?php echo $row['id']; ?>">Delete</button>
              </td>
            </tr>
        <?php
          }
        } else
          echo "0 results";
        ?>
      </tbody>
    </table>
  </div>



  <!--Update Modal -->
  <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="updateModalLabel">Update User Information</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Form to update user information -->
          <form id="updateForm" action="update-user.php" method="post">
            <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" class="form-control" name="name" id="name">
            </div>
            <!-- <div class="form-group">
              <label for="password">Password:</label>
              <input type="password" class="form-control" name="password" id="password">
            </div> -->
            <div class="form-group">
              <label for="registration_key">Registration Key:</label>
              <input type="text" class="form-control" id="registration_key" name="registration_key">
            </div>
            <div class="form-group">
              <input type="hidden" class="form-control" id="userId" name="userId">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-info" id="updateButton">Submit</button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>


  <!--Create Modal -->
  <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createModalLabel">Create User Information</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Form to create user information -->
          <form id="createForm" action="create-user.php" method="post">
            <div class="form-group">
              <label for="name">Email:</label>
              <input type="email" class="form-control" id="email" name="email">
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" id="updateButton">Create</button>
            </div>

          </form>
        </div>

      </div>
    </div>
  </div>


  <!-- portion 2 -->
  <script>
    // populate data in update module
    $('.btn-primary').on('click', function() {
      var userId = $(this).data("userid");
      var name = $(this).closest('tr').find('td:eq(1)').text();
      // var password = $(this).closest('tr').find('td:eq(4)').text();
      var registration_key = $(this).closest('tr').find('td:eq(2)').text();

      // Populate the form fields with data

      $('#userId').val(userId);
      $('#name').val(name);
      // $('#password').val(password);
      $('#registration_key').val(registration_key);
    });


    //  delete use r request
    $(".btn-danger").click(function() {
      var userId = $(this).data("userid");

      $.ajax({
        type: "POST", // You can use POST or GET as per your needs
        url: "delete.php",
        data: {
          userId: userId
        },
        success: function(response) {
          alert("User deleted successfully.")
          window.location.reload();
        },
        error: function() {
          // Handle AJAX errors here
          alert("An error occurred while processing your request.");
        }
      });
    });

    // Add JavaScript to hide the success message after 5 seconds
    setTimeout(function() {
      console.log("working...");
      var successMessage = document.getElementById('successMessage');
      if (successMessage) {
        successMessage.style.display = 'none';
      }
    }, 5000); // 5000 milliseconds = 5 seconds
  </script>



</body>

</html>