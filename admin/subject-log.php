<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enrollment Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            padding-top: 56px; /* Adjust based on your top bar's height */
        }
        main {
            margin-left: 250px;
            padding: 20px; /* Add padding to maintain space around content */
        }
        .breadcrumb {
            padding: 0;
            background-color: #fff;
            border-radius: 4px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        .breadcrumb .nav-item {
            padding: 8px 15px;
        }
        .breadcrumb .nav-item.active {
            color: #333;
            pointer-events: none;
        }
        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .search-bar {
            max-width: 300px; /* Adjust width as needed */
        }
        .search-bar .form-control {
            color: #000;
        }
        .search-bar .btn {
            color: #000;
        }

    </style>
</head>
<body>
    <?php include "include/sidebar.php"; ?>

    <main>
    <section class="content">
    <ul class="breadcrumb">
                <li class="nav-item">
                    <a href="#"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                </li>
                <li class="nav-item">
                    <i class='fas fa-chevron-right'></i>
                </li>
                <li class="nav-item active">
                    <a href="#">List of Subjects</a>
                </li>
            </ul>
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
        

            <div class="card">

            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title">Subjects Log</h3>
            </div>
              <div class="card-body">
                <style>
                    .actions-column {
                        width: 80px;
                    }
                </style>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                            <th>Subject Code</th>
                            <th>Description</th>
                            <th>Units</th>
                            <th>Operation</th>
                            <th>Changed At</th>
                  </tr>
                  </thead>
                  
                  <tbody>
                        <?php
                        $sql = "CALL SelectAllSubjectsLog()";
                        $result = $conn->query($sql);

                        if ($result && $result->num_rows > 0) {
                            while ($details = $result->fetch_assoc()) {
                                ?>
                                <tr>
                                <td><?php echo $details['subject_code']; ?></td>
                                <td><?php echo $details['description']; ?></td>
                                <td><?php echo $details['units']; ?></td>
                                <td><?php echo $details['operation']; ?></td>
                                <td><?php echo $details['changed_at']; ?></td>
                                </tr>
                                  </form>
                                      </div>
                                      
                                    </div>
                                  </div>
                                </div>

                                <?php
                            }
                        } else {
                            echo "<tr><td colspan='10'>No records found</td></tr>";
                        }
                        ?>
                    </tbody>



                  <tfoot>
                    <tr>
                            <th>Subject Code</th>
                            <th>Description</th>
                            <th>Units</th>
                            <th>Operation</th>
                            <th>Changed At</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    </main>

    <?php include "include/footer-extension.php"; ?>
</body>
</html>
