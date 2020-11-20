INSERT INTO Guest(UserId, Name, Email, Phone) VALUES (0, 'Harman Brar', 'hb@g.com', 7780010000);
INSERT INTO Guest(UserId, Name, Email, Phone) VALUES (1, 'Sahil Bansal', 'sb@g.com', 7781012949);
INSERT INTO Guest(UserId, Name, Email, Phone) VALUES (2, 'Muaz Abrar', 'ma@g.com', 7780010001);
INSERT INTO Guest(UserId, Name, Email, Phone) VALUES (3, 'Michael Jackson', 'mj@g.com', 7780010002);
INSERT INTO Guest(UserId, Name, Email, Phone) VALUES (4, 'Larry', 'larry@dairy.com', 7780010003);

INSERT INTO Hotel(HotelId, Name, Address, Phone) VALUES (0, 'Marriot', '1234 A St.', 7781110000);
INSERT INTO Hotel(HotelId, Name, Address, Phone) VALUES (1, 'Best Western', '1234 b St.', 7781110001);
INSERT INTO Hotel(HotelId, Name, Address, Phone) VALUES (2, 'Days Inn', '1234 C St.', 7781110002);
INSERT INTO Hotel(HotelId, Name, Address, Phone) VALUES (3, 'Hilton', '1234 D St.', 7781110003);
INSERT INTO Hotel(HotelId, Name, Address, Phone) VALUES (4, 'Ramada', '1234 E St.', 7781110004);

INSERT INTO Suite(HotelId, SuiteNo, IsInUse, BedCount, IsClean) VALUES (1, 1, 0, 2, 1);
INSERT INTO Suite(HotelId, SuiteNo, IsInUse, BedCount, IsClean) VALUES (1, 2, 0, 2, 1);
INSERT INTO Suite(HotelId, SuiteNo, IsInUse, BedCount, IsClean) VALUES (4, 1, 0, 2, 1);
INSERT INTO Suite(HotelId, SuiteNo, IsInUse, BedCount, IsClean) VALUES (2, 5, 0, 2, 1);
INSERT INTO Suite(HotelId, SuiteNo, IsInUse, BedCount, IsClean) VALUES (3, 91, 0, 2, 1);
INSERT INTO Suite(HotelId, SuiteNo, IsInUse, BedCount, IsClean) VALUES (1, 99, 0, 1, 1);
INSERT INTO Suite(HotelId, SuiteNo, IsInUse, BedCount, IsClean) VALUES (2, 1, 0, 3, 1);
INSERT INTO Suite(HotelId, SuiteNo, IsInUse, BedCount, IsClean) VALUES (1, 98, 1, 2, 0);
INSERT INTO Suite(HotelId, SuiteNo, IsInUse, BedCount, IsClean) VALUES (3, 1, 1, 2, 0);
INSERT INTO Suite(HotelId, SuiteNo, IsInUse, BedCount, IsClean) VALUES (1, 97, 1, 1, 0);
INSERT INTO Suite(HotelId, SuiteNo, IsInUse, BedCount, IsClean) VALUES (4, 2, 1, 1, 0);
INSERT INTO Suite(HotelId, SuiteNo, IsInUse, BedCount, IsClean) VALUES (2, 2, 1, 2, 0);
INSERT INTO Suite(HotelId, SuiteNo, IsInUse, BedCount, IsClean) VALUES (2, 3, 1, 1, 0);
INSERT INTO Suite(HotelId, SuiteNo, IsInUse, BedCount, IsClean) VALUES (2, 4, 1, 1, 0);
INSERT INTO Suite(HotelId, SuiteNo, IsInUse, BedCount, IsClean) VALUES (4, 67, 0, 2, 1);

INSERT INTO Books(UserId, HotelId, SuiteNo, BookingDate, StayLength, Price) VALUES (0, 1, 1, TO_DATE('2020-10-18', 'YYYY-MM-DD'), 3, 110);
INSERT INTO Books(UserId, HotelId, SuiteNo, BookingDate, StayLength, Price) VALUES (1, 1, 2, TO_DATE('2020-10-19', 'YYYY-MM-DD'), 1, 130);
INSERT INTO Books(UserId, HotelId, SuiteNo, BookingDate, StayLength, Price) VALUES (2, 4, 1, TO_DATE('2020-10-20', 'YYYY-MM-DD'), 2, 120);
INSERT INTO Books(UserId, HotelId, SuiteNo, BookingDate, StayLength, Price) VALUES (3, 2, 5, TO_DATE('2020-10-21', 'YYYY-MM-DD'), 3, 110);
INSERT INTO Books(UserId, HotelId, SuiteNo, BookingDate, StayLength, Price) VALUES (4, 3, 91, TO_DATE('2020-11-10', 'YYYY-MM-DD'), 7, 600);

