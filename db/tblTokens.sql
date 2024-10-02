CREATE TABLE tblTokens (
    id INT AUTO_INCREMENT PRIMARY KEY,
    token VARCHAR(8),
    username VARCHAR(100),
    expired_at DATETIME,
    created_at DATETIME 
);