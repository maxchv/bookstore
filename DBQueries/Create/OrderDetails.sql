CREATE TABLE OrderDetails
(
    FirstName NVARCHAR(300),
    LastName NVARCHAR(300),
    Id int PRIMARY KEY AUTO_INCREMENT,
    Email NVARCHAR(500) NOT NULL,
    Country nvarchar(300) NOT NULL,
    PostCode int,
    Address NVARCHAR(500),
    City NVARCHAR(300),
    PhoneNumber int
);