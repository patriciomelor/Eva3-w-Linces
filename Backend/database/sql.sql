-- sqlite
-- delete from parcela where id=8;
-- delete from parcela where id=9;
-- delete from parcela where id=10;

-- ALTER TABLE parcela ADD link varchar(300);
-- UPDATE parcela
-- SET link = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ6KD5uMj6v3x6a2jjppYRC8ttc7lKgUs-11g&s'
-- WHERE id = '1';

-- UPDATE parcela
-- SET link = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSUk3iG9wTyqc59A9TI2DBzuENLCZEDbnyP0A&s'
-- WHERE id = '3';

-- UPDATE parcela
-- SET link = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR3XabcJUYySRrc_31n4JhntZcJaSv9Nfsf2Q&s'
-- WHERE id = '7';

-- ALTER TABLE parcela ADD activo boolean;

UPDATE parcela
SET activo= 'false'
WHERE id='7';

UPDATE parcela
SET activo= 'true'
WHERE id='7';