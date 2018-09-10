create table phase
(
    id int(5) auto_increment ,
    type enum('first','second_scientific','third_scientific' , 'second_literary','third_literary') not null,
    primary key (id)
);
create table room
(
    number_room int(5),
    max_capacity int(5),
    floor_num int(5),
    primary key(number_room)
);

create table stage
(
    number_stage int (5) ,
    id_phase int (5) ,
    number_room int(5) unique ,
    primary key (number_stage,id_phase),
    foreign key(number_room) references room(number_room),
    foreign key(id_phase)  references phase(id)
);
create table student
(
    id int(5) auto_increment ,
    id_phase int(5) ,
    name varchar(50) ,
    address varchar(150),
    phone_number varchar(100),
    primary key(id) ,
    foreign key(id_phase)  references phase(id)
);
create table teacher
(
    id int(5) auto_increment,
    name varchar(100) not null,
    address varchar(100),
    phone_number varchar(100),
    primary key(id)
);
create table teacher_stage
(
   id int(6) AUTO_INCREMENT,
   id_teacher int(5) ,
   number_stage int(5) ,
   primary key(id,id_teacher,number_stage) ,
   foreign key (id_teacher) references teacher(id),
   foreign key (number_stage) references stage(number_stage)
);

create table subject
(
    number_subject int (6) ,
    id_phase int(6),
    name varchar(30),
    max_degree int(6),
    max_hours int(6),
    primary key(number_subject,id_phase),
    foreign key  (id_phase) references phase(id)
);
create table subject_teacher
(
     id int(6) auto_increment,
     id_teacher int(6),
     number_subject int(6),
     primary key(id,id_teacher,number_subject),
     foreign key(id_teacher) references teacher(id),
     foreign key(number_subject) references subject(number_subject)
);

create table books
(
    id int(5) auto_increment ,
    number_subject int (6), 
    name varchar(30),
    primary key(id,number_subject) ,
    foreign key (number_subject) references subject(number_subject)
);

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
create table labortatory
(
    id int(6) auto_increment ,
    name varchar(100),
    primary key(id)
);
create table  labortatory_stage
(
    id int(6) AUTO_INCREMENT,
    id_laboratory int(6),
    number_stage int(6),
    usagetime  int(6),
    num_days enum("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday") not null,

    primary key(id,id_laboratory,number_stage),
    foreign key (id_laboratory) references labortatory(id),
    foreign key (number_stage) references stage(number_stage)
);
create table student_stage
(
  id int (6),
  id_student int(6), 
  number_stage int(6),
  primary key(id,id_student,number_stage),
  foreign key (id_student) references student(id),
  foreign key (number_stage) references stage(number_stage)
);

insert into phase(type) values('first');
insert into phase(type) values('second_scientific');
insert into phase(type) values('third_scientific' );
insert into phase(type) values( 'second_literary');
insert into phase(type) values( 'third_literary');
