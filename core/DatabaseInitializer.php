<?php

declare(strict_types=1);

namespace Core;

use PDO;

class DatabaseInitializer
{
    public function __construct(protected PDO $pdo)
    {
    }


    public function initialize(): void
    {
        $this->createMigrationTable();
        $this->runSqlFiles(__DIR__ . '/../database/ddl');
        $this->runSqlFiles(__DIR__ . '/../database/dml');
    }


    protected function createMigrationTable(): void
    {
        $this->pdo->exec(
        /**
         * @lang SQLite
         */
            "
            CREATE TABLE IF NOT EXISTS migrations (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                filename TEXT NOT NULL,
                executed_at DATETIME DEFAULT (DATETIME('now', 'utc')) 
            )
        ",
        );
    }


    protected function runSqlFiles(string $directory): void
    {
        $files = glob($directory . '/*.sql');

        foreach ($files as $file) {
            $filename = basename($file);

            if (!$this->isFileExecuted($filename)) {
                $sql = file_get_contents($file);
                $this->pdo->exec($sql);
                $this->logExecution($filename);
            }
        }
    }


    protected function isFileExecuted(string $filename): bool
    {
        $stmt = $this->pdo->prepare('SELECT COUNT(*) FROM migrations WHERE filename = :filename');
        $stmt->execute(
            ['filename' => $filename]
        );

        return $stmt->fetchColumn() > 0;
    }


    protected function logExecution(string $filename): void
    {
        $stmt = $this->pdo->prepare('INSERT INTO migrations (filename) VALUES (:filename)');
        $stmt->execute(
            ['filename' => $filename]
        );
    }
}