INSERT INTO Standard(HotelId, SuiteNo, HasSofaBed) VALUES (1, 1, 0);
INSERT INTO Standard(HotelId, SuiteNo, HasSofaBed) VALUES (1, 2, 0);
INSERT INTO Standard(HotelId, SuiteNo, HasSofaBed) VALUES (4, 1, 0);
INSERT INTO Standard(HotelId, SuiteNo, HasSofaBed) VALUES (2, 5, 1);
INSERT INTO Standard(HotelId, SuiteNo, HasSofaBed) VALUES (3, 91, 1);

INSERT INTO Deluxe(HotelId, SuiteNo, NoOfRooms) VALUES (1, 99, 1);
INSERT INTO Deluxe(HotelId, SuiteNo, NoOfRooms) VALUES (2, 1, 1);
INSERT INTO Deluxe(HotelId, SuiteNo, NoOfRooms) VALUES (1, 98, 1);
INSERT INTO Deluxe(HotelId, SuiteNo, NoOfRooms) VALUES (3, 1, 1);
INSERT INTO Deluxe(HotelId, SuiteNo, NoOfRooms) VALUES (1, 97, 2);

INSERT INTO Business(HotelId, SuiteNo, HasLivingRoom) VALUES (4, 2, 0);
INSERT INTO Business(HotelId, SuiteNo, HasLivingRoom) VALUES (2, 2, 0);
INSERT INTO Business(HotelId, SuiteNo, HasLivingRoom) VALUES (2, 3, 0);
INSERT INTO Business(HotelId, SuiteNo, HasLivingRoom) VALUES (2, 4, 0);
INSERT INTO Business(HotelId, SuiteNo, HasLivingRoom) VALUES (4, 67, 1);

INSERT INTO PayrollGroup(PGID, Name) VALUES (0, 'John Doe');
INSERT INTO PayrollGroup(PGID, Name) VALUES (1, 'Jinny Dee');
INSERT INTO PayrollGroup(PGID, Name) VALUES (2, 'Johnny Appleseed');
INSERT INTO PayrollGroup(PGID, Name) VALUES (3, 'Jinnina Regina');
INSERT INTO PayrollGroup(PGID, Name) VALUES (4, 'John Doe');
INSERT INTO PayrollGroup(PGID, Name) VALUES (5, 'The Boondocks');
INSERT INTO PayrollGroup(PGID, Name) VALUES (6, 'Queen');
INSERT INTO PayrollGroup(PGID, Name) VALUES (7, 'Coldplay');
INSERT INTO PayrollGroup(PGID, Name) VALUES (8, 'Travis Scott');
INSERT INTO PayrollGroup(PGID, Name) VALUES (9, 'The Beatles');
INSERT INTO PayrollGroup(PGID, Name) VALUES (10, 'Johnny Appleseed');
INSERT INTO PayrollGroup(PGID, Name) VALUES (11, 'Jinny Dee');
INSERT INTO PayrollGroup(PGID, Name) VALUES (12, 'John Doe');
INSERT INTO PayrollGroup(PGID, Name) VALUES (13, 'Jinnina Regina');
INSERT INTO PayrollGroup(PGID, Name) VALUES (14, 'Johnny Appleseed');

INSERT INTO Hires(HotelId, PGID) VALUES (0,0);
INSERT INTO Hires(HotelId, PGID) VALUES (1,0);
INSERT INTO Hires(HotelId, PGID) VALUES (2,0);
INSERT INTO Hires(HotelId, PGID) VALUES (3,0);
INSERT INTO Hires(HotelId, PGID) VALUES (4,0);

