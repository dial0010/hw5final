// Add Driver Function
function addDriver() {
  // Capture input values and submit them
  const driverName = document.getElementById('driverName').value;
  const carBrand = document.getElementById('carBrand').value;

  if (driverName && carBrand) {
    // Send data to the server via AJAX or submit form
    alert('Driver added successfully');
    // Close modal
    $('#addDriverModal').modal('hide');
  } else {
    alert('Please fill all fields');
  }
}

// Edit Driver Function
function editDriver(driverId) {
  // Populate the fields with current driver data
  alert('Edit driver ID: ' + driverId);
}

// Delete Driver Function
function deleteDriver(driverId) {
  const confirmation = confirm('Are you sure you want to delete this driver?');
  if (confirmation) {
    // Perform delete action (AJAX or form submission)
    alert('Driver deleted');
  }
}

// Event listener for the "Add Driver" form submission
document.getElementById('addDriverForm').addEventListener('submit', function (e) {
  e.preventDefault(); // Prevent form submission
  addDriver();
});
