CREATE TABLE mytasks (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  description TEXT,
  user_id INT,
  due_date DATE,
  priority INT,
  status VARCHAR(255)
);
