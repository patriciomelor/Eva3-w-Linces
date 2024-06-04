-- sqlite
-- delete from parcela where id=8;
-- delete from parcela where id=9;
-- delete from parcela where id=10;

-- ALTER TABLE parcela ADD link varchar(300);
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 5a24b49 (Intento 2: Pegarle al Endpoint parcelas)
UPDATE parcela
SET link = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ6KD5uMj6v3x6a2jjppYRC8ttc7lKgUs-11g&s'
WHERE id = '1';

UPDATE parcela
SET link = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSUk3iG9wTyqc59A9TI2DBzuENLCZEDbnyP0A&s'
WHERE id = '3';

UPDATE parcela
SET link = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR3XabcJUYySRrc_31n4JhntZcJaSv9Nfsf2Q&s'
<<<<<<< HEAD
WHERE id = '7';
=======
INSERT INTO parcela(link)
SELECT 'https://img.freepik.com/foto-gratis/gran-paisaje-verde-cubierto-cesped-rodeado-arboles_181624-14827.jpg'
WHERE "id" ='1';
>>>>>>> adc78f3 (Endpoint Parcela)
=======
WHERE id = '7';
>>>>>>> 5a24b49 (Intento 2: Pegarle al Endpoint parcelas)
