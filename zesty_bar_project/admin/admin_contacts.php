<?php
session_start();
include '../config/db.php';
require_once 'dashboard.php';

if (!isset($_SESSION['loggedIn'])) exit('<p class="denied">Access denied.</p>');

$messages = $db->query("SELECT * FROM guest_feedback ORDER BY id DESC")->fetchAll();
?>

<div class="content-pos">
    <div class="centered">
        <h2>Contact Messages</h2>

        <?php foreach ($messages as $msg): ?>
        <div class="card">
        <div class="card-header">
        <span><strong>Name: </strong> <?= $msg['name'] ?></span>
        <span><strong>Date: </strong> <?= $msg['created_at'] ?></span>
        </div>

        <div class="card-body">
        <span><strong>Message: </strong><br></span>
        <span><?= $msg['message'] ?></span>
        </div>

        <div class="card-footer">
            <span><strong>Email: </strong><?= $msg['email'] ?></span>
            <?php if($msg['phone_num'] !== 0) :?>
                <span class="end"><strong>Phone Number: </strong><?= $msg['phone_num'] ?></span>
            <?php endif;?>

        </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>