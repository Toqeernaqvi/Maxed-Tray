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

$sql = "SELECT * FROM users";
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

</head>

<body>

  <div class="container pendingbody">
    <h5>All Users</h5>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Name</th>
          <th scope="col">Pin</th>
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
              <td><button class="btn btn-primary" data-toggle="modal" data-target="#updateModal" data-userid="1">Update</button></td>
              <td><button class="btn btn-primary" data-toggle="modal" data-target="#createModal" data-userid="1">Create</button></td>
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
          <form id="updateForm">
            <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
              <label for="password">Password:</label>
              <input type="password" class="form-control" id="password" name="password">
            </div>
            <input type="hidden" id="userId" name="userId">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="updateButton">Update</button>
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
          <form id="updateForm">
            <div class="form-group">
              <label for="name">Email:</label>
              <input type="text" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
              <label for="registration_key">Registration Key:</label>
              <input type="text" class="form-control" id="registration_key" name="registration_key">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="updateButton">Create</button>
        </div>
      </div>
    </div>
  </div>


  <!-- portion 2 -->
  <script>
    $(document).ready(function() {
      // Function to populate the modal with user data when the "Update" button is clicked
      $('.btn-primary').on('click', function() {
        var userId = $(this).data('userid');
        var name = $(this).closest('tr').find('td:eq(0)').text();
        var password = $(this).closest('tr').find('td:eq(1)').text();

        $('#userId').val(userId);
        $('#name').val(name);
        $('#password').val(password);
      });

      // Function to update user information when the "Update" button in the modal is clicked
      $('#updateButton').on('click', function() {
        var formData = $('#updateForm').serialize();

        // Send the form data to a PHP script for processing
        $.ajax({
          url: 'update_user.php', // Replace with your PHP script's URL
          method: 'POST',
          data: formData,
          success: function(response) {
            // Handle the response from the PHP script (e.g., display a success message)
            console.log(response);
            // Close the modal
            $('#updateModal').modal('hide');
          },
          error: function(error) {
            // Handle any errors that occur during the AJAX request
            console.error(error);
          }
        });
      });
    });
  </script>



</body>

</html>