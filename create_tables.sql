DROP TABLE IF EXISTS ORDERSTATUS;
DROP TABLE IF EXISTS CART;
DROP TABLE IF EXISTS STORE;
DROP TABLE IF EXISTS BILLINGINFO;
DROP TABLE IF EXISTS PAYMENT;
DROP TABLE IF EXISTS ITEM;
DROP TABLE IF EXISTS HUMAN;

CREATE TABLE IF NOT EXISTS HUMAN
(
    ID          INT(8)          NOT NULL    AUTO_INCREMENT,
    FNAME       CHAR(30)        NOT NULL,
    MNAME       CHAR(30)                ,
    LNAME       CHAR(30)        NOT NULL,
    PHONE       BIGINT(10)      NOT NULL,
    EMAIL       CHAR(50)                ,

    PRIMARY KEY (ID)
);

CREATE TABLE IF NOT EXISTS ITEM
(
    IID         INT(8)          NOT NULL    AUTO_INCREMENT,
    INAME       CHAR(50)        NOT NULL,
    PRICE       DECIMAL(6,2)    DEFAULT '0.00',
    IEDITION    CHAR(30)        DEFAULT 'STANDARD',
    ICONDITION  CHAR(30)        DEFAULT 'NEW',
    TAX         DECIMAL(3,2)    DEFAULT '1.15',             --THE DEFAULT TAX WOULD BE 15%
    IDETAIL     TEXT                    ,
    FRESHIP     BOOLEAN         DEFAULT '0',                --DEFAULT=0 MEANS THE BOOLEAN IS FALSE, IT IS NOT A FREE SHIPPING ITEM
    PROMO       BOOLEAN         DEFAULT '0',                --DEFAULT=0 MEANS USER CANNOT USE COUPON TO BUY THIS ITEM
    SALE        BOOLEAN         DEFAULT '0',                --MEANS THE ITEM IS NOT ON SALE
    DISCOUN     DECIMAL(3,2)    DEFAULT '0.00',             --MEANS THE ITEM IS NOT ON SALE
    TPRICE      DECIMAL(6,2)    DEFAULT '0.00',             --TPRICE WOULD BE (PRICE*TAX-PROMO)*DISCOUNT*SALE-REWARD
    REWARD      DECIMAL(3,2)    DEFAULT '0.00',             --CAN MAKE A 1% REWARD LIKE GET 1$ REFUND AFTER SPEND 100$ 

    PRIMARY KEY (IID)
);

CREATE TABLE IF NOT EXISTS STORE
(
    EMPID       INT(8)          NOT NULL,                   --WHICH EMPLOYEE
    IID         INT(8)          NOT NULL,                   --PROVIDE WHAT ITEM
    QTY         INT(8)          DEFAULT '0',                --IN WHAT QUANTITY

    PRIMARY KEY (EMPID,IID),
    FOREIGN KEY (EMPID)     REFERENCES HUMAN(ID),
    FOREIGN KEY (IID)       REFERENCES ITEM(IID)
);

CREATE TABLE IF NOT EXISTS PAYMENT
(
    UID         INT(8)          NOT NULL,                   --USER ID, DIFFERENT FROM THE EMPLOYEE'S
    CARDNUM     CHAR(16)        NOT NULL,                   --CARD NUMBER
    EXPMON      CHAR(2)         NOT NULL,                   --EXPIRE MONTH
    EXPYEAR     CHAR(4)         NOT NULL,                   --EXPIRE YEAR
    CVN         CHAR(3)         NOT NULL,                   --SECURITY CODE
    CFNAME      CHAR(30)        NOT NULL,                   --CARD OWNER'S FIRST NAME 
    CLNAME      CHAR(30)        NOT NULL,                   --CARD OWNER'S LAST NAME

    PRIMARY KEY (UID),
    FOREIGN KEY (UID)       REFERENCES HUMAN(ID)
);

CREATE TABLE IF NOT EXISTS BILLINGINFO
(
    UID         INT(8)          NOT NULL,
    ADDRESS     TEXT                    ,                   --USER'S ADDRESS
    OPTLINE     TEXT                    ,                   --APARTMENT, UNIT, ETC
    CITY        CHAR(50)        NOT NULL,
    STATE       CHAR(10)        NOT NULL,
    ZIPCODE     INT(5)          NOT NULL,
    COUNTRY     CHAR(50)        DEFAULT'USA',
    CONTACT     CHAR(10)        DEFAULT'PHONE-CALL',        --CONTACT PREFERENCE: TEXT, EMAIL, ETC

    PRIMARY KEY (UID),
    FOREIGN KEY (UID)       REFERENCES HUMAN(ID)
);

CREATE TABLE IF NOT EXISTS CART
(
    UID         INT(8)          NOT NULL,
    IID         INT(8)          NOT NULL,
    SELEQTY     INT(8)          DEFAULT '1',

    PRIMARY KEY (UID,IID),
    FOREIGN KEY (UID)       REFERENCES HUMAN(ID),
    FOREIGN KEY (IID)       REFERENCES ITEM(IID)
);

CREATE TABLE IF NOT EXISTS ORDERSTATUS
(
    OID     INT(8)          NOT NULL    AUTO_INCREMENT,     --ORDER ID
    UID     INT(8)          NOT NULL,                       --WHO CREATE THE ORDER
    IID     INT(8)          NOT NULL,                       --WHAT ITEM IN THE ORDER
    EMPID   INT(8)          NOT NULL,                       --WHO PROCESS THE ORDER
    STATUS  CHAR(10)        DEFAULT 'Pending',              --THE STATUS OF THE ORDER
    TRACID  INT(8)          AUTO_INCREMENT,                 
    NOTE    TEXT         ,

    PRIMARY KEY(OID,UID,IID,EMPID),
     
    FOREIGN KEY (UID)       REFERENCES HUMAN(ID),
    FOREIGN KEY (IID)       REFERENCES ITEM(IID),
    FOREIGN KEY (EMPID)     REFERENCES HUMAN(ID),
);