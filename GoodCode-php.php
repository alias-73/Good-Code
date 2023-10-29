


<?php
// #Config, #ConnectDB : {کد آسان برای اتصال به دیتابیس},{Easy code to connect to database}

function selectConfig($SoftwareId) {
    
    if ($SoftwareId === 'AppKey') {
        return [
           'serverName' => 'IpAddress',
			'database' => 'DatabaseName',
			'username' => 'UserName',
			'password' => 'Password',
			'encrypt' => false,
			'characterSet' => 'UTF-8',
        ];
    } 
}
?>




<?php
// #UploadFile : {بارگزاری فایل در سرور},{File uploading on server}
// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if 'files', 'name', and 'SoftwareId' are present in the POST data
    if (isset($_POST['files'], $_POST['name'], $_POST['SoftwareId'])) {
        $FilesUp = $_POST['files']; //file for upload
        $Name = $_POST['name']; // name for file
        $SoftwareId = $_POST['SoftwareId']; // key
        $Code = $_POST['code']; // key
        $folder_1 = "Address on Server like C:\\example\\$SoftwareId";

        // Ensure the directory exists, create it if not
        if (!is_dir($folder_1)) {
            mkdir($folder_1, 0777, true);
        }

        // Create the full path to the target file
        $targetFilePath = "$folder_1/$Name";

        // Decode the base64 data
        $realImage = base64_decode($FilesUp);

        // Check if decoding was successful
        if ($realImage !== false) {
            // Write the image data to the target file
            if (file_put_contents($targetFilePath, $realImage)) {
                // Include the other file php to use function on file
                require_once('call other file.php');

                // Example usage:
                $code = $Code;
                $picUrl = "http://YourIp/YourFolder/$SoftwareId/" . $Name;
                $softwareId = $SoftwareId; // Replace with the actual SoftwareId

               // write any code if needed
            } else {
                echo 'Failed to write the image data to the file';
            }
        } else {
            echo 'Failed to decode base64 data';
        }
    } else {
        echo 'Missing POST data: "files", "name", or "SoftwareId"';
    }
} else {
    echo 'Unsupported request method';
}
?>

