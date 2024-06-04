-- -- sqlite
-- -- delete from parcela where id=8;
-- -- delete from parcela where id=9;
-- -- delete from parcela where id=10;

-- -- ALTER TABLE parcela ADD link varchar(300);
-- UPDATE parcela
-- SET link = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ6KD5uMj6v3x6a2jjppYRC8ttc7lKgUs-11g&s'
-- WHERE id = '1';

-- UPDATE parcela
-- SET link = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSUk3iG9wTyqc59A9TI2DBzuENLCZEDbnyP0A&s'
-- WHERE id = '3';

-- UPDATE parcela
-- SET link = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR3XabcJUYySRrc_31n4JhntZcJaSv9Nfsf2Q&s'
-- WHERE id = '7';

INSERT INTO `pregunta_frecuente` (`id`, `pregunta`, `respuesta`) VALUES
(2, '¿Que significa que las parcelas tengan rol  propio?', 'Significa que tu parcela cuenta con un N° de Rol exclusivo que la identifica, otorgado por el Servicio de Impuestos Internos (SII) , el cual es único a nivel comunal. El número de Rol se compone de dos partes: número de manzana y número predial, y están separados por un guion. Por ejemplo, el Rol 648-24, de la comuna de Coquimbo, corresponde a la propiedad número veinticuatro de la manzana seiscientos cuarenta y ocho de esa comuna.'),
(3, '¿Dónde puedo averiguar si este loteo está autorizado?', 'Directamente en el Conservador de Bienes Raíces donde está inscrita la propiedad, al estar inscrita en dicho conservador, quiere decir que el plano está autorizado por el Servicio Agrícola Ganadero y los roles fueron asignados por el Servicio de Impuestos Internos, certificados los cuales son requeridos por el Conservador de Bienes Raíces respectivo antes de inscribir la propiedad.'),
(4, '¿Qué es la factibilidad de una luz?', 'Se refiere a los distintos medios con que el cliente cuenta para abastecerse de este recurso, como por ejemplo, paneles solares, los postes de luz mas cercanos al proyecto.'),
(5, '¿Qué es la factibilidad de agua?', 'Son los distintos medios con que el cliente cuenta para abastecerse de este recurso, Por ejemplo, camión aljibe, agua potable rural, pozo profundo.');