INSERT INTO PerformanceGroup(PGID, ContractStartDate, ContractEndDate, ChargeRate) VALUES (5, TO_DATE('2017-09-01', 'YYYY-MM-DD'), TO_DATE('2018-09-05',
'YYYY-MM-DD'), 1200);
INSERT INTO PerformanceGroup(PGID, ContractStartDate, ContractEndDate, ChargeRate) VALUES (6, TO_DATE('2018-12-23', 'YYYY-MM-DD'), TO_DATE('2019-12-26',
'YYYY-MM-DD'), 3000);
INSERT INTO PerformanceGroup(PGID, ContractStartDate, ContractEndDate, ChargeRate) VALUES (7, TO_DATE('2019-07-07', 'YYYY-MM-DD'), TO_DATE('2019-07-09',
'YYYY-MM-DD'), 4500);
INSERT INTO PerformanceGroup(PGID, ContractStartDate, ContractEndDate, ChargeRate) VALUES (8, TO_DATE('2020-04-22', 'YYYY-MM-DD'), TO_DATE('2020-04-23',
'YYYY-MM-DD'), 8989);
INSERT INTO PerformanceGroup(PGID, ContractStartDate, ContractEndDate, ChargeRate) VALUES (9, TO_DATE('2020-10-25', 'YYYY-MM-DD'), TO_DATE('2020-10-23',
'YYYY-MM-DD'), 2200);

INSERT INTO Performance(PID, PGID, PerformanceDate, Attendance) VALUES (0, 5, TO_DATE('2017-09-01', 'YYYY-MM-DD'), 28);
INSERT INTO Performance(PID, PGID, PerformanceDate, Attendance) VALUES (1, 6, TO_DATE('2018-12-23', 'YYYY-MM-DD'), 99);
INSERT INTO Performance(PID, PGID, PerformanceDate, Attendance) VALUES (2, 7, TO_DATE('2019-07-07', 'YYYY-MM-DD'), 300);
INSERT INTO Performance(PID, PGID, PerformanceDate, Attendance) VALUES (3, 8, TO_DATE('2020-04-22', 'YYYY-MM-DD'), 350);
INSERT INTO Performance(PID, PGID, PerformanceDate, Attendance) VALUES (4, 9, TO_DATE('2020-04-23', 'YYYY-MM-DD'), 600);

INSERT INTO Watches(UserId, PID) VALUES (0, 0);
INSERT INTO Watches(UserId, PID) VALUES (1, 1);
INSERT INTO Watches(UserId, PID) VALUES (2, 2);
INSERT INTO Watches(UserId, PID) VALUES (3, 3);
INSERT INTO Watches(UserId, PID) VALUES (2, 4);

INSERT INTO Employee(PGID, StartDate, Salary, JobDescription, isCurrentlyEmployed, EndDate) VALUES (1, TO_DATE('2019-09-05', 'YYYY-MM-DD'), 3000,
'Cook', 0, TO_DATE('2020-09-05', 'YYYY-MM-DD'));
INSERT INTO Employee(PGID, StartDate, Salary, JobDescription, isCurrentlyEmployed, EndDate) VALUES (2, TO_DATE('2019-08-26', 'YYYY-MM-DD'), 4000,
'Janitor', 1, TO_DATE('2021-09-05', 'YYYY-MM-DD'));
INSERT INTO Employee(PGID, StartDate, Salary, JobDescription, isCurrentlyEmployed, EndDate) VALUES (3, TO_DATE('2019-10-30', 'YYYY-MM-DD'), 3300,
'Plumber', 1, TO_DATE('2021-09-05', 'YYYY-MM-DD'));
INSERT INTO Employee(PGID, StartDate, Salary, JobDescription, isCurrentlyEmployed, EndDate) VALUES (4, TO_DATE('2019-01-06', 'YYYY-MM-DD'), 3500,
'Receptionist', 1, TO_DATE('2021-09-05', 'YYYY-MM-DD'));
INSERT INTO Employee(PGID, StartDate, Salary, JobDescription, isCurrentlyEmployed, EndDate) VALUES (5, TO_DATE('2019-04-05', 'YYYY-MM-DD'), 3200,
'HouseKeeper', 1, TO_DATE('2021-09-05', 'YYYY-MM-DD'));

INSERT INTO FacilityEmployee(PGID, StartDate, Salary) VALUES (10, TO_DATE('2019-09-05', 'YYYY-MM-DD'), 3000);
INSERT INTO FacilityEmployee(PGID, StartDate, Salary) VALUES (11, TO_DATE('2019-08-26', 'YYYY-MM-DD'), 4000);
INSERT INTO FacilityEmployee(PGID, StartDate, Salary) VALUES (12, TO_DATE('2019-10-30', 'YYYY-MM-DD'), 3300);
INSERT INTO FacilityEmployee(PGID, StartDate, Salary) VALUES (13, TO_DATE('2019-01-06', 'YYYY-MM-DD'), 3500);
INSERT INTO FacilityEmployee(PGID, StartDate, Salary) VALUES (14, TO_DATE('2019-04-05', 'YYYY-MM-DD'), 3200);

