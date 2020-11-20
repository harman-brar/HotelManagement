CREATE TABLE Guest(
  UserId INT,
  Name VARCHAR(255),
  Email VARCHAR(254),
  Phone VARCHAR(10),
  CONSTRAINT guest_pk PRIMARY KEY (UserId)
);

CREATE TABLE Hotel(
  HotelId INT,
  Name VARCHAR(255),
  Address VARCHAR(320),
  Phone VARCHAR(10),
  CONSTRAINT unique_phone UNIQUE(Phone),
  CONSTRAINT hotel_pk PRIMARY KEY (HotelId)
);

CREATE TABLE Suite(
  HotelId INT,
  SuiteNo INT,
  IsInUse INT,
  BedCount INT,
  IsClean INT,
  CONSTRAINT suite_hotel FOREIGN KEY (HotelId) REFERENCES Hotel(HotelId) ON DELETE CASCADE,
  CONSTRAINT suite_pk PRIMARY KEY (HotelId, SuiteNo)
);

CREATE TABLE Books(
  UserId INT,
  HotelId INT,
  SuiteNo INT,
  BookingDate Date,
  StayLength INT,
  Price INT,
  CONSTRAINT books_guest FOREIGN KEY (UserId) REFERENCES Guest(UserId),
  CONSTRAINT books_suite FOREIGN KEY (HotelId, SuiteNo) REFERENCES Suite(HotelId, SuiteNo),
  CONSTRAINT books_pk PRIMARY KEY (UserId, HotelId, SuiteNo)
);

CREATE TABLE Standard(
  HotelId INT,
  SuiteNo INT,
  HasSofaBed INT,
  CONSTRAINT standard_suite FOREIGN KEY (HotelId, SuiteNo) REFERENCES Suite(HotelId, SuiteNo),
  CONSTRAINT standard_pk PRIMARY KEY(HotelId, SuiteNo)
);

CREATE TABLE Deluxe(
  HotelId INT,
  SuiteNo INT,
  NoOfRooms INT,
  CONSTRAINT deluxe_suite FOREIGN KEY (HotelId, SuiteNo) REFERENCES Suite(HotelId, SuiteNo),
  CONSTRAINT deluxe_pk PRIMARY KEY(HotelId, SuiteNo)
);

CREATE TABLE Business(
  HotelId INT,
  SuiteNo INT,
  HasLivingRoom INT,
  CONSTRAINT business_suite FOREIGN KEY (HotelId, SuiteNo) REFERENCES Suite(HotelId, SuiteNo),
  CONSTRAINT business_pk PRIMARY KEY(HotelId, SuiteNo)
);

CREATE TABLE PayrollGroup(
  PGID Int,
  Name VARCHAR(255),
  CONSTRAINT pg_pk PRIMARY KEY(PGID)
);

CREATE TABLE Hires(
  HotelId INT,
  PGID Int,
  CONSTRAINT hiring_hotel_fk FOREIGN KEY (HotelId) REFERENCES Hotel(HotelId) ON DELETE CASCADE,
  CONSTRAINT ph_hired_fk FOREIGN KEY (PGID) REFERENCES PayrollGroup(PGID),
  CONSTRAINT hires_pk PRIMARY KEY(HotelId, PGID)
);

CREATE TABLE PerformanceGroup(
  PGID Int,
  ContractStartDate DATE,
  ContractEndDate DATE,
  ChargeRate INT,
  CONSTRAINT pg_fk FOREIGN KEY (PGID) REFERENCES PayrollGroup(PGID) ON DELETE CASCADE,
  CONSTRAINT pf_pk PRIMARY KEY (PGID)
);
  
CREATE TABLE Performance(
  PID INT,
  PGID INT NOT NULL,
  PerformanceDate DATE,
  Attendance INT,
  CONSTRAINT unique_pgid UNIQUE(PGID),
  CONSTRAINT perf_pg_fk FOREIGN KEY (PGID) REFERENCES PerformanceGroup(PGID),
  CONSTRAINT perf_pk PRIMARY KEY(PID)
);
  
CREATE TABLE Watches(
  UserId INT,
  PID Int,
  CONSTRAINT watches_guest_fk FOREIGN KEY (UserId) REFERENCES Guest(UserId),
  CONSTRAINT watches_perf_fk FOREIGN KEY (PID) REFERENCES Performance(PID),
  CONSTRAINT watches_pk PRIMARY KEY(UserId, PID)
);
  
CREATE TABLE Employee(
  PGID INT,
  StartDate DATE,
  Salary INT,
  JobDescription VARCHAR(1000),
  IsCurrentlyEmployed INT,
  EndDate DATE,
  CONSTRAINT empl_pg_fk FOREIGN KEY (PGID) REFERENCES PayrollGroup(PGID) ON DELETE CASCADE,
  CONSTRAINT employee_pk PRIMARY KEY (PGID)
);

CREATE TABLE FacilityEmployee(
  PGID Int,
  StartDate DATE,
  Salary INT,
  CONSTRAINT f_empl_pg_fk FOREIGN KEY (PGID) REFERENCES PayrollGroup(PGID) ON DELETE CASCADE,
  CONSTRAINT f_empl_pk PRIMARY KEY (PGID)
);

CREATE TABLE OperatorGroup(
  GroupId Int,
  MemberCount INT,
  CONSTRAINT og_pk PRIMARY KEY (GroupId)
);

CREATE TABLE Assigns(
  GroupId Int,
  PGID Int,
  AssignmentDate DATE,
  CONSTRAINT assigns_og_fk FOREIGN KEY (GroupId) REFERENCES OperatorGroup(GroupId) ON DELETE CASCADE,
  CONSTRAINT assigns_pg_fk FOREIGN KEY (PGID) REFERENCES PayrollGroup(PGID),
  CONSTRAINT assigns_pk PRIMARY KEY (GroupId, PGID)
);

