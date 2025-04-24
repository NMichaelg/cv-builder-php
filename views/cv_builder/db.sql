CREATE TABLE user_table (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(200) NOT NULL
);

CREATE TABLE user_cv (
    id INT PRIMARY KEY,
    fname VARCHAR(100),
    mname VARCHAR(100),
    lname VARCHAR(100),
    img VARCHAR(255), 
    email VARCHAR(100),
    FOREIGN KEY (id) REFERENCES user_table(id)
);

CREATE TABLE user_address (
    id INT,
    country VARCHAR(100) NOT NULL,
    city VARCHAR(100) NOT NULL,
    street VARCHAR(200) NOT NULL,
    PRIMARY KEY(id, country, city, street),
    FOREIGN KEY (id) REFERENCES user_table(id)
);

CREATE TABLE user_phone (
    id INT,
    phone VARCHAR(20) NOT NULL,
    PRIMARY KEY(id, phone),
    FOREIGN KEY (id) REFERENCES user_table(id)
);

CREATE TABLE user_achievement(
    id INT,
    title varchar(100) not null,
    description varchar(300),
    PRIMARY KEY(id, title),
    FOREIGN KEY (id) REFERENCES user_table(id)
);

CREATE TABLE user_experience(
    id INT,
    title varchar(100) not null,
    company varchar(100), 
    location varchar(200),
    start_date date, 
    end_date date,
    description varchar(300),
    PRIMARY KEY(id, title),
    FOREIGN KEY (id) REFERENCES user_table(id)
);

CREATE TABLE user_education (
    id INT,
    school VARCHAR(100) NOT NULL,
    degree VARCHAR(200) NOT NULL, 
    year YEAR,  
    specialization VARCHAR(200), 
    description VARCHAR(300),
    PRIMARY KEY(id, school, degree),
    FOREIGN KEY (id) REFERENCES user_table(id)
);

CREATE TABLE user_project(
    id INT,
    pname varchar(100) not null,
    plink varchar(200),
    description VARCHAR(300),
    PRIMARY KEY(id, pname),
    FOREIGN KEY (id) REFERENCES user_table(id)
);

CREATE TABLE user_skill(
    id INT,
    skill varchar(200) not null,
	year Year,
    PRIMARY KEY(id, skill),
    FOREIGN KEY (id) REFERENCES user_table(id)
);

