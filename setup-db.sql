CREATE TABLE purchases (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    date DATE NOT NULL,
    amount VARCHAR(10) NOT NULL,
    category VARCHAR(50) NOT NULL,
    notes VARCHAR(100)
);

CREATE TABLE categories (
    name VARCHAR(50) PRIMARY KEY
);

INSERT INTO purchases VALUES (NULL, "Groceries", "2019-01-01", 100, "Food/Drink", "Weekly Shop");
INSERT INTO purchases VALUES (NULL, "Petrol", "2019-02-01", 300, "Petrol", "Gas Is expensive");
INSERT INTO purchases VALUES (NULL, "Movies", "2019-03-01", 34, "Food/Drink", "Movie Night");
INSERT INTO purchases VALUES (NULL, "Sunblock", "2019-04-01", 5, "Personal Items", "");
INSERT INTO purchases VALUES (NULL, "Chocolate", "2019-01-01", 10, "Food/Drink", "");
INSERT INTO purchases VALUES (NULL, "Coffee", "2020-01-01", 5, "Food/Drink", "");
INSERT INTO purchases VALUES (NULL, "Lunch", "2020-01-01", 34, "Food/Drink", "");
INSERT INTO purchases VALUES (NULL, "Dinner", "2007-01-01", 60, "Food/Drink", "");
INSERT INTO purchases VALUES (NULL, "Groceries", "2006-01-01", 150, "Food/Drink", "");
INSERT INTO purchases VALUES (NULL, "Groceries", "2005-01-01", 60, "Food/Drink", "");

INSERT INTO categories VALUES ("Food/Drink");
INSERT INTO categories VALUES ("Bills to Pay");
INSERT INTO categories VALUES ("Petrol");
INSERT INTO categories VALUES ("Personal Items");