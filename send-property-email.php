<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Personal Information
    $fullname = strip_tags(trim($_POST["fullname"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $phone = strip_tags(trim($_POST["phone"]));
    $occupation = strip_tags(trim($_POST["occupation"]));

    // Property Details
    $location = strip_tags(trim($_POST["location"]));
    $builtup_area = strip_tags(trim($_POST["builtup_area"]));
    $builtup_unit = strip_tags(trim($_POST["builtup_unit"])); // Assuming you add name="builtup_unit" to the select
    $transaction_type = strip_tags(trim($_POST["transaction_type"]));
    $office_space = strip_tags(trim($_POST["office_space"]));
    $office_unit = strip_tags(trim($_POST["office_unit"])); // Assuming you add name="office_unit" to the select
    $open_space = strip_tags(trim($_POST["open_space"]));
    $open_unit = strip_tags(trim($_POST["open_unit"])); // Assuming you add name="open_unit" to the select
    $crane = strip_tags(trim($_POST["crane"]));
    $crane_unit = strip_tags(trim($_POST["crane_unit"])); // Assuming you add name="crane_unit" to the select
    $shed_height = strip_tags(trim($_POST["shed_height"]));
    $shed_unit = strip_tags(trim($_POST["shed_unit"])); // Assuming you add name="shed_unit" to the select

    // Email recipient
    $to = "wer4u.sme@gmail.com"; // Replace with the actual recipient email

    // Email subject
    $subject = "New Property Listing from " . $fullname;

    // Email content
    $email_content = "New Property Listing Submission:\n\n";
    $email_content .= "Personal Information:\n";
    $email_content .= "Full Name: $fullname\n";
    $email_content .= "Email: $email\n";
    $email_content .= "Phone: $phone\n";
    $email_content .= "Business: $occupation\n\n";

    $email_content .= "Property Details:\n";
    $email_content .= "Location: $location\n";
    $email_content .= "Builtup Area: $builtup_area $builtup_unit\n";
    $email_content .= "Transaction Type: $transaction_type\n";
    $email_content .= "Office Space: $office_space $office_unit\n";
    $email_content .= "Open Space: $open_space $open_unit\n";
    $email_content .= "Crane Provision: $crane $crane_unit\n";
    $email_content .= "Shed Height: $shed_height $shed_unit\n\n";

    $email_content .= "Note: Images were uploaded but not attached to this email. Please check the server for uploaded files if a file upload mechanism is implemented.\n";

    // Email headers
    $email_headers = "From: " . $fullname . " <" . $email . ">";

    // Send the email
    if (mail($to, $subject, $email_content, $email_headers)) {
        // Success
        header("Location: listing_data.html?success=true");
    } else {
        // Failure
        header("Location: listing_data.html?success=false");
    }

} else {
    // Not a POST request
    http_response_code(403);
    echo "There was a problem with your submission, please try again.";
}
?>