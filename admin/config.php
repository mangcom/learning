<?php
// Shared configuration for the GitHub sync admin panel.

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

define('REPO_DIR', dirname(__DIR__));
define('DEPLOY_TOKEN', (string) getenv('DEPLOY_TOKEN'));
define('SYNC_LOG_FILE', __DIR__ . '/sync.log');
define('SYNC_LOCK_FILE', __DIR__ . '/sync.lock');

function sync_log(string $message): void
{
    $line = sprintf('[%s] %s%s', date('Y-m-d H:i:s'), $message, PHP_EOL);
    file_put_contents(SYNC_LOG_FILE, $line, FILE_APPEND | LOCK_EX);
}

function sync_log_tail(int $lines = 30): array
{
    if (!is_file(SYNC_LOG_FILE)) {
        return [];
    }
    $all = file(SYNC_LOG_FILE, FILE_IGNORE_NEW_LINES);
    return array_slice($all, -$lines);
}

/**
 * Run a fixed git subcommand against REPO_DIR without ever touching a shell,
 * so there is no command-injection surface even though this panel is privileged.
 *
 * @param string[] $args e.g. ['fetch', 'origin', 'main', '--quiet']
 * @return array{0:int,1:string,2:string} [exit code, stdout, stderr]
 */
function run_git(array $args): array
{
    $descriptors = [
        0 => ['pipe', 'r'],
        1 => ['pipe', 'w'],
        2 => ['pipe', 'w'],
    ];

    $process = proc_open(array_merge(['git'], $args), $descriptors, $pipes, REPO_DIR);
    if (!is_resource($process)) {
        return [1, '', 'ไม่สามารถเรียกใช้คำสั่ง git ได้'];
    }

    fclose($pipes[0]);
    $stdout = stream_get_contents($pipes[1]);
    $stderr = stream_get_contents($pipes[2]);
    fclose($pipes[1]);
    fclose($pipes[2]);

    $exitCode = proc_close($process);

    return [$exitCode, trim($stdout), trim($stderr)];
}
