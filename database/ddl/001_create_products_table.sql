CREATE TABLE IF NOT EXISTS products
(
    id          INTEGER PRIMARY KEY AUTOINCREMENT,
    name        TEXT NOT NULL,
    description TEXT,
    price       REAL NOT NULL,
    created_at  DATETIME DEFAULT (DATETIME('now', 'utc')),
    updated_at  DATETIME DEFAULT (DATETIME('now', 'utc'))
);
