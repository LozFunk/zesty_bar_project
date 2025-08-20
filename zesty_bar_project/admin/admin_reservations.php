<?php
session_start();
include '../config/db.php';
require_once 'dashboard.php';

if (!isset($_SESSION['loggedIn'])) exit('<p class="denied">Access denied.</p>');

$reservations = $db->query("SELECT * FROM reservations ORDER BY res_date DESC")->fetchAll();
?>


<div class="content-pos">
    <div class="centered">
        <h2>Reservations</h2>
        <table>
            <tr><th>Name</th><th>Email</th><th>Phone</th><th>Date</th><th>Time</th><th>Guests</th><th>Notes</th></tr>
            <?php foreach ($reservations as $r): ?>
            <tr>
            <td><?= $r['first_name'] . ' ' . $r['last_name'] ?></td>
            <td><?= $r['email'] ?></td>
            <td><?= $r['phone_num'] ?></td>
            <td><?= $r['res_date'] ?></td>
            <td><?= $r['res_time'] ?></td>
            <td><?= $r['num_guests'] ?></td>
            <td><?= $r['notes'] ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>