CREATE TABLE image (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(250) NOT NULL,
    path VARCHAR(250) NOT NULL, 
    description TEXT NOT NULL,
    posted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

DELIMITER //
CREATE PROCEDURE add_image(IN arg_title VARCHAR(250), IN arg_path VARCHAR(250), IN arg_description TEXT) 
BEGIN
    INSERT INTO image (title, path, description) 
    VALUES
    (arg_title, arg_path, arg_description);
END//
DELIMITER ;


DELIMITER //
CREATE PROCEDURE get_images
BEGIN
    SELECT * FROM image
END//
DELIMITER ;


DELIMITER //
CREATE PROCEDURE search_image(IN search_string VARCHAR(250))
BEGIN
    SELECT * FROM image WHERE title = search_string
END//
DELIMITER ;