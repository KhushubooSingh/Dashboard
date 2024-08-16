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
            max-width: 800px;
            margin: 20px auto;
        }
        .card-header {
            background-color: #3bc0c3;
            color: white;
            text-align: center;
        }
        .card-body {
            background-color: #f8f9fa;
        }
        .details-row {
            border-bottom: 1px solid #dee2e6;
            padding: 10px 0;
        }
        .details-row:last-child {
            border-bottom: none;
        }
        .back-button {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
    </style>
</head>
<body style="background: linear-gradient(90deg, rgba(214,213,223,1) 0%, rgba(219,210,210,1) 1%, rgba(138,180,204,1) 100%);">
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
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='card mb-4'>";
                    echo "<div class='card-header' style='background-color: #1a2942; color: #ffffff;'><h4 class='mb-0'>Student Details</h4></div>";
                    echo "<div class='card-body' style='background: radial-gradient(circle, rgba(247,247,247,1) 0%, rgba(124,150,172,1) 34%);'>";
                    echo "<div class='details-row'><strong>Certificate Title:</strong> " . htmlspecialchars($row["certificate_title"]) . "</div>";
                    echo "<div class='details-row'><strong>Registration Number:</strong> " . htmlspecialchars($row["registration_no"]) . "</div>";
                    echo "<div class='details-row'><strong>Name:</strong> " . htmlspecialchars($row["name"]) . "</div>";
                    echo "<div class='details-row'><strong>Course:</strong> " . htmlspecialchars($row["course"]) . "</div>";
                    echo "<div class='details-row'><strong>Email:</strong> " . htmlspecialchars($row["email"]) . "</div>";
                    echo "<div class='details-row'><strong>Contact No.:</strong> " . htmlspecialchars($row["contact_no"]) . "</div>";
                    echo "<div class='details-row'><strong>Course Started From:</strong> " . htmlspecialchars($row["course_duration_from"]) . "</div>";
                    echo "<div class='details-row'><strong>Course Ended to:</strong> " . htmlspecialchars($row["course_duration_to"]) . "</div>";
                    echo "<div class='details-row'><strong>College Name:</strong> " . htmlspecialchars($row["college_name"]) . "</div>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "<div class='alert text-center' style='background: radial-gradient(circle, rgba(247,247,247,1) 0%, rgba(124,150,172,1) 34%);''>No results found for the entered registration no: " . htmlspecialchars($reg_number) . "</div>";
            }
            echo "<div class='back-button' id='backButton' ><button class='btn btn-secondary' style='background-color: #1a2942; color: #ffffff;' onclick='history.back()'>Back</button></div>";
            echo "</div>";

            $stmt->close();
        }

        $con->close();
        ?>
    </div>

    <script src="script.js"></script>
</body>
</html>
