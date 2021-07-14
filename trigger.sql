
DROP TRIGGER verificar_goles
DELIMITER //
CREATE TRIGGER verificar_estado_apuesta
AFTER UPDATE ON apuestas
FOR EACH ROW
BEGIN

	IF NEW.estado = 0 THEN
	   update apuestas
	   set estado = 1 
	   where fasegrupo_id = OLD.id and golcasa < NEW.golcasa or golfuera < NEW.golfuera;
	END IF;
    
    IF NEW.estado = 1 THEN
	   update apuestas
	   set estado = 2 
	   where fasegrupo_id = NEW.id
	   and golcasa = NEW.golcasa 
	   or golfuera = NEW.golfuera;
	END IF;
   
END;
DELIMITER //