CREATE TABLE Restaurant(
  HotelId INT,
  RestaurantName VARCHAR(255),
  GroupId INT Not NULL,
  MaxCapacity INT,
  CONSTRAINT unique_groupid_res UNIQUE(GroupId),
  CONSTRAINT res_hotel_fk FOREIGN KEY (HotelId) REFERENCES Hotel(HotelId) ON DELETE CASCADE,
  CONSTRAINT res_og_fk FOREIGN KEY (GroupId) REFERENCES OperatorGroup(GroupId),
  CONSTRAINT res_pk PRIMARY KEY (HotelId, RestaurantName)
);

CREATE TABLE EatsAt(
  UserId INT,
  HotelId INT,
  RestaurantName VARCHAR(255),
  MenuItem VARCHAR(100),
  CONSTRAINT ea_guest_fk FOREIGN KEY (UserId) REFERENCES Guest(UserId),
  CONSTRAINT ea_res_fk FOREIGN KEY (HotelId, RestaurantName) REFERENCES Restaurant(HotelId, RestaurantName) ON DELETE CASCADE,
  CONSTRAINT ea_pk PRIMARY KEY (UserId, HotelId, RestaurantName)
);

CREATE TABLE MenuItemPrices(
  HotelId INT,
  RestaurantName VARCHAR(255),
  MenuItem VARCHAR(255),
  Price INT,
  CONSTRAINT mip_res_fk FOREIGN KEY (HotelId, RestaurantName) REFERENCES Restaurant(HotelId, RestaurantName) ON DELETE CASCADE,
  CONSTRAINT mip_pk PRIMARY KEY (HotelId, RestaurantName, MenuItem)
);

CREATE TABLE Pool(
  HotelId INT,
  PoolName VARCHAR(255),
  GroupId INT Not NULL,
  IsDrained INT,
  CONSTRAINT unique_groupid_pool UNIQUE(GroupId),
  CONSTRAINT pool_hotel_fk FOREIGN KEY (HotelId) REFERENCES Hotel(HotelId) ON DELETE CASCADE,
  CONSTRAINT pool_og_fk FOREIGN KEY (GroupId) REFERENCES OperatorGroup(GroupId),
  CONSTRAINT pool_pk PRIMARY KEY (HotelId, PoolName)
);

CREATE TABLE SwimsAt(
  UserId INT,
  HotelId INT,
  PoolName VARCHAR(255),
  CONSTRAINT sa_guest_fk FOREIGN KEY (UserId) REFERENCES Guest(UserId),
  CONSTRAINT sa_pool_fk FOREIGN KEY (HotelId, PoolName) REFERENCES Pool(HotelId, PoolName) ON DELETE CASCADE,
  CONSTRAINT sa_pk PRIMARY KEY (UserId, HotelId, PoolName)
);

CREATE TABLE Gym(
  HotelId INT,
  GymName VARCHAR(255),
  GroupId INT Not NULL,
  MaxCapacity INT,
  CONSTRAINT unique_groupid_gym UNIQUE(GroupId),
  CONSTRAINT gym_hotel_fk FOREIGN KEY (HotelId) REFERENCES Hotel(HotelId) ON DELETE CASCADE,
  CONSTRAINT gmy_og_fk FOREIGN KEY (GroupId) REFERENCES OperatorGroup(GroupId),
  CONSTRAINT gym_pk PRIMARY KEY (HotelId, GymName)
);

CREATE TABLE WorksOutAt(
  UserId INT,
  HotelId INT,
  GymName VARCHAR(255),
  MaxCapacity INT,
  CONSTRAINT woa_guest_fk FOREIGN KEY (UserId) REFERENCES Guest(UserId),
  CONSTRAINT woa_gym_fk FOREIGN KEY (HotelId, GymName) REFERENCES Gym(HotelId, GymName) ON DELETE CASCADE,
  CONSTRAINT woa_pk PRIMARY KEY (UserId, HotelId, GymName)
);

CREATE TABLE Spa(
  HotelId INT,
  SpaName VARCHAR(255),
  GroupId INT Not NULL,
  MaxCapacity INT,
  CONSTRAINT unique_groupid_spa UNIQUE(GroupId),
  CONSTRAINT spa_hotel_fk FOREIGN KEY (HotelId) REFERENCES Hotel(HotelId) ON DELETE CASCADE,
  CONSTRAINT spa_og_fk FOREIGN KEY (GroupId) REFERENCES OperatorGroup(GroupId),
  CONSTRAINT spa_pk PRIMARY KEY (HotelId, SpaName)
);

CREATE TABLE RelaxesIn(
  UserId INT,
  HotelId INT,
  SpaName VARCHAR(255),
  TreatmentRating INT,
  CONSTRAINT ri_guest_fk FOREIGN KEY (UserId) REFERENCES Guest(UserId),
  CONSTRAINT ri_spa_fk FOREIGN KEY (HotelId, SpaName) REFERENCES Spa(HotelId, SpaName) ON DELETE CASCADE,
  CONSTRAINT ri_pk PRIMARY KEY (UserId, HotelId, SpaName)
);

CREATE TABLE TreatmentPricing(
  HotelId INT,
  SpaName VARCHAR(255),
  TreatmentRating INT,
  Price INT,
  CONSTRAINT tp_spa_fk FOREIGN KEY (HotelId, SpaName) REFERENCES Spa(HotelId, SpaName) ON DELETE CASCADE,
  CONSTRAINT tp_pk PRIMARY KEY (HotelId, SpaName, TreatmentRating)
);
