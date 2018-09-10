<?php
    namespace model;
    use lib\model;
    class request_all extends model
    {

        
        function reques_1()
        {
            $db = \lib\db::singletone();
            $sql = "SELECT  name ,number_stage,number_class,num_days FROM 
                        (
                            (
                                SELECT st.id_teacher,s.number_subject FROM subject s  inner JOIN subject_teacher st on 
                                s.name ='physics' and s.id_phase = 3 and st.number_subject = s.number_subject
                            )
                            as t1 
                            INNER JOIN (SELECT  num_days,number_stage,id_teacher as pt_id_teacher,number_class FROM  programm_table ) pt 
                            on pt.pt_id_teacher = t1.id_teacher
                        ) 
                        INNER JOIN teacher on teacher.id = id_teacher ORDER BY id_teacher ";       
           return $db->query($sql);
        }

        function reques_2()
        {
            $db = \lib\db::singletone();
            $sql = "SELECT COUNT(*) as num_algebra FROM (SELECT id FROM programm_table p INNER JOIN subject s on s.number_subject = p.number_subject and s.name = 'algebra' and p.num_days = 'Tuesday' GROUP BY id )as a ";       
           return $db->query($sql);
        }

        function reques_3()
        {
            $db = \lib\db::singletone();
            $sql = "SELECT distinct(name) FROM 
                    (
                        (SELECT subject_teacher.number_subject,COUNT(*) as num_freq FROM subject_teacher    
                         GROUP BY number_subject  HAVING COUNT(*)>1)
                    ) as t
                    INNER JOIN subject on subject.number_subject = t.number_subject and subject.id_phase = 4 ";
       
            
           return $db->query($sql);;
        }
        function reques_4()
        {
            $db = \lib\db::singletone();
            $sql = 'SELECT * FROM 
                    (
                        SELECT distinct(name),programm_table.id  FROM subject LEFT JOIN programm_table on 		  
                        subject.number_subject = 		    
                        programm_table.number_subject and programm_table.num_days = "thursday"
                    ) as a where id is null ';
       
            
           return $db->query($sql);;
        }
        function reques_5()
        {
            $db = \lib\db::singletone();
            $sql = "SELECT name,num_days FROM labortatory_stage  INNER JOIN
                    labortatory ON labortatory_stage.id_laboratory = labortatory.id 
                    GROUP BY number_stage HAVING sum(usagetime)=90 and num_days = 'Wednesday' ";       
           return $db->query($sql);;
        }
        
    }
?>
