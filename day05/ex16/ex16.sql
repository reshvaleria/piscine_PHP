SELECT count(member_history.date) AS 'movies' FROM member_history
WHERE (member_history.date >='2006-10-30 00:00:00' AND member_history.date < '2007-07-28 00:00:00')
OR (day(member_history.date) = 24 AND month(member_history.date) = 12);