INSERT INTO OperatorGroup(GroupId, MemberCount) VALUES (1, 10);
INSERT INTO OperatorGroup(GroupId, MemberCount) VALUES (2, 7);
INSERT INTO OperatorGroup(GroupId, MemberCount) VALUES (3, 5);
INSERT INTO OperatorGroup(GroupId, MemberCount) VALUES (4, 3);
INSERT INTO OperatorGroup(GroupId, MemberCount) VALUES (5, 12);

INSERT INTO Assigns(GroupId, PGID, AssignmentDate) VALUES (1, 3, TO_DATE('2019-09-05', 'YYYY-MM-DD'));
INSERT INTO Assigns(GroupId, PGID, AssignmentDate) VALUES (2, 6, TO_DATE('2019-08-26', 'YYYY-MM-DD'));
INSERT INTO Assigns(GroupId, PGID, AssignmentDate) VALUES (3, 12, TO_DATE('2019-10-30', 'YYYY-MM-DD'));
INSERT INTO Assigns(GroupId, PGID, AssignmentDate) VALUES (4, 4, TO_DATE('2019-01-06', 'YYYY-MM-DD'));
INSERT INTO Assigns(GroupId, PGID, AssignmentDate) VALUES (5, 8, TO_DATE('2019-04-05', 'YYYY-MM-DD'));

INSERT INTO Restaurant(HotelId, RestaurantName, GroupId, MaxCapacity) VALUES (0, 'McDonalds', 3, 30);
INSERT INTO Restaurant(HotelId, RestaurantName, GroupId, MaxCapacity) VALUES (1, 'KFC', 5, 24);
INSERT INTO Restaurant(HotelId, RestaurantName, GroupId, MaxCapacity) VALUES (2, 'Dominoz', 4, 5);
INSERT INTO Restaurant(HotelId, RestaurantName, GroupId, MaxCapacity) VALUES (3, 'A and W', 2, 20);
INSERT INTO Restaurant(HotelId, RestaurantName, GroupId, MaxCapacity) VALUES (4, 'Subway', 1, 15);

INSERT INTO EatsAt(UserId, HotelId, RestaurantName, MenuItem) VALUES (0, 0, 'McDonalds', 'Chicken Nuggets');
INSERT INTO EatsAt(UserId, HotelId, RestaurantName, MenuItem) VALUES (1, 1, 'KFC', 'Chicken');
INSERT INTO EatsAt(UserId, HotelId, RestaurantName, MenuItem) VALUES (2, 2, 'Dominoz', 'Pizza');
INSERT INTO EatsAt(UserId, HotelId, RestaurantName, MenuItem) VALUES (3, 3, 'A and W', 'Beyond Meat Burger');
INSERT INTO EatsAt(UserId, HotelId, RestaurantName, MenuItem) VALUES (4, 4, 'Subway', 'Sandwich');

INSERT INTO MenuItemPrices(HotelId, RestaurantName, MenuItem, Price) VALUES (0,'McDonalds', 'Chicken Nuggets', 69);
INSERT INTO MenuItemPrices(HotelId, RestaurantName, MenuItem, Price) VALUES (1,'KFC', 'Chicken', 2);
INSERT INTO MenuItemPrices(HotelId, RestaurantName, MenuItem, Price) VALUES (2,'Dominoz', 'Pizza', 6);
INSERT INTO MenuItemPrices(HotelId, RestaurantName, MenuItem, Price) VALUES (4,'Subway', 'Sandwich', 1);
INSERT INTO MenuItemPrices(HotelId, RestaurantName, MenuItem, Price) VALUES (3,'A and W', 'Beyond Meat Burger', 1000);

INSERT INTO Pool(HotelId, PoolName, GroupId, isDrained) VALUES (0, 'Sahils Pool', 1, 1);
INSERT INTO Pool(HotelId, PoolName, GroupId, isDrained) VALUES (1, 'Johns Pool', 2, 0);
INSERT INTO Pool(HotelId, PoolName, GroupId, isDrained) VALUES (2, 'Harmans Pool', 3, 1);
INSERT INTO Pool(HotelId, PoolName, GroupId, isDrained) VALUES (3, 'Muazs Pool', 4, 0);
INSERT INTO Pool(HotelId, PoolName, GroupId, isDrained) VALUES (4, 'Jerrys Pool', 5, 0);

