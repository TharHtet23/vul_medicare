<?php
include 'db.php';

$patient_id = isset($_GET['id']) ? $_GET['id'] : '';

if ($patient_id) {
    // Vulnerable SQL Query (Not using Prepared Statements)
    $sql = "SELECT * FROM patients WHERE id = " . $patient_id;
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $patient_info = "Name: " . $row["name"] . "<br>Age: " . $row["age"] . "<br>Diagnosis: " . $row["diagnosis"] . "<br>Contact Info: " . $row["contact_info"];
    } else {
        $patient_info = "No patient found with ID: $patient_id";
    }
} else {
    $patient_info = "Enter a patient ID to view details.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Secure Healthcare Portal</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Secure Healthcare Portal</h1>
        <form method="get" action="">
            <label for="id">Patient ID:</label>
            <input type="text" id="id" name="id" required>
            <input type="submit" value="View Patient">
        </form>
        <div class="patient-info">
            <h2>Patient Information</h2>
            <p><?php echo $patient_info; ?></p>
        </div>
    </div>
</body>
</html>

<?php
$conn->close();
?>
