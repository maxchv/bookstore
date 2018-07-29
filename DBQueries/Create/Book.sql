CREATE TABLE Book
(
    Id int PRIMARY KEY AUTO_INCREMENT,
    Title NVARCHAR(350) NOT NULL,
    Description NVARCHAR(1500),
    Author NVARCHAR(150) NOT NULL,
    AddedDate TIMESTAMP,
    CategoryId int,
    Image NVARCHAR(1500),
    Price int NOT NULL,
    CONSTRAINT Book_Category__fk FOREIGN KEY (CategoryId) REFERENCES category (Id)
);