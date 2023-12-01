<?php
function uploadPDFFiles($uploadDir, $maxFileSize = 2 * 1024 * 1024) {
    $uploadedFiles = [];

    for ($i = 1; $i <= 4; $i++) {
        $fieldName = "pdfFile" . $i;
        $targetFile = $uploadDir . basename($_FILES[$fieldName]["name"]);
        $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        $fileSize = $_FILES[$fieldName]["size"];

        if ($fileType === "pdf" && $fileSize <= $maxFileSize) {
            if (move_uploaded_file($_FILES[$fieldName]["tmp_name"], $targetFile)) {
                $uploadedFiles[] = $targetFile;
            } else {
                echo "Error uploading file: " . $_FILES[$fieldName]["error"];
            }
        } else {
            echo "Invalid file type or size for " . $fieldName;
        }
    }


    return $uploadedFiles;
}
?>
