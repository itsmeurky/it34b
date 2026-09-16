<?php

require '../../config/config.php';
require '../../config/functions.php';


requireRole('admin');

// logActivity($pdo, $_SESSION['user_id'], $_SESSION['user_email'], 'view_activity_logs', 'success');

// Activity Logs Query Query #3

$stmt = $pdo->query("
    SELECT * FROM activity_logs ORDER BY activity_log_created_at DESC
");


$activities = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
body {
    font-family: Arial, sans-serif;
    background: #fafdfa;
    padding: 30px;
}

h1 {
    color: #b0ed8c;
}

table {
    width: 100%;
    border-collapse: collapse;
    background: white;
    box-shadow: 0 4px 10px #b8b0b0;
}

th {
    background: #425f32;
    color: white;
    padding: 12px;
}

td {
    padding: 10px;
    border-bottom: 1px solid #97dfae;
    text-align: center;
}

tr:hover {
    background: #eaf3ff;
}

a {
    display: inline-block;
    margin-bottom: 20px;
    padding: 8px 15px;
    background: #425f32;
    color: white;
    text-decoration: none;
    border-radius: 5px;
}

a:hover {
    background: #425f32; 
    .table tbody tr.hover{
        background-color: #090d06;
    }

}
</style>
</head>

<body>
    <h1>Welcome, Admin!</h1>
    <a href="../../auth/signout.php">Sign Out</a>
    <table border="1">
        <thead>
            <tr>

                <th>Record ID</th>
                <th>User ID</th>
                <th>User Email</th>
                <th>Action</th>
                <th>Status</th>
                <th>IP Address</th>
                <th>User Agent</th>
                <th>Date & Time</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($activities as $activity): ?>
                <tr>
                    <td><?= htmlspecialchars($activity['activity_log_id']); ?></td>
                    <td><?= htmlspecialchars($activity['user_id']); ?></td>
                    <td><?= htmlspecialchars($activity['user_email']); ?></td>
                    <td><?= htmlspecialchars($activity['activity_log_action']); ?></td>
                    <td><?= htmlspecialchars($activity['activity_log_status']); ?></td>
                    <td><?= htmlspecialchars($activity['activity_log_ip_address']); ?></td>
                    <td><?= htmlspecialchars($activity['activity_log_user_agent']); ?></td>
                    <td><?= htmlspecialchars($activity['activity_log_created_at']); ?></td>
                </tr>
            <?php endforeach; ?>

    </table>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/3.0.4/js/dataTables.min.js"></script>
<script src="https://cdn.datatables.net/3.0.4/js/dataTables.bootstrap5.min.js"></script>
</html>