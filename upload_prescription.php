<?php
// upload_prescription.php
include 'includes/header.php'; // Includes session_start()

// Basic file upload handling (very rudimentary, needs much more robust validation and security)
$upload_message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['prescription_file'])) {
    $target_dir = "uploads/"; // Make sure this directory exists and is writable
    $target_file = $target_dir . basename($_FILES["prescription_file"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($target_file)) {
        $upload_message = "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size (e.g., 5MB limit)
    if ($_FILES["prescription_file"]["size"] > 5000000) {
        $upload_message = "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "pdf" ) { // Added PDF for prescriptions
        $upload_message = "Sorry, only JPG, JPEG, PNG & PDF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $upload_message = "Sorry, your file was not uploaded. " . $upload_message;
    } else {
        if (move_uploaded_file($_FILES["prescription_file"]["tmp_name"], $target_file)) {
            $upload_message = "The file ". htmlspecialchars( basename( $_FILES["prescription_file"]["name"])). " has been uploaded.";
            // In a real app, you'd save the path to a database associated with the user
        } else {
            $upload_message = "Sorry, there was an error uploading your file.";
        }
    }
}
?>

<div class="upload-prescription-page">
    <div class="container">
        <h2>Upload Your Prescription</h2>
        <p>Please upload a clear image or PDF of your prescription.</p>

        <?php if (!empty($upload_message)): ?>
            <p class="message"><?php echo $upload_message; ?></p>
        <?php endif; ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="prescription_file">Select Prescription File:</label>
                <input type="file" name="prescription_file" id="prescription_file" accept=".jpg,.jpeg,.png,.pdf">
            </div>
            <div class="form-group">
                <input type="submit" value="Upload Prescription">
            </div>
        </form>

        <div class="upload-guidelines">
            <h3>Guidelines for Uploading:</h3>
            <ul>
                <li>Ensure the prescription is clearly visible and readable.</li>
                <li>Include patient name, doctor's signature, and date.</li>
                <li>Accepted formats: JPG, JPEG, PNG, PDF.</li>
                <li>Maximum file size: 5MB.</li>
            </ul>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>