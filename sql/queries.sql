/* QUERIES USED FOR DEMO */

/* INSERT */
INSERT INTO Hotel (HotelId, Name, Address, Phone) VALUES (100, 'The Plebian', '1234 Plebian St.', '1230984756');

/* UPDATE */
UPDATE Suite SET IsInUse = 0 WHERE SuiteNo = Y AND HotelId = X;

/* DELETE */
DELETE FROM Pool WHERE HotelId = X AND PoolName = Y;

/* PROJECTION */
SELECT Name, Email, Phone FROM Guest;

/* SELECTION */
SELECT Phone FROM Guest WHERE Email = X;

/* JOIN */
SELECT W.HotelId, W.GymName, G.MaxCapacity 
FROM WorksOutAt W, Gym G
WHERE W.GymName = G.GymName AND W.UserId = X;

/* DIVISION */
SELECT UserId, Name 
FROM Guest G
WHERE NOT EXISTS(	
		SELECT P.PID 
		FROM Performance EXCEPT(	
					SELECT W.PID
					FROM Watches
					WHERE W.UserId = G.UserId));

/* Aggregation with Group By */
SELECT H.HotelId, H.Name, Min(MaxCapacity)
FROM Hotel H, Gym G
WHERE H.HotelId = G.HotelId
GROUP BY H.HotelId, H.Name;

/* Aggregation with Having */
SELECT HotelId, Min(MaxCapacity)
FROM Gym
GROUP BY HotelId
HAVING Min(MaxCapacity) > 20;

/ *Nested Aggregation with Group By */
SELECT HotelId
FROM Hotel H
GROUP BY HotelId
HAVING 1 > (SELECT COUNT(*)
            FROM Books B
            WHERE H.HotelId = B.HotelId);
 
