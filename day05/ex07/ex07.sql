SELECT title, summary FROM film
WHERE title RLIKE '42' OR summary RLIKE '42'
ORDER BY duration;