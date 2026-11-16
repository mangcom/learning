<?php
require_once __DIR__ . '/config.php';

function csrf_token(): string
{
    if (empty($_SESSION['csrf'])) {
        $_SESSION['csrf'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf'];
}

function csrf_check(): bool
{
    return isset($_POST['csrf'], $_SESSION['csrf'])
        && hash_equals($_SESSION['csrf'], (string) $_POST['csrf']);
}

function is_logged_in(): bool
{
    return !empty($_SESSION['sync_authenticated']);
}

function require_login(): void
{
    if (DEPLOY_TOKEN === '') {
        http_response_code(503);
        exit('DEPLOY_TOKEN ยังไม่ได้ถูกตั้งค่าในฝั่งเซิร์ฟเวอร์ (ดู .env.example) จึงปิดการใช้งานแผงควบคุมนี้ไว้ก่อน');
    }
    if (!is_logged_in()) {
        header('Location: login.php');
        exit;
    }
}
