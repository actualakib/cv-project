<?php

header('Content-Type: application/json');

$data = json_decode(file_get_contents('php:

if (!$data || empty($data['feedback'])) {
    echo json_encode(['status' => 'error', 'message' => 'No feedback received.']);
    exit;
}


$timestamp    = date('Y-m-d_H-i-s') . '_' . substr(uniqid(), -5);
$filename     = "feedback_{$timestamp}.txt";
$feedbackText = htmlspecialchars(strip_tags(trim($data['feedback'])));


$content  = "================================================\n";
$content .= "  AutoCV Builder — User Feedback\n";
$content .= "  Received: " . date('Y-m-d H:i:s') . "\n";
$content .= "================================================\n\n";
$content .= $feedbackText . "\n";


$dir = 'feedback_submissions/';
if (!is_dir($dir)) mkdir($dir, 0755, true);

if (file_put_contents($dir . $filename, $content)) {
    echo json_encode(['status' => 'success', 'message' => 'Feedback saved.', 'file' => $filename]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Could not write file. Check folder permissions.']);
}
?>