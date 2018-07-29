CREATE TABLE Account
(
    Id int PRIMARY KEY AUTO_INCREMENT,
    FirstName NVARCHAR(150) NOT NULL,
    LastName NVARCHAR(150) NOT NULL,
    Email NVARCHAR(300) NOT NULL,
    Password NVARCHAR(300) NOT NULL,
    IsDeleted BOOL DEFAULT 0,
    IsAdmin BOOL
);
CREATE UNIQUE INDEX Account_Email_uindex ON Account (Email);