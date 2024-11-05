CREATE TABLE Students(studentID VARCHAR(8) PRIMARY KEY NOT NULL, name TINYTEXT NOT NULL, lastName TINYTEXT NOT NULL, secondLastName TINYTEXT, email TINYTEXT NOT NULL, pass MEDIUMTEXT NOT NULL, studentSince DATE NOT NULL, graduated DATE, enabled BOOLEAN);

CREATE TABLE Sessions(token VARCHAR(512) NOT NULL PRIMARY KEY, studentID VARCHAR(8),  session BOOLEAN, FOREIGN KEY(studentID) REFERENCES students(studentID));

SELECT 
    Students.studentID,
    Students.name,
    Students.lastName,
    Students.secondLastName,
    Students.email,
    Students.studentSince,
    Students.graduated
    FROM Sessions
LEFT JOIN Students ON Sessions.studentID = Students.studentID
WHERE Sessions.token = $token;