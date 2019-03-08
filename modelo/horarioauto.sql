CREATE PROCEDURE `horario_automatico` (
var_hora_desde time,
var_hora_hasta time,
var_cant_pacientes int,
var_hasta date
)
BEGIN
	declare var_fecha_ins date;
    declare var_med_spec_ins int;
	declare email_cursor CURSOR FOR 
	SELECT id FROM medico_especialidad;
	DECLARE CONTINUE HANDLER 
	FOR NOT FOUND SET v_finished = 1;
    
    set var_fecha_ins = now();

    WHILE var_fecha_ins <= var_hasta DO
        
        OPEN medico_espec_cursor;
        
        get_medico_espec: LOOP
        
        FETCH medico_espec_cursor INTO var_med_spec_ins;
        
        IF v_finished = 1 THEN 
        LEAVE get_medico_espec;
        END IF;
        
        insert into horario (desde, hasta, dia,cantidad_pacientes, medico_especialidad_id) 
        values
        (var_hora_desde, var_hora_hasta, var_fecha_ins, var_cant_pacientes,var_med_spec_ins);    
        
        END LOOP get_medico_espec;
        
        CLOSE medico_espec_cursor;

        SET var_fecha_ins = DATE_ADD(var_fecha_ins, INTERVAL 1 DAY) ;
    END WHILE;
  
   
    
	

END