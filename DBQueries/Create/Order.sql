create table `order`
(
	Id int auto_increment
		primary key,
	PHPSESSID varchar(1500) charset utf8 not null,
	OrderDetailsId int null,
	AddedDate timestamp default CURRENT_TIMESTAMP not null on update CURRENT_TIMESTAMP,
	BookId int null,
	constraint Order__OrderDetails_fk
		foreign key (OrderDetailsId) references orderdetails (Id),
	constraint Order_Book__fk
		foreign key (BookId) references book (Id)
)
;

create index Order_Book__fk
	on `order` (BookId)
;

create index Order__OrderDetails_fk
	on `order` (OrderDetailsId)
;

