-- SQL script to create admin user for testing
-- Make sure you have the role table with role_id = 1 for admin

-- Insert admin role if it doesn't exist
INSERT IGNORE INTO role (role_id, role_name, description) 
VALUES (1, 'admin', 'Administrator with full access');

-- Insert admin user (update email and password as needed)
INSERT INTO user (user_name, email, password, phone_number, dob, role_id) 
VALUES ('Admin User', 'admin@example.com', 'admin123', '1234567890', '1990-01-01', 1)
ON DUPLICATE KEY UPDATE 
    user_name = 'Admin User',
    password = 'admin123',
    role_id = 1;

-- Note: In production, passwords should be hashed using password_hash() function
