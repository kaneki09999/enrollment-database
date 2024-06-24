<?php include "include/header.php" ?>
  <div class="container mt-5">
    <h2 class="text-center mb-4">Professors</h2>
    <table class="table table-bordered table-striped">
      <thead class="thead-dark">
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Major</th>
          <th>Contact No.</th>
        </tr>
      </thead>
      <tbody>
                        <?php
                        $counter = 1;
                        $sql = "CALL SelectProf()";
                        $result = $conn->query($sql);

                        if ($result && $result->num_rows > 0) {
                            while ($details = $result->fetch_assoc()) {
                                ?>
                                <tr>
                                <td><?php echo $counter++; ?></td>
                                <td><?php echo $details['name']; ?></td>
                                <td><?php echo $details['major']; ?></td>
                                <td><?php echo $details['contact']; ?></td>
                                </tr>
                                <?php
                            }
                        } else {
                            echo "<tr><td colspan='10'>No records found</td></tr>";
                        }
                        ?>
                    </tbody>
     
    </table>
  </div>

  <br><br><br><br>
  <!-- Footer -->
  <footer>
    <div class="container">
      <p class="text-center">&copy; 2024 Enrollment System. All rights reserved.</p>
    </div>
  </footer>
  <!-- Add Bootstrap JS -->
  <script src="
