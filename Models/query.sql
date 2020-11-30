create table if not EXISTS tbl_usertype
(
PK_ID int PRIMARY key AUTO_INCREMENT,
UserTypeName varchar(50) not null
);
INSERT INTO `tbl_usertype`(`UserTypeName`) VALUES ('Admin');
INSERT INTO `tbl_usertype`(`UserTypeName`) VALUES ('Manager');
INSERT INTO `tbl_usertype`(`UserTypeName`) VALUES ('Employee');

create table if not EXISTS tbl_user
(
PK_ID int PRIMARY KEY AUTO_INCREMENT,
FullName varchar(50) not null,
Email varchar(50) unique not null,
ContactNumber varchar(50),
Password varchar(500) not null,
FK_UserType int, 
constraint FK_UserType foreign key(FK_UserType) references tbl_usertype(PK_ID)
);

create table if not EXISTS tbl_customer
(
PK_ID int PRIMARY key AUTO_INCREMENT,
CustomerName varchar(50) not null,
Address varchar(300),
PostalCode varchar(50),
Landmark varchar(50),
City varchar(50),
Province varchar(50),
Phone varchar(50),
Email varchar(50),
Fax varchar(50),
Mobile varchar(50),
Note varchar(200)
);




create table if not EXISTS tbl_productcategory
(
PK_ID int PRIMARY key AUTO_INCREMENT,
CategoryName varchar(50) not null
);

create table if not EXISTS tbl_productcompany
(
PK_ID int PRIMARY key AUTO_INCREMENT,
CompanyName varchar(50) not null
);

create table if not EXISTS tbl_product
(
PK_ID int PRIMARY key AUTO_INCREMENT,
ProductCode varchar(50) not null unique,
ProductName varchar(50) not null,
Price int default 0,
FK_Category int,
constraint FK_Category foreign key(FK_Category) references tbl_productcategory(PK_ID),
FK_Company int,
constraint FK_Company foreign key(FK_Company) references tbl_productcompany(PK_ID),
Image varchar(100),
Features varchar(50)
);

create table if not EXISTS tbl_stock
(
PK_ID int PRIMARY key AUTO_INCREMENT,
FK_Product int,
constraint FK_Product foreign key(FK_Product) references tbl_product(PK_ID),
Quantity int default 0
);

create table if not EXISTS tbl_purchased
(
PK_ID int PRIMARY key AUTO_INCREMENT,
FK_ProductPurchased int,
constraint FK_ProductPurchased foreign key(FK_ProductPurchased) references tbl_product(PK_ID),
Quantity int default 0
);


create table if not EXISTS tbl_invoice
(
PK_ID int PRIMARY key AUTO_INCREMENT,
FK_ProductInvoice int,
constraint FK_ProductInvoice foreign key(FK_ProductInvoice) references tbl_product(PK_ID),
FK_Sales int,
constraint FK_Sales foreign key(FK_Sales) references tbl_sales(PK_ID)
);
create table if not EXISTS tbl_sales
(
PK_ID int PRIMARY key AUTO_INCREMENT,
DateAdded datetime,
CustomerID int,
constraint CustomerID foreign key(CustomerID) references tbl_customer(PK_ID)
);