<?php
// submit_feedback.php
// Receives Feedback and saves it to a .txt file
header('Content-Type: application/json');

$json_data = file_get_contents('php://input');
$data = json_decode($json_data, true);

if (!$data || empty($data['feedback'])) {
    echo json_encode(['status' => 'error', 'message' => 'No feedback received']);
    exit;
}

$date = date('Y-m-d H:i:s');
$feedbackText = htmlspecialchars(strip_tags($data['feedback']));

$logEntry = "[$date] Feedback Received: \"$feedbackText\"\n";

$file = 'feedback_data.txt';

if(file_put_contents($file, $logEntry, FILE_APPEND | LOCK_EX)) {
    echo json_encode(['status' => 'success', 'message' => 'Feedback saved']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Failed to write to file.']);
}
?>