INSERT INTO SwimsAt(UserId, HotelId, PoolName) VALUES (0, 0, 'Sahils Pool');
INSERT INTO SwimsAt(UserId, HotelId, PoolName) VALUES (1, 1, 'Johns Pool');
INSERT INTO SwimsAt(UserId, HotelId, PoolName) VALUES (2, 2, 'Harmans Pool');
INSERT INTO SwimsAt(UserId, HotelId, PoolName) VALUES (3, 3, 'Muazs Pool');
INSERT INTO SwimsAt(UserId, HotelId, PoolName) VALUES (4, 4, 'Jerrys Pool');

INSERT INTO Gym(HotelId, GymName, GroupId, MaxCapacity) VALUES (0, 'Sahils Gym', 1, 50);
INSERT INTO Gym(HotelId, GymName, GroupId, MaxCapacity) VALUES (1, 'Johns Gym', 2, 40);
INSERT INTO Gym(HotelId, GymName, GroupId, MaxCapacity) VALUES (2, 'Harmans Gym', 3, 45);
INSERT INTO Gym(HotelId, GymName, GroupId, MaxCapacity) VALUES (3, 'Muazs Gym', 4, 36);
INSERT INTO Gym(HotelId, GymName, GroupId, MaxCapacity) VALUES (4, 'Jerrys Gym', 5, 55);

INSERT INTO WorksOutAt(UserId, HotelId, GymName) VALUES (0, 0, 'Sahils Gym');
INSERT INTO WorksOutAt(UserId, HotelId, GymName) VALUES (1, 1, 'Johns Gym');
INSERT INTO WorksOutAt(UserId, HotelId, GymName) VALUES (2, 2, 'Harmans Gym');
INSERT INTO WorksOutAt(UserId, HotelId, GymName) VALUES (3, 3, 'Muazs Gym');
INSERT INTO WorksOutAt(UserId, HotelId, GymName) VALUES (4, 4, 'Jerrys Gym');

INSERT INTO Spa(HotelId, SpaName, GroupId, MaxCapacity) VALUES (0, 'Sahils Spa', 1, 50);
INSERT INTO Spa(HotelId, SpaName, GroupId, MaxCapacity) VALUES (1, 'Johns Spa', 2, 40);
INSERT INTO Spa(HotelId, SpaName, GroupId, MaxCapacity) VALUES (2, 'Harmans Spa', 3, 45);
INSERT INTO Spa(HotelId, SpaName, GroupId, MaxCapacity) VALUES (3, 'Muazs Spa', 4, 36);
INSERT INTO Spa(HotelId, SpaName, GroupId, MaxCapacity) VALUES (4, 'Jerrys Spa', 5, 55);

INSERT INTO RelaxesIn(UserId, HotelId, SpaName, TreatmentRating) VALUES (0, 0, 'Sahils Spa', 5);
INSERT INTO RelaxesIn(UserId, HotelId, SpaName, TreatmentRating) VALUES (1, 1, 'Johns Spa', 1);
INSERT INTO RelaxesIn(UserId, HotelId, SpaName, TreatmentRating) VALUES (2, 2, 'Harmans Spa', 5);
INSERT INTO RelaxesIn(UserId, HotelId, SpaName, TreatmentRating) VALUES (3, 3, 'Muazs Spa', 0);
INSERT INTO RelaxesIn(UserId, HotelId, SpaName, TreatmentRating) VALUES (4, 4, 'Jerrys Spa', 4);

INSERT INTO TreatmentPricing(HotelId, SpaName, TreatmentRating, Price) VALUES (0, 'Sahils Spa', 5, 100);
INSERT INTO TreatmentPricing(HotelId, SpaName, TreatmentRating, Price) VALUES (1, 'Johns Spa', 1, 20);
INSERT INTO TreatmentPricing(HotelId, SpaName, TreatmentRating, Price) VALUES (2, 'Harmans Spa',5, 100);
INSERT INTO TreatmentPricing(HotelId, SpaName, TreatmentRating, Price) VALUES (3, 'Muazs Spa', 0, 0);
INSERT INTO TreatmentPricing(HotelId, SpaName, TreatmentRating, Price) VALUES (4, 'Jerrys Spa', 4, 80);

