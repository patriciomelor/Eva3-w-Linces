-- sqlite
-- delete from parcela where id=8;
-- delete from parcela where id=9;
-- delete from parcela where id=10;

-- ALTER TABLE parcela ADD link varchar(300);
INSERT INTO parcela(link)
SELECT 'https://img.freepik.com/foto-gratis/gran-paisaje-verde-cubierto-cesped-rodeado-arboles_181624-14827.jpg'
WHERE "id" ='1';