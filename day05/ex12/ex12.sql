SELECT last_name, first_name FROM user_card
WHERE last_name RLIKE '-' OR first_name RLIKE '-'
ORDER BY last_name, first_name;