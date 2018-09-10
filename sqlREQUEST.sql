#request 1
SELECT  name ,number_stage,number_class,num_days FROM 
                (
                    /* get teacher id which teaching physics*/
                    (
                        SELECT st.id_teacher,s.number_subject FROM subject s  inner JOIN subject_teacher st on 
                        s.name ='physics' and s.id_phase = 3 and st.number_subject = s.number_subject
                    )
                    as t1 
                    /* get programm of teacher who are teaching physics  */
                    INNER JOIN (SELECT  num_days,number_stage,id_teacher as pt_id_teacher,number_class FROM  programm_table ) pt 
                    on pt.pt_id_teacher = t1.id_teacher
                ) 
                /*get nameof teacher*/
                INNER JOIN teacher on teacher.id = id_teacher ORDER BY id_teacher 
/*=======================================================================================*/
#request 2
SELECT COUNT(*) as num_algebra FROM (SELECT id FROM programm_table p INNER JOIN
 subject s on s.number_subject = p.number_subject and s.name = 'algebra'
  and p.num_days = "Tuesday" GROUP BY id )as a
/*=======================================================================================*/
#request 3
SELECT name FROM 
(
	(
        SELECT subject_teacher.number_subject,COUNT(*) as num_freq FROM subject_teacher    
        GROUP BY number_subject  HAVING COUNT(*)>1
     )
) as t
INNER JOIN subject on subject.number_subject = t.number_subject

/*=======================================================================================*/
#request 4 
SELECT * FROM 
(
	SELECT distinct(name),programm_table.id  FROM subject LEFT JOIN programm_table on 		  
    subject.number_subject = 		    
    programm_table.number_subject and programm_table.num_days = "thursday"
) as a where id is null

#request 5
SELECT name,num_days FROM labortatory_stage  INNER JOIN
labortatory ON labortatory_stage.id_laboratory = labortatory.id 
GROUP BY number_stage HAVING sum(usagetime)=90 and num_days = 'Wednesday'   

#request  6
create table programm_table
(
    id int(5) auto_increment,
    number_subject int(6),
    number_stage int(6),
    id_teacher int(6),
    number_class enum('1','2','3','4','5','6'),
    num_days enum("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"),
    foreign key (number_subject) references subject(number_subject),
    foreign key (number_stage) references stage(number_stage),
    foreign key (id_teacher) references teacher(id),
    primary key(id,number_subject,number_stage,id_teacher,number_class,num_days)
);