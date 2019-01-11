SET GLOBAL event_scheduler = ON;

CREATE EVENT update_disponibilidad_promocion
ON SCHEDULE EVERY 1 DAY STARTS '2018-12-01 00:00:00'
DO UPDATE cursos SET promocion_disponible='0' WHERE vigencia_promocion < CURDATE();
