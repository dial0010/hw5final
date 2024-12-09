<?php include 'view-header.php'; ?>

<div class="container mt-4">
  <h1>Drivers</h1>

  <!-- Table of drivers (content will be fetched from the database) -->
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Driver Name</th>
        <th>Car Brand</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <!-- PHP code to fetch and display drivers here -->
      <tr>
        <td>1</td>
        <td>John Doe</td>
        <td>Toyota</td>
        <td>
          <button class="btn btn-warning" onclick="editDriver(1)">Edit</button>
          <button class="btn btn-danger" onclick="deleteDriver(1)">Delete</button>
        </td>
      </tr>
    </tbody>
  </table>

  <!-- Add new driver modal -->
  <button class="btn btn-success" data-toggle="modal" data-target="#addDriverModal">Add Driver</button>
  <!-- Modal for adding a new driver -->
  <div class="modal" id="addDriverModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add Driver</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form id="addDriverForm">
            <div class="form-group">
              <label for="driverName">Driver Name</label>
              <input type="text" class="form-control" id="driverName" required>
            </div>
            <div class="form-group">
              <label for="carBrand">Car Brand</label>
              <input type="text" class="form-control" id="carBrand" required>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include 'view-footer.php'; ?>
