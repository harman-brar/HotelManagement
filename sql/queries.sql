/* QUERIES USED FOR DEMO */

/* INSERT */
INSERT INTO Books (UserId, HotelId, SuiteNo, BookingDate, StayLength, Price) VALUES (1, 1, 1, 22-04-20, 3, 99);

/* UPDATE */
UPDATE Suite SET IsInUse = 0 WHERE SuiteNo = 2 AND HotelId = 4;

/* DELETE */
DELETE FROM Pool WHERE HotelId = 3 AND PoolName = X;

/* PROJECTION */
SELECT Name, Email, Phone FROM Guest;

/* SELECTION */
SELECT Phone FROM Guest WHERE Email = 'larry@dairy.com';

/* JOIN */
SELECT W.HotelId, W.GymName, G.MaxCapacity 
FROM WorksOutAt W, Gym G
WHERE W.GymName = G.GymName AND W.UserId = X;

/* DIVISION */
SELECT UserId, Name FROM Guest G
WHERE NOT EXISTS((SELECT P.PID FROM Performance) 
EXCEPT
(SELECT W.PID FROM Watches WHERE W.UserId = G.UserId)); 
