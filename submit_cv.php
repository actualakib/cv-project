<?php

header('Content-Type: application/json');

$data = json_decode(file_get_contents('php:

if (!$data) {
    echo json_encode(['status' => 'error', 'message' => 'No data received.']);
    exit;
}


function clean($val) {
    return htmlspecialchars(strip_tags(trim($val ?? '')));
}


$timestamp = date('Y-m-d_H-i-s') . '_' . substr(uniqid(), -5);
$safeName  = preg_replace('/[^a-zA-Z0-9]/', '', $data['first_name'] ?? 'User');
$filename  = "cv_{$safeName}_{$timestamp}.txt";


$skills = is_array($data['skills'] ?? null)
    ? implode(', ', array_map('strip_tags', $data['skills']))
    : 'N/A';

$refs = is_array($data['refs'] ?? null)
    ? implode("\n  - ", array_map('strip_tags', $data['refs']))
    : 'N/A';


$content  = "================================================\n";
$content .= "  AutoCV Builder — Submission\n";
$content .= "  Saved: " . date('Y-m-d H:i:s') . "\n";
$content .= "================================================\n\n";
$content .= "Name      : " . clean($data['first_name']) . " " . clean($data['last_name']) . "\n";
$content .= "Email     : " . clean($data['email'])      . "\n";
$content .= "Phone     : " . clean($data['phone'])      . "\n";
$content .= "Job Title : " . clean($data['job_title'])  . "\n";
$content .= "Address   : " . clean($data['address'])    . "\n";
$content .= "Social    : " . clean($data['social'] ?? 'N/A') . "\n\n";
$content .= "EXPERIENCE\n----------\n" . clean($data['exp']   ?? 'N/A') . "\n\n";
$content .= "EDUCATION\n---------\n"  . clean($data['edu']   ?? 'N/A') . "\n\n";
$content .= "SKILLS\n------\n"        . $skills . "\n\n";
$content .= "EXTRA\n-----\n"          . clean($data['extra'] ?? 'N/A') . "\n\n";
$content .= "REFERENCES\n----------\n  - " . $refs . "\n";


$dir = 'cv_submissions/';
if (!is_dir($dir)) mkdir($dir, 0755, true);

if (file_put_contents($dir . $filename, $content)) {
    echo json_encode(['status' => 'success', 'message' => 'Saved!', 'file' => $filename]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Could not write file. Check folder permissions.']);
}
?>