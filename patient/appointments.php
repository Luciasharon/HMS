<?php
   session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Book Appointment</title>
</head>
<body>
      
      <?php
       include ("../include/header.php");
       include ("../include/connection.php");
    ?> 

  <div class="container-fluid">
    <h1>Book Appointment</h1>
    <form id="appointment-form">
      <div class="form-group">
        <label for="patient-name">Patient Name:</label>
        <input type="text" id="patient-name" name="patient-name" required>
      </div>
      <div class="form-group">
        <label for="doctor-name">Doctor Name:</label>
        <select id="doctor-name" name="doctor-name" required>
          <option value="">Select a doctor</option>
          <?php
            $doctors = array("Dr. Smith", "Dr. Johnson", "Dr. Williams");
            $conn = new mysqli("localhost", "username", "password", "database_name");
            $sql = "SELECT name FROM doctors";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
              }
            }
            $conn->close();
          ?>
        </select>
      </div>
      <div class="form-group">
        <label for="appointment-date">Appointment Date:</label>
        <input type="date" id="appointment-date" name="appointment-date" required>
      </div>
      <button type="submit">Book Appointment</button>
    </form>
  </div>

  <script>
    document.getElementById('appointment-form').addEventListener('submit', function(event) {
      event.preventDefault();
      var patientName = document.getElementById('patient-name').value;
      var doctorName = document.getElementById('doctor-name').value;
      var appointmentDate = document.getElementById('appointment-date').value;

      // Send the form data to the server using AJAX
      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'book_appointment.php', true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
          alert('Appointment booked successfully!');
        }
      };
      xhr.send('patient_name=' + encodeURIComponent(patientName) + '&doctor_name=' + encodeURIComponent(doctorName) + '&appointment_date=' + encodeURIComponent(appointmentDate));
    });
  </script>
</body>
</html>