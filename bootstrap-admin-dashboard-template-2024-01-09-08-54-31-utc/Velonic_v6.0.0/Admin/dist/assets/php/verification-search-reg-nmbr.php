<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Student Details</title>
    <style>
        .centered-box {
            max-width: 600px;
            margin: 20px auto;
        }

        .card-header {
            background-color: #3bc0c3;
            color: white;
            text-align: center;
        }
        .back-button {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        include 'db_connection.php'; // Include the database connection file

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $reg_number = $_POST['registration_no'];

            $sql = "SELECT * FROM certificate WHERE registration_no = ?";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("s", $reg_number);
            $stmt->execute();
            $result = $stmt->get_result();

            echo "<div class='centered-box'>";
            if ($result->num_rows > 0) {
                echo "<div class='card'>";
                echo "<div class='card-header text-white'><h4 class='mb-0 text-center'>Student Details</h4></div>";
                echo "<div class='card-body'>";
                while($row = $result->fetch_assoc()) {
                    echo "<div class='row mb-2'>";
                    echo "<div class='col-md-4'><strong>Certificate Title:</strong></div>";
                    echo "<div class='col-md-8'>" . htmlspecialchars($row["certificate_title"]) . "</div>";
                    echo "</div>";
                    echo "<div class='row mb-2'>";
                    echo "<div class='col-md-4'><strong>Registration Number:</strong></div>";
                    echo "<div class='col-md-8'>" . htmlspecialchars($row["registration_no"]) . "</div>";
                    echo "</div>";
                    echo "<div class='row mb-2'>";
                    echo "<div class='col-md-4'><strong>Name:</strong></div>";
                    echo "<div class='col-md-8'>" . htmlspecialchars($row["name"]) . "</div>";
                    echo "</div>";
                    echo "<div class='row mb-2'>";
                    echo "<div class='col-md-4'><strong>Course:</strong></div>";
                    echo "<div class='col-md-8'>" . htmlspecialchars($row["course"]) . "</div>";
                    echo "</div>";
                    echo "<div class='row mb-2'>";
                    echo "<div class='col-md-4'><strong>Email:</strong></div>";
                    echo "<div class='col-md-8'>" . htmlspecialchars($row["email"]) . "</div>";
                    echo "</div>";
                    echo "<div class='row mb-2'>";
                    echo "<div class='col-md-4'><strong>Contact No.:</strong></div>";
                    echo "<div class='col-md-8'>" . htmlspecialchars($row["contact_no"]) . "</div>";
                    echo "</div>";
                    echo "<div class='row mb-2'>";
                    echo "<div class='col-md-4'><strong>Course Started From:</strong></div>";
                    echo "<div class='col-md-8'>" . htmlspecialchars($row["course_duration_from"]) . "</div>";
                    echo "</div>";
                    echo "<div class='row mb-2'>";
                    echo "<div class='col-md-4'><strong>Course Ended to:</strong></div>";
                    echo "<div class='col-md-8'>" . htmlspecialchars($row["course_duration_to"]) . "</div>";
                    echo "</div>";
                    echo "<div class='row mb-2'>";
                    echo "<div class='col-md-4'><strong>College Name:</strong></div>";
                    echo "<div class='col-md-8'>" . htmlspecialchars($row["college_name"]) . "</div>";
                    echo "</div>";
                }
                echo "</div>";
                echo "</div>";
            } else {
                echo "<div class='alert alert-warning text-center'>No results found for the registration number: " . htmlspecialchars($reg_number) . "</div>";
            }
            echo "<div class='back-button'><button class='btn btn-secondary' onclick='history.back()'>Back</button></div>";
            echo "</div>";

            $stmt->close();
        }

        $con->close();
        ?>
    </div>

    <script src="script.js"></script>
</body>
</html>
